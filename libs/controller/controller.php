<?php
    class controller{

        #----------------------------------------------------------#
        #                        CONTROLLER
        #       INTERMEDIARIO ENTRE EL MODELO Y LAS VISTAS
        #----------------------------------------------------------#

        function __construct()
        {
            $this->view = new View();
        }

        #----------------------------------------------------------#
        #     CARGADOR DEL MODELO PARA CONSULTAS CON LA BDD
        #----------------------------------------------------------#
        function loadModel($model){
            //Nomemclatura de los archivos models
            $URL = 'models/'.$model.'model.php';
            $strpos = strpos($model,'/');
            if($strpos !== false){
                $model = substr($model, strrpos($model,'/')+1, strlen($model));
            }
            //Comprobamos que los archivos models existan
            if(file_exists($URL)){
                require $URL;
                $modelName = $model.'Model';
                $this->model = new $modelName(); //Llamamos al modelo
            }else{
                echo 'failed to load model';
            }
        }

    }

?>