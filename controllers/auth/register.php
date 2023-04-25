<?php
    require_once 'libs/rules/validaciones.php';

    class Register extends controller
    {
        private $error_mensaje = [];

        public function __construct()
        {
            session_start();
            $_SESSION ? header('location: /') : false;
            parent::__construct();
            $this->view->mensaje = [];
        }

        public function render()
        {
            $this->view->render('auth/register');
        }

        public function empresas()
        {
            $this->loadModel('catalogos_');
            $this->view->catalogo_empresa = $this->model->catalogo_empresas();
            $this->view->catalogo_pais = $this->model->catalogo_pais();
            
            switch ($_SERVER['REQUEST_METHOD'] == 'POST') {
                case 'POST':
                    self::procesar_datos_empleador();
                    $this->view->mensaje = $this->error_mensaje;
                    $this->view->render('auth/empresa');
                    break;
                default:
                    $this->view->render('auth/empresa');
                break;
            }
        }

        public function aspirantes()
        {
            switch ($_SERVER['REQUEST_METHOD'] == 'POST') {
                case 'POST':
                    self::procesar_datos_aspirante();
                    $this->view->mensaje = $this->error_mensaje;
                    $this->view->render('auth/aspirante');
                    break;
                default:
                    $this->view->render('auth/aspirante');
                    break;
            }
        }

        public function procesar_datos_aspirante()
        {
            $Fotografia = isset($_FILES['fotografia']['name']) ? $_FILES['fotografia']['name'] : null;

            $validations = Validaciones::validacionesArray([
                'Nombre' => $Nombre = Validaciones::checkInputs('nombre'),
                'Email' => $Email = Validaciones::checkInputs('email'),
                'Confirmar Email'  => $ConfirmarEmail = Validaciones::checkInputs('confirmar_email'),
                'Password' => $Password = Validaciones::checkInputs('password',),
                'Confirmar Password' => $ConfirmarPassword = Validaciones::checkInputs('confirmar_password'),
                'Fecha Nacimiento' => $FechaNacimiento = Validaciones::checkInputs('fecha_nacimiento'),
                'Telefono' => $Telefono = Validaciones::checkInputs('telefono'),
                'Extension Telefonica' => $Extension = Validaciones::checkInputs('ext_telefonica'),
                'Fotografia' =>  !Validaciones::validarFields(null, null, $Fotografia) ? $Fotografia : null,
            ]);

            if (!empty($validations)) {
                foreach ($validations as $Val) {
                    array_push($this->error_mensaje, 'Falta su: ' . $Val);
                }
                return false;
            }

            #VALIDAR LA ESTRUCTURA DEL CORREO
            if (!Validaciones::validarEmail($Email) && !Validaciones::validarEmail($ConfirmarEmail)) {
                array_push($this->error_mensaje, 'Formato de correo electronico incorrecto!');
                return false;
            }

            #COMPARAR QUE LOS CORREOS SEAN IDENTICOS
            if ($Email != $ConfirmarEmail) {
                array_push($this->error_mensaje, 'Sus correos electronicos no coinciden!');
                return false;
            }

            #VALIDAR LA ESTRUCTURA DE LA CONSTRASEÑA
            if (!Validaciones::validarPassword($Password) && !Validaciones::validarPassword($ConfirmarPassword)) {
                array_push($this->error_mensaje, 'Su formtato de contraseña no es valida: Min. 8 caracteres y solo use [@$!%*#?&]');
                return false;
            }

            #COMPARAR QUE LAS CONTRASEÑAS SEAN IDENTICAS
            if ($Password != $ConfirmarPassword) {
                array_push($this->error_mensaje, 'Sus contraseñas no coinciden!');
                return false;
            }

            #VALIDAMOS EL CAMPO DE EXTENSION TELEFONICA
            if (strlen($Extension) >= 4) {
                array_push($this->error_mensaje, 'Para La Extensión Telefonica Use: +000');
                return false;
            }

            #VALIDAMOS EL CAMPO DE TELEFONO
            if (strlen($Telefono) >= 11 or strlen($Telefono) < 10) {
                array_push($this->error_mensaje, 'Un Numero De Telefono Se Comforma De 10 Digitos');
                return false;
            }

            #VALIDAMOS LA EDAD Y LA FECHA
            $fecha_actual = new DateTime();
            $fecha = new DateTime($FechaNacimiento);
            $edad = $fecha_actual->diff($fecha);

            if ($edad->y < 18) {
                array_push($this->error_mensaje, 'Debe Ser Mayor De Edad');
                return false;
            }

            if (!Validaciones::validarFechas($FechaNacimiento, 'Y-m-d')) {
                array_push($this->error_mensaje, 'Formato de Fecha Incorrecto!');
                return false;
            }

            #VALIDAMOS QUE EL ARCHIVO SEA EL CORRECTO Y CUMPLA CON LOS REQURIMIENTOS
            if (!Validaciones::validarArchivos($_FILES['fotografia']['type'], $_FILES['fotografia']['size'])) {
                array_push($this->error_mensaje, 'El Formato O El Tamaño Del Archivo Es Incorrecto');
                return false;
            }

            #SUBIMOS LA IMAGEN A NUESTRO SISTEMA
            $NAME_TEMP = $_FILES['fotografia']['tmp_name'];
            $PATH_DIR = constant('STORAGE') . 'Avatars/';
            if (move_uploaded_file($NAME_TEMP, $PATH_DIR . $Fotografia)) {
                chmod($PATH_DIR . $Fotografia, 0777);
            } else {
                array_push($this->error_mensaje, 'Error Uploading Your Image');
                return false;
            }

            #LLAMAMOS EL MODELO PARA REALIZAR EL CARGADO DE DATOS
            $this->loadModel('auth/register_aspirante_');
            $result = $this->model->insert();

            #VALIDAMOS EL RESULTADO DEL MODELO
            if ($result == false) {
                array_push($this->error_mensaje, 'Ocurrio Un Error, Intentelo Más Tarde!');
            }

            #EXITO
            $this->view->success = 'Registro completado exitosamente!';
        }

        public function procesar_datos_empleador()
        {
            $Fotografia = isset($_FILES['fotografia']['name']) ? $_FILES['fotografia']['name'] : null;

            $validation = Validaciones::validacionesArray([
                'Email' => $Email = Validaciones::checkInputs('email'),
                'Nombre Empleador'  => $Nombre = Validaciones::checkInputs('nombre'),
                'Confirmar Email'  => $ConfirmarEmail = Validaciones::checkInputs('confirmar_email'),
                'Password' => $Password = Validaciones::checkInputs('password',),
                'Confirmar Password' => $ConfirmarPassword = Validaciones::checkInputs('confirmar_password'),
                'Tipo Empresa'  => $TipoEmpresa = Validaciones::checkInputs('tipo_empresa'),
                'Sector Actividad'  => $Sector_Actividad = Validaciones::checkInputs('sector_actividad'),
                'Actividad Economica'  => $Actividad_Economica = Validaciones::checkInputs('actividad_economica'),
                'Subsector' => $SubSector = Validaciones::checkInputs('subsector'),
                'RazonSocial' => $RazonSocial = Validaciones::checkInputs('razon_social'),
                'RFC' => $RFC = Validaciones::checkInputs('RFC'),
                'Pais' => $Pais = Validaciones::checkInputs('pais'),
                'Estado' => $Estado = Validaciones::checkInputs('estado'),
                'Municipio' => $Municipio = Validaciones::checkInputs('municipio'),
                'Colonia' => $Colonia = Validaciones::checkInputs('colonia'),
                'Calle' => $Calle = Validaciones::checkInputs('calle'),
                'Referencias' => $Referencias = Validaciones::checkInputs('referencias'),
                'Numero Ext'  => $NumExt = Validaciones::checkInputs('num_ext'),
                'Numero Int'  => $NumInt = Validaciones::checkInputs('num_int'),
                'Descripcion' => $Descripción = Validaciones::checkInputs('descripcion',),
                'Fotografia' =>  !Validaciones::validarFields(null, null, $Fotografia) ? $Fotografia : null,
            ]);

            if (!empty($validation)) 
            {            
                foreach($validation as $Val){
                    array_push($this->error_mensaje, 'Falta su: ' . $Val);
                }
                return false;
            }

            #VALIDAR LA ESTRUCTURA DEL CORREO
            if (!Validaciones::validarEmail($Email) && !Validaciones::validarEmail($ConfirmarEmail OR $Email != $ConfirmarEmail)) 
            {
                array_push($this->error_mensaje, 'Formato de correo electronico incorrecto!');
                return false;
            }

            #COMPARAR QUE LOS CORREOS SEAN IDENTICOS
            if ($Email != $ConfirmarEmail) {
                array_push($this->error_mensaje, 'Sus correos electronicos no coinciden!');
                return false;
            }

            #VALIDAR LA ESTRUCTURA DE LA CONSTRASEÑA
            if (!Validaciones::validarPassword($Password) && !Validaciones::validarPassword($ConfirmarPassword)) {
                array_push($this->error_mensaje, 'Su formtato de contraseña no es valida: Min. 6 caracteres y solo use [@$!%*#?&], incluya al menos una letra');
                return false;
            }

            #COMPARAR QUE LAS CONTRASEÑAS SEAN IDENTICAS
            if ($Password != $ConfirmarPassword) {
                array_push($this->error_mensaje, 'Sus contraseñas no coinciden!');
                return false;
            }

            #VALIDAMOS QUE EL ARCHIVO SEA EL CORRECTO Y CUMPLA CON LOS REQURIMIENTOS
            if (!Validaciones::validarArchivos($_FILES['fotografia']['type'], $_FILES['fotografia']['size'])) {
                array_push($this->error_mensaje, 'El Formato O El Tamaño Del Archivo Es Incorrecto');
                return false;
            }

            #VALIDAMOS LA LONGITD DEL VALOR NOMBRE
            if(strlen($Nombre) > 50){
                array_push($this->error_mensaje, 'Longitud Max para el nombre: 50 caracteres');
                return false;
            }

            #VALIDAMOS LA LONGITD DEL VALOR RC
            if (strlen($RFC) > 13 OR strlen($RFC) < 13) {
                array_push($this->error_mensaje, 'El RFC se conforma por 13 caracteres');
                return false;
            }

            #VALIDAMOS LA LONGITD DEL VALOR RAZON SOCIAL
            if (strlen($RazonSocial) > 40 ) {
                array_push($this->error_mensaje, 'Longitud Max para la razon social: 40 caracteres');
                return false;
            }

            #SUBIMOS LA IMAGEN A NUESTRO SISTEMA
            $NAME_TEMP = $_FILES['fotografia']['tmp_name'];
            $PATH_DIR = constant('STORAGE') . 'LogosEmpresas/';
            if (move_uploaded_file($NAME_TEMP, $PATH_DIR . $Fotografia)) {
                chmod($PATH_DIR . $Fotografia, 0777);
            } else {
                array_push($this->error_mensaje, 'Error Uploading Your Image');
                return false;
            }

            #LLAMAMOS EL MODELO PARA REALIZAR EL CARGADO DE DATOS
            $this->loadModel('auth/register_empresa_');
            $result = $this->model->insert();

            #VALIDAMOS EL RESULTADO DEL MODELO
            if ($result == false) {
                array_push($this->error_mensaje, 'Ocurrio Un Error, Intentelo Más Tarde!');
            }

            #EXITO
            $this->view->success = 'Registro completado exitosamente!';
        }

    }
?>