<?php 
    class Perfil extends controller{

        protected $error_mensaje = [];
        protected $save_modelo;

        function __construct() {
            parent::__construct();
            session_start();

            if(!Validaciones::validarAcceso('Empleador')){
                header('Location: /404');
                exit();
            }

            $this->loadModel('catalogos_');
            $this->view->catalogo_pais = $this->model->catalogo_pais();
            $this->view->catalogo_estado = $this->model->catalogo_estado();
            $this->view->catalogo_municipio = $this->model->catalogo_municipio();
            $this->view->catalogo_colonia = $this->model->catalogo_colonia();
            $this->view->catalogo_empresa = $this->model->catalogo_empresas();
            $this->loadModel('empleador/profile_');
            $this->view->profile_data = $this->model->get();
        }

        function render() {
            $this->view->render('empleador/perfil');
        }

        function update(){
            $validation = Validaciones::validacionesArray([
                'Nombre Empleador'  => $Nombre = Validaciones::checkInputs('nombre'),
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
            ]);

            if (!empty($validation)) 
            {            
                foreach($validation as $Val){
                    array_push($this->error_mensaje, 'Falta su: ' . $Val);
                }
                self::render_update_error();
                return false;
            }

            #VALIDAMOS LA LONGITD DEL VALOR NOMBRE
            if(strlen($Nombre) > 50){
                array_push($this->error_mensaje, 'Longitud Max para el nombre: 50 caracteres');
                self::render_update_error();
                return false;
            }

            #VALIDAMOS LA LONGITD DEL VALOR RC
            if (strlen($RFC) > 13 OR strlen($RFC) < 13) {
                array_push($this->error_mensaje, 'El RFC se conforma por 13 caracteres');
                self::render_update_error();
                return false;
            }

            #VALIDAMOS LA LONGITD DEL VALOR RAZON SOCIAL
            if (strlen($RazonSocial) > 40 ) {
                array_push($this->error_mensaje, 'Longitud Max para la razon social: 40 caracteres');
                self::render_update_error();
                return false;
            }

            #LLAMAMOS EL MODELO PARA REALIZAR EL CARGADO DE DATOS
            $result = $this->model->update();

            #VALIDAMOS EL RESULTADO DEL MODELO
            if ($result == false) {
               array_push($this->error_mensaje, 'Ocurrio Un Error, Intentelo Más Tarde!');
               self::render_update_error();
            }

            #EXITO
            $this->view->success = 'Actualización completada exitosamente! Recargando...';
            $this->view->render('empleador/perfil');
        }

        function destroy(){
            $result = $this->model->destroy();

            if(!$result){
                self::render_update_error();
                //header('location: /');
                return false;
            }
            
            session_unset();
            session_destroy();
            return header('location: /');
        }

        public function render_update_error() {
            $this->view->mensaje = $this->error_mensaje;
            $this->view->render('empleador/perfil');
        }

    }
?>