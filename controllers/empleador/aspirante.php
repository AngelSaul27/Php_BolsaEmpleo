<?php
require_once 'libs/rules/validaciones.php'; //Cargado de la clase para las reglas de formularios

class Aspirante extends controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
        Validaciones::validarAcceso('Empleador') ? '' : header('location: /error');
    }

    public function vw_aspirantes($id)
    {
        $this->loadModel('admin/aspirantes_list_');
        $valor = $this->model->getAll($id);

        if (empty($valor)) {
            new Errores();
            return false;
        }

        $this->view->aspirantes = $valor;
        $this->view->render('aspirante/view');
    }


}
