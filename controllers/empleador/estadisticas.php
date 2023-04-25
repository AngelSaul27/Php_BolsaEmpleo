<?php
class Estadisticas extends controller
{

    function __construct()
    {
        parent::__construct();
        session_start();

        if (!Validaciones::validarAcceso('Empleador')) {
            header('Location: /404');
            exit();
        }
    }

    public function render()
    {
        $this->loadModel('empleador/estadisticas_');
        $this->view->estadisticas = $this->model->getEstadisticasOferts();

        $this->view->render('empleador/estadisticas');
    }

    public function mis_ofertas($filter = 'Categoria, Mes', $order = 'Mes')
    {
        $this->loadModel('empleador/estadisticas_');
        $Datos_BDD = $this->model->mis_ofertas_estad(true, $filter, $order);

        if($Datos_BDD == false){
            $this->view->render('empleador/mis_ofertas');
            return false;
        }

        $this->view->estadisticas = $Datos_BDD; //DATOS PARA LA TABLA
        
        $Datos_Procesados = self::extraer_datos_chart($Datos_BDD);
        $this->view->OrganizeArray = self::slice_array($Datos_Procesados); //DATOS PARA LA GRAFICA EN STRING

        #===============[ VISTA ]================#
        $this->view->render('empleador/mis_ofertas');
    }

    public function mis_contrataciones($filter = 'Categoria, Mes', $order = 'Mes'){
        $this->loadModel('empleador/estadisticas_');
        $Datos_BDD = $this->model->mis_contrataciones_estad(true, $filter, $order);

        if ($Datos_BDD == false) {
            $this->view->render('empleador/mis_contrataciones');
            return false;
        }

        $this->view->estadisticas = $Datos_BDD; //DATOS PARA LA TABLA

        $Datos_Procesados = self::extraer_datos_chart($Datos_BDD);
        $this->view->OrganizeArray = self::slice_array($Datos_Procesados); //DATOS PARA LA GRAFICA EN STRING

        #===============[ VISTA ]================#
        $this->view->render('empleador/mis_contrataciones');
    }

    public function slice_array($array, $limite = 12){
        $temp_array = [];
        for($i = 0; $i < count($array); $i++){
            array_push($temp_array, array_slice($array, $i, $limite));
            $i = $i+($limite-1);
        }

        for ($i = 0; $i < count($temp_array); $i++) {
            $extraction = '[';
            foreach ($temp_array[$i] as $key => $val) {
                if($key < count($temp_array[$i])-1) {
                    $extraction .= strval($val).',';
                }else{
                    $extraction .= strval($val);
                }
            }
            $extraction .= ']';
            $temp_array[$i] = $extraction;
        }

        return $temp_array;
    }

    //ESTA FUNCION EXTRA LOS DATOS PARA LA GRAFICA DE FORMA ORGANIZADA
    public function extraer_datos_chart($data)
    {
        $Meses = [
            'Enero' => [], 'Febrero' => [], 'Marzo' => [], 'Abril' => [],
            'Mayo' => [],'Junio' => [], 'Julio' => [],'Agosto' => [],
            'Septiembre' => [],'Octubre' => [], 'Noviembre' => [],'Diciembre' => [],
        ];

        $Longitud = [0,0,0,0,0,0,0,0,0,0,0,0];

        //-------OBTENEMOS LA LONGITUD DEL ARRAY----//
        foreach ($data as $valor) {
            if ($valor['Mes'] == 1) {
                array_push($Meses['Enero'], $valor);
                $Longitud[0] = $Longitud[0] + 1;
            }
            if ($valor['Mes'] == 2) {
                array_push($Meses['Febrero'], $valor);
                $Longitud[1] = $Longitud[1] + 1;
            } 
            if ($valor['Mes'] == 3) {
                array_push($Meses['Marzo'], $valor);
                $Longitud[2] = $Longitud[2] + 1;
            }
            if ($valor['Mes'] == 4) {
                array_push($Meses['Abril'], $valor);
                $Longitud[3] = $Longitud[3] + 1;
            } 
            if ($valor['Mes'] == 5) {
                array_push($Meses['Mayo'], $valor);
                $Longitud[4] = $Longitud[4] + 1;
            } 
            if ($valor['Mes'] == 6) {
                array_push($Meses['Junio'], $valor);
                $Longitud[5] = $Longitud[5] + 1;
            }
            if ($valor['Mes'] == 7) {
                array_push($Meses['Julio'], $valor);
                $Longitud[6] = $Longitud[6] + 1;
            } 
            if ($valor['Mes'] == 8) {
                array_push($Meses['Agosto'], $valor);
                $Longitud[7] = $Longitud[7] + 1;
            }
            if ($valor['Mes'] == 9) {
                array_push($Meses['Septiembre'], $valor);
                $Longitud[8] = $Longitud[8] + 1;
            } 
            if ($valor['Mes'] == 10) {
                array_push($Meses['Octubre'], $valor);
                $Longitud[9] = $Longitud[9] + 1;
            } 
            if ($valor['Mes'] == 11) {
                array_push($Meses['Noviembre'], $valor);
                $Longitud[10] = $Longitud[10] + 1;
            } 
            if ($valor['Mes'] == 12) {
                array_push($Meses['Diciembre'], $valor);
                $Longitud[11] = $Longitud[11] + 1;
            } 
        }
        //-------------END GET LONGITUD-------------//

        $rel = self::organizeArray($Meses, $Longitud);

        //RETORNAMOS EL INDEX Y EL ARRAY ORGANIZADO
        return $rel;
    }

