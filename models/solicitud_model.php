<?php
    class Solicitud_Model extends Model
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function destroy($id){
            try{
                $SQL = 'DELETE FROM Solicitudes WHERE id = '.$id.'';
                $Destroy = $this->db->connect()->prepare($SQL);
                $Destroy->execute();

            }catch(Exception $e){
                new Errores();
            }
        }

        public function crear($id){
            try{
                $timestamp = new DateTime();
                $timestamp = $timestamp->format('Y-m-d H:i:s');

                $SQL = 'INSERT INTO solicitudes(Oferta_id, Aspirante_id, Solicitud_Status_id, Timestamp) 
                    VALUES ('.$id.', (SELECT id FROM Aspirantes WHERE Usuario_id = '.$_SESSION['id'].') , 1, "'.$timestamp.'")';
                
                $Solicitud = $this->db->connect()->prepare($SQL);
                $Solicitud->execute();

                return true;
            }catch(Exception $e){
                print_r($e->getMessage());
                return false;
            }
        }

        public function getMySolicitud(){
            $items = [];

            try{
                $SQL = 'SELECT * FROM vw_mis_solicitudes WHERE asp_id = (SELECT id FROM Aspirantes WHERE Usuario_id = ' . $_SESSION['id'] . ')';
                $Solicitudes = $this->db->connect()->prepare($SQL);
                $Solicitudes->execute();

                while ($row = $Solicitudes->fetch()) {
                    $item['id'] = $row['id'];
                    $item['oferta_id'] = $row['oferta_id'];
                    $item['Titulo'] = $row['Titulo'];
                    $item['Fotografia'] = $row['Fotografia'];
                    $item['Status'] = $row['Solicitud_Status'];
                    $item['Categoria'] = $row['Categoria'];
                    $item['Nombre'] = $row['Nombre'];
                    $item['Estado'] = $row['Estado'];
                    $item['Municipio'] = $row['Municipio'];
                    $item['Timestamp'] = $row['Timestamp'];
                    array_push($items, $item);
                }

                return $items;
            }catch(Exception $e){
                return [];
            }
        }

        public function getMySolicitudEmpleador(){
            $items = [];
            try{

                $SQL = 'SELECT * FROM vw_empleador_mis_solicitudes WHERE Empleador_id = 
                (SELECT empleadores.id FROM empleadores WHERE empleadores.Usuario_id = '.$_SESSION['id'].')';
                
                $Solicitudes = $this->db->connect()->prepare($SQL);
                $Solicitudes->execute();

                while ($row = $Solicitudes->fetch()) {
                    $item['Solicitud_id'] = $row['Solicitud_id'];
                    $item['Titulo'] = $row['Titulo'];
                    $item['Nombre'] = $row['Nombre'];
                    $item['ApellidoPaterno'] = $row['ApellidoPaterno'];
                    $item['ApellidoMaterno'] = $row['ApellidoMaterno'];
                    $item['Solicitud_Status'] = $row['Solicitud_Status'];
                    $item['Fecha_Solicitud'] = $row['Fecha_Solicitud'];
                    $item['Oferta_id'] = $row['Oferta_id'];
                    $item['Asp_id'] = $row['asp_id'];
                    array_push($items, $item);
                }

                return $items;
            }catch(Exception $e){
                return [];
            }
        }

        public function changueStatus($id, $status){
            try{
                $SQL = 'UPDATE solicitudes SET Solicitud_Status_id = '.$status.' WHERE id = '.$id;
                $UPDATE = $this->db->connect()->prepare($SQL);
                $UPDATE->execute();
                
                return true;
            }catch(Exception $e){
                print_r($e->getMessage());
                return false;
            }

        }

        public function checkValidity($id){
            $items = [];
            try{
                $SQL = 'SELECT * from solicitudes WHERE Oferta_id = '.$id.' AND Aspirante_id = 
                (SELECT id FROM Aspirantes WHERE Usuario_id = '.$_SESSION['id'].')';
                
                $Check = $this->db->connect()->prepare($SQL);
                $Check->execute();

                while ($row = $Check->fetch()) {
                    $item['id'] = $row['id'];
                     array_push($items, $item);
                }

                return $items;
            }catch(Exception $e){
                return [];
            }
        }

    }
?>