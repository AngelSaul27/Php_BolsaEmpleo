<?php
require_once 'libs/rules/validaciones.php'; //Cargado de la clase para las reglas de formularios

class vw_empleadores extends controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
        Validaciones::validarAcceso('Administrador') ? '' : header('location: /error');
    }

    public function vw_empleadores($id)
    {
        $this->loadModel('admin/empleados_list_');
        $valor = $this->model->getAll($id);

        if(empty($valor)){
            new Errores();
            return false;
        }

        $this->view->empleador = $valor;
        $this->view->render('empleador/view');
    }

}
