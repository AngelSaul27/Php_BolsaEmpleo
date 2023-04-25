<?php

    class Model{

        #----------------------------------------------------------#
        #                   CONEXION A LA BDD
        #----------------------------------------------------------#
        function __construct()
        {
            $this->db = new Database();
        }

    }

?>
