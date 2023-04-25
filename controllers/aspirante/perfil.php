
<?php 

    class Perfil extends controller{
        
        public $error_mensaje = [];

        public function __construct()
        {
            parent::__construct();
            session_start();
            
            if(!Validaciones::validarAcceso('Aspirante')){
                header('Location: /login');
                exit();
            }

            $this->loadModel('catalogos_');
            $this->view->catalogo_pais = $this->model->catalogo_pais();
            $this->view->catalogo_estado = $this->model->catalogo_estado();
            $this->view->catalogo_municipio = $this->model->catalogo_municipio();
            $this->view->catalogo_colonia = $this->model->catalogo_colonia();
            $this->view->catalogo_empresa = $this->model->catalogo_empresas();
            $this->view->profesiones = $this->model->catalogo_profesiones();
            $this->view->niveles_academicos = $this->model->catalogo_niveles_academicos();

            $this->loadModel('aspirante/profile_');
            $this->view->profile_data = $this->model->get();
        }

        public function render(){
            $this->view->render('aspirante/profile');
        }

        public function update(){

            $validations = Validaciones::validacionesArray([
                'Nombre' => $Nombre = Validaciones::checkInputs('nombre'),
                'Apellido Materno'  => $ApellidoMaterno = Validaciones::checkInputs('apellido_materno'),
                'Apellido Paterno' => $ApellidoPaterno = Validaciones::checkInputs('apellido_paterno'),
                'Fecha Nacimiento' => $FechaNacimiento = Validaciones::checkInputs('fecha_nacimiento'),
                'Genero' => $Genero = isset($_POST['genero']),
                'Telefono' => $Telefono = Validaciones::checkInputs('telefono'),
                'Extension Telefonica' => $Extension = Validaciones::checkInputs('extension'),
                'Pais' => $Pais = Validaciones::checkInputs('pais'),
                'Estado' => $Estado = Validaciones::checkInputs('estado'),
                'Municipio' => $Municipio = Validaciones::checkInputs('municipio'),
                'Colonia' => $Colonia = Validaciones::checkInputs('colonia'),
                'Calle' => $Calle = Validaciones::checkInputs('calle'),
                'Referencias' => $Referencias = Validaciones::checkInputs('referencias'),
                'Numero Ext'  => $NumExt = Validaciones::checkInputs('num_ext'),
                'Numero Int'  => $NumInt = Validaciones::checkInputs('num_int'),
                'Biografia' => $Biografia = Validaciones::checkInputs('biografia'),
                'Nivel Academico' => $NivelAcademico = Validaciones::checkInputs('nivel_academico'),
                'Lugar Estudio' => $LugarEstudio = Validaciones::checkInputs('lugar_estudio'),
                'Titulo' => $Titulo = Validaciones::checkInputs('titulo'),
                'Fecha Ingreso' => $FechaIngreso = Validaciones::checkInputs('fecha_ingreso'),
                'Fecha Salida' => $FechaSalida = Validaciones::checkInputs('fecha_salida'),
                'Puesto Interes' => $PuestoInteres = Validaciones::checkInputs('puesto_interes'),
                'Salario' => $Salario = Validaciones::checkInputs('salario'),
                'Informacion Personal'  => $InformacionPersonal = Validaciones::checkInputs('informacion_personal'),
            ]);

            if (!empty($validations)) 
            {            
                foreach($validations as $Val){
                    array_push($this->error_mensaje, 'Falta su: ' . $Val);
                }
                self::render_update_error();
                return false;
            }

            $result = $this->model->update();

            #VALIDAMOS EL RESULTADO DEL MODELO
            if ($result == false) {
               array_push($this->error_mensaje, 'Ocurrio Un Error, Intentelo Más Tarde!');
               self::render_update_error();
               return false;
            }

            #EXITO
            $this->view->success = 'Actualización completada exitosamente! Recargando...';
            $this->view->render('aspirante/profile');
        }

        public function destroy(){
            /*
            $result = $this->model->destroy();

            if (!$result) {
                self::render_update_error();
                //header('location: /');
                return false;
            }*/
            
            //session_unset();
            //session_destroy();
            return header('location: /');
        }

        public function render_update_error() {
            $this->view->mensaje = $this->error_mensaje;
            $this->view->render('aspirante/profile');
        }

    }
?>