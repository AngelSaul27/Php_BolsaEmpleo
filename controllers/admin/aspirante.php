<?php
    require_once 'libs/rules/validaciones.php';//Cargado de la clase para las reglas de formularios

    class Aspirante extends controller{

        public function __construct()
        {
            parent::__construct();
            session_start();
            Validaciones::validarAcceso('Administrador') ? '': header('location: /error');
        }

        public function destroy($id){
            $this->loadModel('admin/aspirantes_list_');
            
            if(!$this->model->destroy($id)){
                header('Location: /404');
                return false;
            }
            
            header('Location: /administrador/aspirantes');
        }
    }
?>