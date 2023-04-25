<?php
    require_once 'libs/rules/validaciones.php';

    class Curiculum extends Controller{

        private $PDF_Class;

        function __construct()
        {
            session_start();
            Validaciones::validarAcceso('Administrador') ? '' : header('location: /error');
        }

        function aspirantes($id){
            $this->loadModel('admin/aspirantes_list_');
            $valor = $this->model->getAll($id);
            $valor = $valor[0];

            if(empty($valor)){
                new Errores();
                return false;
            }

            $this->PDF_Class = new Curiculum_PDF();
            $this->PDF_Class->Aspirantes($valor);
        }
    }

    class Curiculum_PDF extends TCPDF{

        function Aspirantes($datos){
            $Validador = false;
            #PROCESADO DE LOGO TEMPORAL
            $Valor = $datos['Fotografia'];
            $check = substr($Valor, 0, 5);
            if ($check == 'https') {
                $Validador = true;
            }

            //GENERA PDF
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            
            $pdf->SetTitle('Curriculum_'. $datos['Nombre'] . ' ' . $datos['ApellidoPaterno'] . ' ' . $datos['ApellidoMaterno']);

            $pdf->AddPage();
            
            $pdf->SetTextColor(127,127,127);
            
            $pdf->image(constant('URL')."resources/images/Formato_CV.jpg", 10, 10, 200);

            $pdf->StartTransform();
            if(!$Validador){
                $pdf->image(constant('URL')."public/img/Storage/Avatars/". $datos['Fotografia'], 95, 37, 30);
            }else{
                $pdf->StarPolygon(110, 53, 13, 90, 1, 0, 0, 'CNZ');
                $pdf->image($datos['Fotografia'], 95, 40, 30);
            }
            $pdf->StopTransform();

            
            $pdf->SetFont('dejavusans', '', 10, '', false);

            $pdf->setXY(84, 76);
            $pdf->cell(0,0, $datos['Nombre'] . ' ' . $datos['ApellidoPaterno'] . ' ' . $datos['ApellidoMaterno']);

            $pdf->setXY(39,98.5);
            $pdf->cell(0,0, $datos['Pais']);

            $pdf->setXY(69,98.5);
            $pdf->cell(0,0, $datos['Estado']);

            $pdf->setXY(106,98.5);
            $pdf->cell(0,0, $datos['Municipio']);

            $pdf->setXY(138,98.5);
            $pdf->cell(0,0, $datos['Colonia']);

            $pdf->setXY(39,110);
            $pdf->cell(0,0, $datos['Referencias']);

            $pdf->setXY(87.5,110);
            $pdf->cell(0,0, $datos['Calle']);

            $pdf->setXY(134,110);
            $pdf->cell(0,0, $datos['NumExt']);

            $pdf->setXY(157,110);
            $pdf->cell(0,0, $datos['NumInt']);

            $pdf->setXY(39,121.5);
            $pdf->cell(0,0, $datos['Telefono']);

            $pdf->setXY(71, 121.5);
            $pdf->cell(0,0, $datos['Extension']);

            $pdf->setXY(55, 132.5);
            $pdf->cell(0,0, $datos['Genero']);

            $pdf->setXY(129, 132.5);
            $pdf->cell(0,0, $datos['FechaNacimiento']);

            $pdf->setXY(39, 145.5);
            $pdf->cell(0,0, $datos['Biografia']);

            $pdf->setXY(39, 181);
            $pdf->cell(0,0, $datos['Nivel']);

            $pdf->setXY(87, 181);
            $pdf->cell(0,0, $datos['Lugar']);

            $pdf->setXY(135, 181);
            $pdf->cell(0,0, $datos['Carrera']);

            $pdf->setXY(39, 192.3);
            $pdf->cell(0,0, $datos['FechaIngreso']);

            $pdf->setXY(113, 192.3);
            $pdf->cell(0,0, $datos['FechaSalida']);

            $pdf->setXY(39, 217);
            $pdf->cell(0,0, $datos['Profesion']);

            $pdf->setXY(141, 217);
            $pdf->cell(0,0, '$ '.$datos['SalarioAprox'].'.00 MXN');

            $pdf->setXY(39, 229);
            $pdf->cell(0,0, $datos['InformacionProfesional']);

            $pdf->Output('cv_.pdf', 'I');
        }

    }

?>