<?php
    require_once 'libs/rules/validaciones.php'; //Cargado de la clase para las reglas de formularios

    class chart_ofertas extends controller
    {

        public function __construct()
        {
            parent::__construct();
            session_start();
            Validaciones::validarAcceso('Administrador') ? '' : header('location: /error');
        }

        public function chart_ofertas()
        {
            $this->loadModel('admin/chart_ofertas_');
            $this->view->chart = $this->model->chart_ofertas_YEAR();
            $this->view->render('admin/chart_ofertas');
        }

        public function getChartWhere($condition){

        }
    }
?>