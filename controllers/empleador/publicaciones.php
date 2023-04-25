<?php 
    class Publicaciones extends controller{

        function __construct() {
            parent::__construct();
            session_start();
            
            if(!Validaciones::validarAcceso('Empleador')){
                header('Location: /404');
                exit();
            }
        }

        function render() {
            $this->loadModel('ofertas_');
            $this->view->listado = $this->model->getMyListado();
            
            $this->view->render('empleador/list_publicaciones');
        }

    }
?>