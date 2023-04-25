<?php
    /* Controlador de la pagina lading page */
    class Home extends Controller{

        function __construct(){
            parent::__construct();
        }

        public function render()
        {
            $this->view->render('home');
        }
    }

?>