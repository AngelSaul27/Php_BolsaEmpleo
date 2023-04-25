<?php 

    class Consultas extends Controller{

        public function __construct(){
            parent::__construct();
        }

        #----------------------------------------------------------#
        #      CONSULTAS A CATALOGOS EN TIMEPO REAL CON AJAX
        #----------------------------------------------------------#

        public function consulta_estado($pais_id){
            $this->loadModel('consultas_');
            return $this->model->consulta_estado($pais_id);
        }

        public function consulta_municipio($estado_id){
            $this->loadModel('consultas_');
            return $this->model->consulta_municipio($estado_id);
        }

        public function consulta_colonia($municipio_id){
            $this->loadModel('consultas_');
            return $this->model->consulta_colonia($municipio_id);
        }

    }

?>