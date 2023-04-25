<?php
    class Errores extends Controller{

        #----------------------------------------------------------#
        #               VISTA PARA ERRORES
        #----------------------------------------------------------#
        function __construct(){
            parent::__construct();
            $this->view->render('Errores/index'); //Cargado de la pagina o vista 
        }

    }
?>