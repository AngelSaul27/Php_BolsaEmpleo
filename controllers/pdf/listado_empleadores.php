<?php
require_once 'libs/rules/validaciones.php';
require_once 'pdf_functions.php';

class Listado_Empleadores extends TCPDF
{
    function __construct()
    {
        session_start();
        Validaciones::validarAcceso('Administrador') ? '' : header('location: /error');
    }

    function loadData()
    {
        $Header = $_POST['Header']; //GET ARRAY OF HEADER 
        $Contenido = $_POST['Body']; //GET ARRAY OF TABLE BODY

        $funcion = new PDF_FUNCTIONS(); //LOAD TO CLASS MY FUNCTIONS
        $Header = $funcion->stringHeader($Header); //PROCESS DATA HEAD
        $Contenido = $funcion->stringBody($Contenido, 6); //PROCESS DATA TABLE

        $Tabla = '
            <table cellspacing="2">
                <thead>
                    <tr style="background-color:#1d5e69; color:#FFFFFF;">
                    ' . $Header . '
                    </tr>
                </thead>
            
                ' . $Contenido . '
            </table>
        '; //TABLE GENERATION

        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);//GENERATION PDF

        //HEADER DOCUMENT
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        //MARGIN DOCUMENT
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        //INFORMACIÓN DEL PDF
        $pdf->SetCreator('Astro');
        $pdf->SetAuthor('Astro');
        $pdf->SetTitle('Listado de Aspirantes');
        $pdf->SetAutoPageBreak(TRUE, 10);

        //TIPO DE FUENTE Y TAMAÑO
        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetMargins(10, PDF_MARGIN_TOP, 10);

        //AGREGAMOS UNA PAGINA
        $pdf->AddPage('P', 'A4');

        //ESCRIBIMOS EL TEXTO EN LA HOJA
        $pdf->writeHTML($Tabla, true, false, true, false, '');

        $FILE_NAME = 'Reporte_' . date('y-m-d_h_i_s') . '.pdf';
        $FILE_SAVE = constant('PDF_FILE') . 'admin/' . $FILE_NAME;

        //GUARDAMOS EL PDF
        $pdf->Output($FILE_SAVE, 'F');

        echo constant('URL') . 'public/docs/admin/' . $FILE_NAME; //DEVOLVEMOS EL PDF
    }
}
