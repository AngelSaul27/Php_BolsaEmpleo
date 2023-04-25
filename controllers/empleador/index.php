<?php
    require_once 'libs/rules/validaciones.php';

    class Index extends controller{

        function __construct()
        {
            parent::__construct();
            session_start();
            
            if(!Validaciones::validarAcceso('Empleador')){
                header('Location: /404');
                exit();
            }
        }

        function render()
        {
            $this->view->render('empleador/index');
        }

        function aspirante()
        {
            $this->loadModel('admin/aspirantes_list_');
            $this->view->aspirantes = $this->model->getAllData();
            $this->view->render('empleador/list_aspirantes');
        }
    }

?>