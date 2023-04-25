<?php 
    class Solicitudes extends controller{

        function __construct() {
            parent::__construct();
            session_start();
            
            if(!Validaciones::validarAcceso('Empleador')){
                header('Location: /404');
                exit();
            }
        }

        function render() {
            $this->loadModel('solicitud_');
            $this->view->respuesta = $this->model->getMySolicitudEmpleador();
            $this->view->render('empleador/list_solicitudes');
        }

        function destroy($id) {
            $this->loadModel('solicitud_');
            $this->model->destroy($id);

            header('Location: /empleador/solicitudes');
        }

        function status_solicitud($id){
            $status = $_POST['status'];

            if($status > 4 OR $status < 2){
                header('location: /405');
                return false;
            }

            $this->loadModel('solicitud_');
            $result = $this->model->changueStatus($id, $status);

            if(!$result){
                header('Location: 404');
                return false;
            }

            return header('Location: /empleador/solicitudes');
        }

    }
?>