<?php
    require_once 'libs/rules/validaciones.php';
    
    class Login extends Controller{
        
        public function __construct()
        {
            session_start();
            if ($_SESSION) {
                header('location: /');
                return false;
            }
            parent::__construct();
            $this->view->mensaje = [];
        }

        public function render(){
            $this->view->render('auth/login');
        }

        public function authenticar(){
            $errosMsg = [];
            
            if(empty($_POST['email']) || empty($_POST['password'])){
                #VACIADO DE SPACIOS TRIM Y VALIDACION DEL EMPTY
                empty(trim($_POST['email'])) ? array_push($errosMsg, 'Ingrese un correo electronico por favor.'): '';
                empty(trim($_POST['password'])) ? array_push($errosMsg, 'Ingrese una contraseña por favor.'): '';
                $this->view->mensaje = $errosMsg;
                $this->view->render('auth/login');
                return false;
            }

            $auth_email = $_POST['email'];
            $auth_psw = $_POST['password'];

            if(!Validaciones::validarEmail($auth_email)){
                array_push($errosMsg, 'Correo electronico incorrecto!');
                $this->view->mensaje = $errosMsg;
                $this->view->render('auth/login');
                return false;
            }

            if(!Validaciones::validarPassword($auth_psw)){
                array_push($errosMsg, 'Min. 8 caracteres y solo use [@$!%*#?&]');
                $this->view->mensaje = $errosMsg;
                $this->view->render('auth/login');
                return false;
            }

            $this->loadModel('auth/login');
            
            if(isset($_SESSION['role']) == null){
                array_push($errosMsg, 'Sus credenciales no coinciden con nuestro registro!');
                $this->view->mensaje = $errosMsg;
                $this->view->render('auth/login');
                return false;
            }

            if($_SESSION['role'] == 'Aspirante'){
                header('Location: /aspirante');
                return false;
            }

            if ($_SESSION['role'] == 'Administrador') {
                header('Location: /administrador');
                return false;
            }

            if ($_SESSION['role'] == 'Empleador'){
                header('Location: /empleador');
                return false;
            }

        }

    }

?>