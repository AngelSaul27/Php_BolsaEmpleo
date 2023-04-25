<?php
    require_once 'libs/rules/validaciones.php';

    class Ofertas extends Controller{

        private $PDF_Class;

        function __construct()
        {
            session_start();
            Validaciones::validarAcceso('Empleador') ? '' : header('location: /error');
        }

        function ofertas($id){
            $this->loadModel('ofertas_');
            $valor = $this->model->getOffert($id);
            $valor = $valor[0];

            //var_dump($valor);

            if(empty($valor)){            
                new Errores();
            }

            $this->PDF_Class = new Oferta_PDF();
            $this->PDF_Class->ofertas($valor);
        }
    }

    class Oferta_PDF extends TCPDF{

        function tranformar_fecha($fecha)
        {
            $ahora = time();
            $segundos = $ahora - $fecha;
            $dias = floor($segundos / 86400);
            $mod_hora = $segundos % 86400;
            $horas = floor($mod_hora / 3600);
            $mod_minuto = $mod_hora % 3600;
            $minutos = floor($mod_minuto / 60);
            if ($horas <= 0) {
                return $minutos . ' minutos';
            } elseif ($dias <= 0) {
                return $horas . ' horas ' . $minutos . ' minutos';
            } else {
                return $dias . ' dias ' . $horas . ' horas ' . $minutos . ' minutos';
            }
        }

        function ofertas($datos){
            $Validador = false;
            #PROCESADO DE LOGO TEMPORAL
            $Valor = $datos['Fotografia'];
            $check = substr($Valor, 0, 5);
            if ($check == 'https') {
                $Validador = true;
            }

            //GENERA PDF
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            
            $pdf->SetTitle('Oferta_'. $datos['Titulo']);

            $pdf->AddPage();
            
            $pdf->SetTextColor(127,127,127);
            
            $pdf->image(constant('URL')."resources/images/Formato_Ofertas.jpg", 2, 1, 250);
            
            $pdf->StartTransform();
            if(!$Validador){
                $pdf->StarPolygon(182, 48, 20, 90, 1, 0, 0, 'CNZ');
                $pdf->image(constant('URL')."public/img/Storage/Ofertas/". $datos['Fotografia'], 162.3, 28, 40);
            }else{
                $pdf->StarPolygon(182, 48, 20, 90, 1, 0, 0, 'CNZ');
                $pdf->image($datos['Fotografia'], 162.3, 28, 40);
            }
            $pdf->StopTransform();
            
            $pdf->setXY(175, 10);
            $pdf->cell(0,0, $datos['Status']);

            $pdf->SetFont('dejavusans', 'B', 15, '', false);
            $pdf->SetTextColor(255,255,255);
            $pdf->setXY(6, 35);
            $pdf->cell(0,0, $datos['Titulo']);

            $pdf->SetFont('dejavusans', 'B', 13, '', false);
            $pdf->setXY(6, 45);
            $pdf->cell(0,0, '$'.number_format($datos['Salario'], 2) .' MXN');
            

            $pdf->SetFont('dejavusans', '', 10, '', false);
            $pdf->setXY(6, 55);
            $pdf->cell(0,0, 'Ultima Actualización: hace '.self::tranformar_fecha(strtotime($datos['timestamp'])));

            $pdf->SetTextColor(127, 127, 127);
            $pdf->SetFont('dejavusans', '', 10, '', false);
            $pdf->setXY(17,92.5);
            $pdf->cell(0,0, $datos['Pais']);

            $pdf->setXY(48.5,92.5);
            $pdf->cell(0,0, $datos['Estado']);

            $pdf->setXY(86,92.5);
            $pdf->cell(0,0, $datos['Municipio']);

            $pdf->setXY(127, 92.5);
            $pdf->cell(0,0, $datos['Colonia']);

            $pdf->setXY(17,104);
            $pdf->cell(0,0, $datos['Referencias']);
            
            $pdf->setXY(74.5, 104);
            $pdf->cell(0,0, $datos['Calle']);

            $pdf->setXY(139, 104);
            $pdf->cell(0,0, $datos['NumExt']);

            $pdf->setXY(161, 104);
            $pdf->cell(0,0, $datos['NumInt']);

            $pdf->setXY(48,137.5);
            $pdf->cell(0,0, $datos['PuestosDisponibles']);
            
            $pdf->setXY(132, 137.5);
            $pdf->cell(0,0, $datos['Categoria']);
            
            $pdf->setXY(17, 150.5);
            $pdf->cell(0,0, $datos['Beneficios']);
            
            $pdf->setXY(17, 182.5);
            $pdf->MultiCell(170,0, $datos['InformaciónExtra'], 0, 10, 'J', false);

            $pdf->setXY(93, 242);
            $pdf->Write(0, 'Ver Oferta', 'http://localhost/oferta/view/'.$datos['id'], false, 'L', true);

            $pdf->Output('oferta_pdf', 'I');
        }

    }
?>