    public function organizeArray($Meses, $ValueArray){
        /*==========================================================
            Buscamos el valor más alto del array y devolvemos el 
            indice de la posición del array donde se encuentra el 
            valor más alto del array 
        ============================================================*/
        $aux = $referencia = 0;

        for ($i = 0; $i < count($ValueArray); $i++) {
            for ($j = 0; $j < (count($ValueArray) - 1); $j++) {
                if ($ValueArray[$j] > $ValueArray[$j + 1]) {
                    if ($aux < $ValueArray[$j]) {
                        $aux = $ValueArray[$j];
                        $referencia = $j;
                    }
                } else {
                    if ($aux < $ValueArray[$j + 1]) {
                        $aux = $ValueArray[$j + 1];
                        $referencia = $j + 1;
                    }
                }
            }
        }

        //ORGANIZAMOS EL ARRAY
        $array_consulta = $array_total = $array_categoria = [];

        for ($i = 0; $i < $ValueArray[$referencia]; $i++) {
            if (!empty($Meses['Enero'])) {
                if ($i < count($Meses['Enero'])) {
                    $valor = $Meses['Enero'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Febrero'])) {
                if ($i < count($Meses['Febrero'])) {
                    $valor = $Meses['Febrero'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Marzo'])) {
                if ($i < count($Meses['Marzo'])) {
                    $valor = $Meses['Marzo'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Abril'])) {
                if ($i < count($Meses['Abril'])) {
                    $valor = $Meses['Abril'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Mayo'])) {
                if ($i < count($Meses['Mayo'])) {
                    $valor = $Meses['Mayo'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Junio'])) {
                if ($i < count($Meses['Junio'])) {
                    $valor = $Meses['Junio'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Julio'])) {
                if ($i < count($Meses['Julio'])) {
                    $valor = $Meses['Julio'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Agosto'])) {
                if ($i < count($Meses['Agosto'])) {
                    $valor = $Meses['Agosto'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Septiembre'])) {
                if ($i < count($Meses['Septiembre'])) {
                    $valor = $Meses['Septiembre'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Octubre'])) {
                if ($i < count($Meses['Octubre'])) {
                    $valor = $Meses['Octubre'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Noviembre'])) {
                if ($i < count($Meses['Noviembre'])) {
                    $valor = $Meses['Noviembre'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
            if (!empty($Meses['Diciembre'])) {
                if ($i < count($Meses['Diciembre'])) {
                    $valor = $Meses['Diciembre'];
                    $data = $valor[$i];
                    array_push($array_consulta, $data['Consulta']);
                } else {
                    array_push($array_consulta, 0);
                }
            } else {
                array_push($array_consulta, 0);
            }
        }

        return $array_consulta;
    }
}
