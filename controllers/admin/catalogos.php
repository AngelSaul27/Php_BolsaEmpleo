<?php 
    require_once 'libs/rules/validaciones.php';

    class Catalogos extends Controller{

        public function __construct(){
            parent::__construct();
            session_start();
            Validaciones::validarAcceso('Administrador') ? '': header('location: /error');
        }

        public function render(){
            $this->loadModel('catalogos_');
            $this->view->pais = $this->model->catalogo_pais();
            $this->view->estado = $this->model->catalogo_estado();
            $this->view->municipio = $this->model->catalogo_municipio();
            $this->view->colonia = $this->model->catalogo_colonia();

            $this->view->render('admin/catalogos/direcciones');
        }

    }

?>