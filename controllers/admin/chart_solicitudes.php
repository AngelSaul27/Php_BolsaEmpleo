<?php
    require_once 'libs/rules/validaciones.php'; //Cargado de la clase para las reglas de formularios

    class chart_solicitudes extends controller
    {

        public function __construct()
        {
            parent::__construct();
            session_start();
            Validaciones::validarAcceso('Administrador') ? '' : header('location: /error');
        }

        public function chart_solicitudes()
        {
            $this->loadModel('admin/chart_solicitudes_');
            $this->view->chart = $this->model->chart_solicitudes_YEAR();
            $this->view->render('admin/chart_solicitudes');
        }

        public function getChartWhere($condition){

        }
    }
?>