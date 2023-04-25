<?php
require_once __dir__.'../../pdf/pdf_functions.php';
require_once 'libs/rules/validaciones.php';

    class Postulaciones extends controller{
        
        public function __construct()
        {
            parent::__construct();
            session_start();

            if(!Validaciones::validarAcceso('Aspirante')){
                header('Location: /login');
                exit();
            }
        }

        public function render()
        {
            $this->loadModel('solicitud_');
            $this->view->postulacion = $this->model->getMySolicitud();
            $this->view->render('aspirante/list_postulaciones');
        }

        public function destroy($id){
            $this->loadModel('solicitud_');
            $this->model->destroy($id);

            header('Location: /aspirante/postulaciones');
        }

        public function pdf(){
            $this->loadModel('solicitud_');
            $valor = $this->model->getMySolicitud();

            //var_dump($valor);

            if (empty($valor)) {
                new Errores();
            }

            $this->PDF_Class = new Oferta_PDF();
            $this->PDF_Class->ofertas($valor);
        }
    }

    class Oferta_PDF extends TCPDF{
        function ofertas($datos){
            //GENERA PDF
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $body='';

            foreach ($datos as $value) {
                $Start = '<tr>';
                $Titulo = '<th style="background-color: #e0f1f1;" align="center">' . $value['Titulo'] . '</th>';
                $Status = '<th style="background-color: #e0f1f1;" align="center">' . $value['Status'] . '</th>';
                $Categoria = '<th style="background-color: #e0f1f1;" align="center">' . $value['Categoria'] . '</th>';
                $Nombre = '<th style="background-color: #e0f1f1;" align="center">' . $value['Nombre'] . '</th>';
                $Address = '<th style="background-color: #e0f1f1;" align="center">' . $value['Municipio'] . ',' . $value['Estado'] . '</th>';
                $Timestamp = '<th style="background-color: #e0f1f1;" align="center">' . $value['Timestamp'] . '</th>';
                $End = '</tr>';
                $body = ($body) . $Start . $Titulo . $Categoria . $Nombre . $Address . $Status . $Timestamp . $End;
            }

            $Tabla = '
                <table cellspacing="2">
                    <thead>
                        <tr style="background-color:#1d5e69; color:#FFFFFF; text-align:center">
                            <td style="padding: 5px">Titulo</td>
                            <td style="padding: 5px">Categoria</td>
                            <td style="padding: 5px">Ofertante</td>
                            <td style="padding: 5px">Dirección</td>
                            <td style="padding: 5px">Status</td>
                            <td style="padding: 5px">Solicitado</td>
                        </tr>
                    </thead>
                    <tbody>
                        '.$body.'
                    </tbody>
                </table>
            ';

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            
            //INFORMACIÓN DEL PDF
            $pdf->SetCreator('Astro');
            $pdf->SetAuthor('Astro');
            $pdf->SetTitle('Mis solicitudes');
            $pdf->SetAutoPageBreak(TRUE, 10);

            //TIPO DE FUENTE Y TAMAÑO
            $pdf->SetFont('helvetica', '', 10);
            $pdf->SetMargins(10, PDF_MARGIN_TOP, 10);

            //AGREGAMOS UNA PAGINA
            $pdf->AddPage('P', 'A4');
            
            $pdf->SetTextColor(127,127,127);

            //$pdf->image(constant('URL')."resources/images/Formato_Ofertas.jpg", 2, 1, 250);

            $pdf->writeHTML($Tabla, true, false, true, false, '');

            $pdf->Output('postulaciones_pdf', 'I');
        }

    }
?>