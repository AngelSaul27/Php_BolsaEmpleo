<?php
    require_once 'routes/App.php';
    class Kernel{

        private static $Param = null, $Route = null, $Brackets = null;

        #----------------------------------------------------------#
        #           INICIALIZAMOS EL ARCHIVO DE RUTAS
        #----------------------------------------------------------#
        public function __construct()
        {
            new App();
        }
        
        #----------------------------------------------------------#
        #         VALIDAMOS SI LA RUTA SE RESIVE CON GET
        #----------------------------------------------------------#
        public function get($url, $controller = null, $method = null){
            switch ($_SERVER['REQUEST_METHOD'] == 'GET') {
                case 'GET':
                    Kernel::procesardor_URL($url, $controller, $method);
                break;
            }
        }

        #----------------------------------------------------------#
        #        VALIDAMOS SI LA RUTA SE RESIVE CON POST
        #----------------------------------------------------------#
        public function post($url, $controller = null, $method = null){
            switch($_SERVER['REQUEST_METHOD'] == 'POST'){
                case 'POST':
                    Kernel::procesardor_URL($url, $controller, $method);
                break;
            }
        }

        #----------------------------------------------------------#
        #                   PROCESAMOS LAS RUTAS
        #   SE VALIDA LA URL, CONTROLADOR, METODO Y PARAMETROS
        #----------------------------------------------------------#
        private function procesardor_URL($url, $controller = null, $method = null){
            self::$Route = isset($_GET['url']) ? $_GET['url'] : null ;
            self::$Route = rtrim(self::$Route, '/');

            #Solo incluye el dominio entonces esta accediendo a la página inicial
            if(self::$Route == null){
                $controller = require_once 'controllers/home.php';
                $controller = new Home();
                $controller->render();
                die();
            }

            #Existen parametros en las URL definidas
            $strpos = strpos($url, '{');
            if ($strpos !== false) {
                $explodeUrl = explode('/', $url);
                $explodeRoute = explode('/', self::$Route);

                #Sus parametros despues de / son mayor o igual que la URL definida
                if (count($explodeRoute) >= count($explodeUrl)) {
                    Kernel::obtener_parametros($explodeUrl, $explodeRoute);
                    $url = Kernel::reemplazar_ultimo($explodeUrl[self::$Brackets], '', $url);
                    $url = rtrim($url, '/');
                }
            }
            
            if($url == self::$Route){
                if($controller != null){
                    require_once 'controllers/'.$controller.'.php';
    
                    $strposClass = strpos($controller, '/');
                    
                    if($strposClass !== false){
                        $clase = explode('/', $controller);
                        $longitud = sizeof($clase);
                        $controller = $clase[$longitud-1];
                    }

                    $controllers = new $controller();
                    
                    if (self::$Param != null && $method != null) {
                        $controllers->{$method}(self::$Param);
                        die();
                    }
                    
                    if($method != null && self::$Param == null){
                        $controllers->{$method}();
                        die();
                    }
                }
                $controllers->render();
                die();
            }
        }

        #----------------------------------------------------------#
        #     SE ENCARGA DE EXTAER LOS PARAMETROS DE LA URL
        #----------------------------------------------------------#
        private function obtener_parametros($explodeUrl, $explodeRoute) {
            foreach ($explodeUrl as $key => $value) {
                $pos = strpos($value, '{');
                if ($pos !== false) {
                    self::$Brackets = $key;
                }
            }
            self::$Param = array_slice($explodeRoute, self::$Brackets);
            self::$Param  = implode('/', self::$Param);

            self::$Route = array_slice($explodeRoute, 0, self::$Brackets);
            self::$Route = implode('/',self::$Route);
        }

        #----------------------------------------------------------#
        #               FILTRADOR PARA LA URLS
        #----------------------------------------------------------#
        private function reemplazar_ultimo($buscar, $remplazar, $texto) {
            $pos = strrpos($texto, $buscar);
            if ($pos !== false) {
                $texto = substr_replace($texto, $remplazar, $pos, strlen($buscar));
            }
            return $texto;
        }

    }
