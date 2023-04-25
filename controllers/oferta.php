<?php
    require_once 'libs/rules/validaciones.php';
    
    class Oferta extends Controller
    {

        protected $error_mensaje = [];

        function __construct()
        {
            parent::__construct();
            session_start();
            $this->view->mensaje = [];
        }

        public function vw_index()
        {
            $this->loadModel('ofertas_');
            $this->view->items = $this->model->getAllOfferts();
            
            if ($_SESSION) {
                #LISTAS DE LAS OFERTAS QUE COINCIDAN PARA EL EMPLEADOR
                $this->view->render('oferta/index');
            } else {
                #MODELO CON LISTAS DE TODOS LAS OFERTAS
                $this->view->render('oferta/index');
            }
        }

        public function vw_view($id){

            //LLAMAMOS AL MODELO OFERTAS
            $this->loadModel('ofertas_');
            //OBTENEMOS LA OFERTA DEACUERDO AL ID
            $count = $this->view->oferta = $this->model->getOffert($id);

            if(empty($count)){            
                new Errores();
            }

            //LLAMAMOS AL MODELO SOLICITUDES
            $this->loadModel('solicitud_');

            if($_SESSION){
                //ACCEDEMOS AL METODO CHECKVALIDITY Y ASI COMPROBAR EL ESTADO DE LA SOLICITUD
                if(count($this->model->checkValidity($id))){
                    //TIENE UNA SOLICITUD
                    $this->view->postulacion = true;
                }else{
                    //NO TIENE DICHA SOLICITUD
                    $this->view->postulacion = false;
                }
            }

            //TRANSACCION DE CONSULTAS, REGISTRAMOS QUE UN USUARIO REALIZO UNA CONSULTA EN ESTA OFERTA.
            $this->loadModel('views');
            $this->model->saveView($id);

            //RETORNAMOS LA VISTA
            $this->view->render('oferta/view');
        }

        function oferta_postularme($id){
            $this->loadModel('solicitud_');
            $result = $this->model->checkValidity($id);
            $result == false OR $result == null ? new Errores(): '' ;

            $resultado = $this->model->crear($id);

            if(!$resultado){
                new Errores();
                return false;
            }
            
            header('Location: /oferta/view/'.$id);
        }

        public function vw_form()
        {
            if(!Validaciones::validarAcceso('Empleador')){
                header('Location: /404');
                exit();
            }
            $this->loadModel('catalogos_');
            $this->view->catalogo_pais = $this->model->catalogo_pais();
            $this->view->catalogo_categoria = $this->model->catalogo_categoria_ofertas();

            $this->view->render('empleador/form_ofertas');
        }

        public function vw_form_edit($id){
            if(!Validaciones::validarAcceso('Empleador')){
                header('Location: /404');
                exit();
            }
            $this->loadModel('catalogos_');
            $this->view->catalogo_pais = $this->model->catalogo_pais();
            $this->view->catalogo_estado = $this->model->catalogo_estado();
            $this->view->catalogo_municipio = $this->model->catalogo_municipio();
            $this->view->catalogo_colonia = $this->model->catalogo_colonia();
            $this->view->catalogo_categoria = $this->model->catalogo_categoria_ofertas();
            $this->loadModel('ofertas_');
            $oferta = $this->model->getOffert($id);
            empty($oferta) ? header('Location: /404') : ''; // 404 error message
            $this->view->oferta = $oferta;
            
            $this->view->render('empleador/form_ofertas_edit');
        }

        public function update($id) {
            if (!Validaciones::validarAcceso('Empleador') OR empty($id)) {
                header('Location: /404');
                exit();
            }
            $validations = Validaciones::validacionesArray([
                'Titulo' => $Titulo = Validaciones::checkInputs('titulo'),
                'Fecha_Inicio' => $Fecha_Inicio = Validaciones::checkInputs('fecha_inicio'),
                'Fecha_Final'  => $Fecha_Final = Validaciones::checkInputs('fecha_termino'),
                'Categoria' => $Categoria = Validaciones::checkInputs('oferta_catagoria',),
                'Puestos' =>  Validaciones::checkInputs('puestos_disponibles'),
                'Salario' =>  Validaciones::checkInputs('salario'),
                'Beneficios' => $Beneficios = Validaciones::checkInputs('beneficios'),
                'Informacion' => $Informacion = Validaciones::checkInputs('informacion_extra'),
                'Pais' => $Pais = Validaciones::checkInputs('pais'),
                'Estado' => $Estado = Validaciones::checkInputs('estado'),
                'Municipio' => $Municipio = Validaciones::checkInputs('municipio'),
                'Colonia' => $Colonia = Validaciones::checkInputs('colonia'),
                'Calle' => $Calle = Validaciones::checkInputs('calle'),
                'Referencias' => $Referencias = Validaciones::checkInputs('referencia'),
                'NumeroExt'  => $NumExt = Validaciones::checkInputs('num_ext'),
                'NumeroInt'  => $NumInt = Validaciones::checkInputs('num_int'),
            ]);

            if (!empty($validations)) {
                if (count($validations) >= 12) {
                    array_push($this->error_mensaje, 'Complete todos los campos');
                    self::errors();
                    return false;
                }

                foreach ($validations as $key => $Val) {
                    if ($key == 0) {
                        array_push($this->error_mensaje, '<span style="color: tomato">Complete los siguientes campos:</span>');
                    }
                    array_push($this->error_mensaje, ' ' . $Val . ', ');
                }
                self::errors();
                return false;
            }

            if (strlen($Titulo) > 75) {
                array_push($this->error_mensaje, 'Longitud Max del Titulo: 75');
                self::errors();
                return false;
            }

            if (strlen($Beneficios) > 400) {
                array_push($this->error_mensaje, 'Longitud Max de los Beneficios: 180');
                self::errors();
                return false;
            }

            if (strlen($Informacion) > 400) {
                array_push($this->error_mensaje, 'Longitud Max de la información: 255');
                self::errors();
                return false;
            }

            if (strlen($Referencias) > 50) {
                array_push($this->error_mensaje, 'Longitud Max de la información: 255');
                self::errors();
                return false;
            }

            if (strlen($NumExt) > 6 or strlen($NumInt) > 6) {
                array_push($this->error_mensaje, 'Longitud Max Num. Ext o Num. Int: 6');
                self::errors();
                return false;
            }

            if (!Validaciones::validarFechas($Fecha_Inicio, 'Y-m-d') or !Validaciones::validarFechas($Fecha_Final, 'Y-m-d')) {
                array_push($this->error_mensaje, 'Formato de Fechas Incorrecto');
                self::errors();
                return false;
            }
            #LLAMAMOS EL MODELO PARA REALIZAR EL CARGADO DE DATOS
            $this->loadModel('ofertas_');
            $result = $this->model->update($id);

            #VALIDAMOS EL RESULTADO DEL MODELO
            if ($result == false) {
                array_push($this->error_mensaje, 'Ocurrio Un Error, Intentelo Más Tarde!');
                self::errors();
                header('Location: /empleador/publicaciones');
                return false;
            }

            header('location: /empleador/publicaciones');
        }

        public function create()
        {
            if(!Validaciones::validarAcceso('Empleador')){
                header('Location: /404');
                exit();
            }

            $Fotografia = isset($_FILES['fotografia']['name']) ? $_FILES['fotografia']['name'] : null;

            $validations = Validaciones::validacionesArray([
                'Titulo' => $Titulo = Validaciones::checkInputs('titulo'),
                'Fecha_Inicio' => $Fecha_Inicio = Validaciones::checkInputs('fecha_inicio'),
                'Fecha_Final'  => $Fecha_Final = Validaciones::checkInputs('fecha_termino'),
                'Categoria' => $Categoria = Validaciones::checkInputs('oferta_catagoria',),
                'Puestos' =>  Validaciones::checkInputs('puestos_disponibles'),
                'Salario' =>  Validaciones::checkInputs('salario'),
                'Beneficios' => $Beneficios = Validaciones::checkInputs('beneficios'),
                'Informacion' => $Informacion = Validaciones::checkInputs('informacion_extra'),
                'Pais' => $Pais = Validaciones::checkInputs('pais'),
                'Estado' => $Estado = Validaciones::checkInputs('estado'),
                'Municipio' => $Municipio = Validaciones::checkInputs('municipio'),
                'Colonia' => $Colonia = Validaciones::checkInputs('colonia'),
                'Calle' => $Calle = Validaciones::checkInputs('calle'),
                'Referencias' => $Referencias = Validaciones::checkInputs('referencia'),
                'NumeroExt'  => $NumExt = Validaciones::checkInputs('num_ext'),
                'NumeroInt'  => $NumInt = Validaciones::checkInputs('num_int'),
                'Fotografia' =>  !Validaciones::validarFields(null, null, $Fotografia) ? $Fotografia : null,
            ]);

            if (!empty($validations)) {
                if (count($validations) >= 12) {
                    array_push($this->error_mensaje, 'Complete todos los campos');
                    self::errors();
                    return false;
                }

                foreach ($validations as $key => $Val) {
                    if ($key == 0) {
                        array_push($this->error_mensaje, '<span style="color: tomato">Complete los siguientes campos:</span>');
                    }
                    array_push($this->error_mensaje, ' ' . $Val . ', ');
                }
                self::errors();
                return false;
            }

            if (strlen($Titulo) > 75) {
                array_push($this->error_mensaje, 'Longitud Max del Titulo: 75');
                self::errors();
                return false;
            }

            if (strlen($Beneficios) > 180) {
                array_push($this->error_mensaje, 'Longitud Max de los Beneficios: 180');
                self::errors();
                return false;
            }

            if (strlen($Informacion) > 255) {
                array_push($this->error_mensaje, 'Longitud Max de la información: 255');
                self::errors();
                return false;
            }

            if (strlen($Referencias) > 50) {
                array_push($this->error_mensaje, 'Longitud Max de la información: 255');
                self::errors();
                return false;
            }

            if (strlen($NumExt) > 6 or strlen($NumInt) > 6) {
                array_push($this->error_mensaje, 'Longitud Max Num. Ext o Num. Int: 6');
                self::errors();
                return false;
            }

            if (!Validaciones::validarFechas($Fecha_Inicio, 'Y-m-d') or !Validaciones::validarFechas($Fecha_Final, 'Y-m-d')) {
                array_push($this->error_mensaje, 'Formato de Fechas Incorrecto');
                self::errors();
                return false;
            }

            #SUBIMOS LA IMAGEN A NUESTRO SISTEMA
            $NAME_TEMP = $_FILES['fotografia']['tmp_name'];
            $PATH_DIR = constant('STORAGE') . 'Ofertas/';
            if (move_uploaded_file($NAME_TEMP, $PATH_DIR . $Fotografia)) 
            {
                chmod($PATH_DIR . $Fotografia, 0777);
            } else {
                array_push($this->error_mensaje, 'Error Uploading Your Image');
                self::errors();
                return false;
            }

            #LLAMAMOS EL MODELO PARA REALIZAR EL CARGADO DE DATOS
            $this->loadModel('ofertas_');
            $result = $this->model->insert();

            #VALIDAMOS EL RESULTADO DEL MODELO
            if ($result == false) {
                array_push($this->error_mensaje, 'Ocurrio Un Error, Intentelo Más Tarde!');
                self::errors();
            }

            #EXITO
            $this->view->success = 'Oferta publicada exitosamente!';
            $this->view->render('empleador/form_ofertas');
        }

        public function errors(){
            $this->loadModel('catalogos_');
            $this->view->catalogo_pais = $this->model->catalogo_pais();
            $this->view->catalogo_categoria = $this->model->catalogo_categoria_ofertas();
            $this->view->mensaje = $this->error_mensaje;
            $this->view->render('empleador/form_ofertas');
        }

        public function destroy($id) {
            if(!Validaciones::validarAcceso('Empleador')){
                header('Location: /404');
                exit();
            }

            $this->loadModel('ofertas_');
            $this->model->destroy($id);

            header('Location: /empleador/publicaciones');
        }
    }
?>