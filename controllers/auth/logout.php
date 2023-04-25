<?php
    class Logout extends controller{

        public function __construct()
        {
            session_start();
            if($_SESSION){
                #BORRA TODAS LAS VARIABLES DE LA SESSIÓN
                session_unset();
                #DESTRUYE LA SESSION
                session_destroy();
                #REDIRECCIONAMOS
                header('Location:'.constant('URL'));
                return false;
            }
        }

        public function render(){
            return new Errores();
        }

    }