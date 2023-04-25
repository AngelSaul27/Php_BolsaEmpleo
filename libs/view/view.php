<?php
    class View{


        function __construct()
        {

        }
        #----------------------------------------------------------#
        #                   CARGADOR DE LA VISTAS
        #----------------------------------------------------------#

        function render($nombre_vista)
        {
            # Nomenclatura de la vista
            require 'views/'.$nombre_vista.'.php';

        }

    }

    
?>