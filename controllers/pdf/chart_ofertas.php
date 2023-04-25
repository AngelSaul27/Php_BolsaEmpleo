<?php
    require_once 'libs/rules/validaciones.php';

    class chart_ofertas extends Controller{

        private $PDF_Class;

        function __construct()
        {
            session_start();
            Validaciones::validarAcceso('Administrador') ? '' : header('location: /error');
        }

        function chart_ofertas(){

            //GUARDAMOS LAS VARIABLES CORRESPONDIENTES
            $base64 = $_POST['base64'];
            $data1 = explode(",", $_POST['data1']);
            $data2 = explode(",", $_POST['data2']);
            $data3 = explode(",", $_POST['data3']);
            
            //SUBIMOS EL CANVAS TEMPORALMENTE
            $base64 = str_replace("data:image/png;base64,","", $base64);
            $fileData = base64_decode($base64);
            $fileName = uniqid().'.png';
            file_put_contents('resources/charts_temp/'.$fileName, $fileData);
            $this->PDF_Class = new chart_PDF();
            $this->PDF_Class->chart($data1, $data2, $data3, 'resources/charts_temp/'.$fileName);

            unlink('resources/charts_temp/' . $fileName);
        }
    }

    class chart_PDF extends TCPDF{

        function chart($data1, $data2, $data3 ,$img){
            
            //GENERA PDF
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            
            $pdf->SetTitle('Estadisticas de Ofertas de las empresas');

            $pdf->AddPage();
            //FORMTAO DEL DOCUMENTO
            $pdf->image(constant('URL').'resources/images/Formato_estad_ofertas.jpg',2, 7, 250);
            //GRAFICOS
            $pdf->image(constant('URL').$img, 30, 160, 150);
            //DATOS DE LA TABLA
            $pdf->SetTextColor(127,127,127);

            $pdf->SetTextColor(127, 127, 127);

            $pdf->setXY(48, 65.5);
            $pdf->Cell(0, 0, $data1[0]);

            $pdf->setXY(48, 72.5);
            $pdf->Cell(0,0, $data1[1]);

            $pdf->setXY(48, 79);
            $pdf->Cell(0,0, $data1[2]);

            $pdf->setXY(48, 86);
            $pdf->Cell(0,0, $data1[3]);

            $pdf->setXY(48, 93);
            $pdf->Cell(0,0, $data1[4]);

            $pdf->setXY(48, 100);
            $pdf->Cell(0,0, $data1[5]);

            $pdf->setXY(48, 107);
            $pdf->Cell(0,0, $data1[6]);

            $pdf->setXY(48, 113.5);
            $pdf->Cell(0,0, $data1[7]);

            $pdf->setXY(48, 120.5);
            $pdf->Cell(0,0, $data1[8]);

            $pdf->setXY(48, 128);
            $pdf->Cell(0,0, $data1[9]);

            $pdf->setXY(48, 134.5);
            $pdf->Cell(0,0, $data1[10]);

            $pdf->setXY(48, 141.5);
            $pdf->Cell(0,0, $data1[11]);


            $pdf->setXY(100, 65.5);
            $pdf->Cell(0, 0, $data2[0]);

            $pdf->setXY(100, 72.5);
            $pdf->Cell(0,0, $data2[1]);

            $pdf->setXY(100, 79);
            $pdf->Cell(0,0, $data2[2]);

            $pdf->setXY(100, 86);
            $pdf->Cell(0,0, $data2[3]);

            $pdf->setXY(100, 93);
            $pdf->Cell(0,0, $data2[4]);

            $pdf->setXY(100, 100);
            $pdf->Cell(0,0, $data2[5]);

            $pdf->setXY(100, 107);
            $pdf->Cell(0,0, $data2[6]);

            $pdf->setXY(100, 113.5);
            $pdf->Cell(0,0, $data2[7]);

            $pdf->setXY(100, 120.5);
            $pdf->Cell(0,0, $data2[8]);

            $pdf->setXY(100, 128);
            $pdf->Cell(0,0, $data2[9]);

            $pdf->setXY(100, 134.5);
            $pdf->Cell(0,0, $data2[10]);

            $pdf->setXY(100, 141.5);
            $pdf->Cell(0,0, $data2[11]);
            
            
            $pdf->setXY(146, 65.5);
            $pdf->Cell(0, 0, $data3[0]);

            $pdf->setXY(146, 72.5);
            $pdf->Cell(0,0, $data3[1]);

            $pdf->setXY(146, 79);
            $pdf->Cell(0,0, $data3[2]);

            $pdf->setXY(146, 86);
            $pdf->Cell(0,0, $data3[3]);

            $pdf->setXY(146, 93);
            $pdf->Cell(0,0, $data3[4]);

            $pdf->setXY(146, 100);
            $pdf->Cell(0,0, $data3[5]);

            $pdf->setXY(146, 107);
            $pdf->Cell(0,0, $data3[6]);

            $pdf->setXY(146, 113.5);
            $pdf->Cell(0,0, $data3[7]);

            $pdf->setXY(146, 120.5);
            $pdf->Cell(0,0, $data3[8]);

            $pdf->setXY(146, 128);
            $pdf->Cell(0,0, $data3[9]);

            $pdf->setXY(146, 134.5);
            $pdf->Cell(0,0, $data3[10]);

            $pdf->setXY(146, 141.5);
            $pdf->Cell(0,0, $data3[11]);

            $pdf->Output('cv_.pdf', 'I');
        }

    }
