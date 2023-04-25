<?php 

    class Validaciones{
        
        #----------------------------------------------------------#
        #     VALIDAMOS LOS RELES PARA EL ACCESO AL SITIO
        #----------------------------------------------------------#
        

        public static function validarAcceso($role) # VALIDAMOS LOS ROLES
        {

            if(!isset($_SESSION['role'])){
                return false;
            }

            if($_SESSION['role'] != $role){
                return false;
            }

            return true;
        }

        public static function validarMultiAcceso($role, $role2) # 
        {
            if (!isset($_SESSION['role'])) {
                return false;
            }

            if ($_SESSION['role'] == $role) {
                return true;
            }

            if($_SESSION['role'] == $role2){
                return true;
            }
            
            return false;
        }
        
        #----------------------------------------------------------#
        #     VALIDAMOS LA ESCTRUCTURA DEL EMAIL CON UN REGX
        #----------------------------------------------------------#

        public static function validarEmail($email) # 
        {
            $regx = '/[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/';

            if (preg_match($regx, $email)) {
                return true;
            }

            return false;
        }

        #----------------------------------------------------------#
        #    VALIDAMOS LA ESTRUCTURA DE UNA CONTRASEÑA CON REGX
        #----------------------------------------------------------#

        public static function validarPassword($password)
        {
            $regx = '/^(?=.*[A-Za-z])(?:.*\d|)(?:[@$!%*#?&]|)[A-Za-z\d@$!%*#?&]{6,}$/';

            if (preg_match($regx, $password)) {
                return true;
            }

            return false;
        }

        #----------------------------------------------------------#
        #     ANALIZA UN ARREGLO DE VALIDACIONES Y RETORNAMOS
        # UN ARREGLO CON LOS CAMPOS QUE TIENEN EL ERROR, SE USA EL
        #  IDENTIFADOR QUE SE PROPORCIONA EN EL ARREGLO ENTRANTE
        #----------------------------------------------------------#

        public static function validacionesArray($array)
        {
            $errores_array = [];
            foreach( $array as $Key => $value ){
                if($value == '' OR $value == null){
                    array_push($errores_array, $Key);
                }
            }
            return $errores_array;
        }

        #----------------------------------------------------------#
        #      VALIDAMOS SI EXISTE EL VALOR DE UN POST; SI EXITE 
        #      RETORNAMOS EL VALOR; NO EXITE RETORNAMOS UN NULL
        #----------------------------------------------------------#

        public static function checkInputs($name) 
        {
            if (isset($_POST[$name]) != null && !self::validarFields($_POST[$name])) {
                return false;
            }
            return $_POST[$name];
        }

        #----------------------------------------------------------#
        # VALIDAMOS QUE UN ARCHIVO CUMPLA CON LAS REGLAS DEFINIDAS
        #----------------------------------------------------------#

        public static function validarArchivos($tipo, $tamaño, $tamañoMax = null, $reglas = null)
        {
            if($reglas == null AND $tamañoMax == null){
                if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamaño < 3000000))) 
                {
                    return false;
                }
            }
            
            return true;
        }

        #----------------------------------------------------------#
        #      VALIDADOR DE LA ESTRUCTURA DE UNA FECHA
        #----------------------------------------------------------#

        public static function validarFechas($date, $format = 'Y-m-d H:i:s')
        {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }

        #----------------------------------------------------------#
        #      VALIDADOR EXTRA INDIVUAL DE INPUTS CON TRIM
        #----------------------------------------------------------#

        public static function validarFields($campo = null, $campos = [], $files = null)
        {
            if ($campo != null) {
                if (empty($campo)) {
                    return false;
                }
                if (empty(trim($campo))) {
                    return false;
                }
                if($campo == null) {
                    return false;
                }
                return true;
            }

            if(!empty($campos)){
                foreach($campos as $values){
                    if(empty($values)){
                        return false;
                    }
                    if(empty(trim($values))){
                        return false;
                    }
                }
                return true;
            }

            if($files != null){
                if (!isset($files) or $files == ""){
                    return true;
                }
                return false;
            }
            return false;
        }

    }

?>