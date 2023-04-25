<?php
    require_once 'libs/rules/validaciones.php';//Cargado de la clase para las reglas de formularios

    class Administrador extends controller{

        public function __construct()
        {
            parent::__construct();
            session_start();
            Validaciones::validarAcceso('Administrador') ? '': header('location: /error');
        }

        public function render() 
        {
            $this->view->render('admin/index');
        }

        public function aspirantes()
        {
            $this->loadModel('admin/aspirantes_list_');
            $this->view->aspirantes = $this->model->get();
            $this->view->render('admin/list_aspirantes');
        }

        public function ofertas()
        {
            $this->view->render('admin/list_ofertas');
        }

        public function empleadores()
        {
            $this->loadModel('admin/empleados_list_');
            $this->view->datos = $this->model->get();

            $this->view->render('admin/list_empleadores');
        }

        public function chart_aspirantes()
        {
            $this->loadModel('admin/charts_');
            $this->view->chart = $this->model->chart_aspirantes();
            $this->view->render('admin/chart_aspirantes');
        }

        public function chart_empleadores()
        {
            $this->loadModel('admin/charts_');
            $this->view->chart = $this->model->chart_empleadores();
            $this->view->render('admin/chart_empleadores');
        }

    }
