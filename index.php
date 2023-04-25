<?php
    date_default_timezone_set('America/Mexico_City');

    require_once 'config/config.php';
    require_once 'libs/controller/controller.php';
    require_once 'libs/model/model.php';
    require_once 'libs/view/view.php';
    require_once 'libs/database/database.php';
    require_once 'libs/routes/kernel.php';
    require_once 'libs/rules/validaciones.php';
    require_once 'libs/tcpdf/tcpdf.php';
    
    new Kernel();

?>
