<?php
    require_once 'libs/rules/validaciones.php';

    class chart_solicitudes extends Controller{

        private $PDF_Class;

        function __construct()
        {
            session_start();
            Validaciones::validarAcceso('Administrador') ? '' : header('location: /error');
        }

        function chart_solicitudes(){

            //GUARDAMOS LAS VARIABLES CORRESPONDIENTES
            $base64 = $_POST['base64'];
            $body = explode(",", $_POST['tbody']);
            $head = explode(",", $_POST['thead']);
            
            //SUBIMOS EL CANVAS TEMPORALMENTE
            $base64 = str_replace("data:image/png;base64,","", $base64);
            $fileData = base64_decode($base64);
            $fileName = uniqid().'.png';
            file_put_contents('resources/charts_temp/'.$fileName, $fileData);
            $this->PDF_Class = new chart_PDF();
            $this->PDF_Class->chart($head, $body, 'resources/charts_temp/'.$fileName);

            unlink('resources/charts_temp/' . $fileName);
        }
    }

    class chart_PDF extends TCPDF{

        function chart($head, $body, $img){
            
            //GENERA PDF
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            
            $pdf->SetTitle('Estadisticas de Solicitudes');

            $pdf->AddPage();
            //FORMTAO DEL DOCUMENTO
            $pdf->image(constant('URL').'resources/images/Formato_estad_solicitudes.jpg',2, 7, 250);
            //GRAFICOS
            $pdf->image(constant('URL').$img, 100, 58, 100);
            //DATOS DE LA TABLA
            $pdf->SetTextColor(127,127,127);

            $pdf->setXY(48, 64);
            $pdf->Cell(0,0, $body[0]);

            $pdf->setXY(48, 72);
            $pdf->Cell(0,0, $body[1]);

            $pdf->setXY(48, 80);
            $pdf->Cell(0,0, $body[2]);

            $pdf->setXY(48, 87);
            $pdf->Cell(0,0, $body[3]);

            $pdf->setXY(48, 95);
            $pdf->Cell(0,0, $body[4]);

            $pdf->setXY(48, 103);
            $pdf->Cell(0,0, $body[5]);

            $pdf->setXY(48, 111);
            $pdf->Cell(0,0, $body[6]);

            $pdf->setXY(48, 118.5);
            $pdf->Cell(0,0, $body[7]);

            $pdf->setXY(48, 126);
            $pdf->Cell(0,0, $body[8]);

            $pdf->setXY(48, 134);
            $pdf->Cell(0,0, $body[9]);

            $pdf->setXY(48, 141.5);
            $pdf->Cell(0,0, $body[10]);

            $pdf->setXY(48, 149);
            $pdf->Cell(0,0, $body[11]);

            $pdf->Output('cv_.pdf', 'I');
        }

    }
