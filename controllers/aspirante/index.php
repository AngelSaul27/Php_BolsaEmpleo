<?php
require_once 'libs/rules/validaciones.php';//Cargado de la clase para las reglas de formularios

    class Index extends controller{
        
        public function __construct()
        {
            parent::__construct();
            session_start();
            
            if(!Validaciones::validarAcceso('Aspirante')){
                header('Location: /login');
                exit();
            }
        }
        
        public function render()
        {
            $this->view->render('aspirante/index');
        }
    }

?>
