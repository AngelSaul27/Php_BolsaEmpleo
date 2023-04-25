<?php
    class Empleados_List_Model extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function get(){
            $items = [];

            try{

                $query = $this->db->connect()->prepare('SELECT * FROM vw_empleadores_list');
                $query->execute();

                while ($row = $query->fetch()) {
                    $item['id'] = $row['id'];
                    $item['Logo'] = $row['Logo'];
                    $item['Nombre'] = $row['Nombre'];
                    $item['RazonSocial'] = $row['RazonSocial'];
                    $item['Email'] = $row['Email'];
                    $item['TipoEmpleador'] = $row['TipoEmpleador'];
                    $item['RFC'] = $row['RFC'];
                    $item['Timestamp'] = $row['Timestamp'];
                    array_push($items, $item);
                }

                return $items;

            }catch(Exception $e){
                return [];
            }
            
        }

        public function getAll($id){
            $items = [];
            try {
                $query = $this->db->connect()->prepare('SELECT * FROM vw_empleadores_full WHERE id ='.$id);
                $query->execute();

                while ($row = $query->fetch()) {
                    $item['id'] = $row['id'];
                    $item['Email'] = $row['Email'];
                    $item['Status'] = $row['Status'];
                    $item['Nombre'] = $row['Nombre'];
                    $item['Descripcion'] = $row['Descripcion'];
                    $item['Logo'] = $row['Logo'];
                    $item['Extension'] = $row['ExtTelefonica'];
                    $item['Calle'] = $row['Calle'];
                    $item['Referencias'] = $row['Referencias'];
                    $item['NumExt'] = $row['NumExt'];
                    $item['NumInt'] = $row['NumInt'];
                    $item['Colonia'] = $row['Colonia'];
                    $item['Estado'] = $row['Estado'];
                    $item['Municipio'] = $row['Municipio'];
                    $item['Pais'] = $row['Pais'];
                    $item['RFC'] = $row['RFC'];
                    $item['RazonSocial'] = $row['RazonSocial'];
                    $item['ActividadEconomica'] = $row['ActividadEconomica'];
                    $item['TipoEmpleador'] = $row['TipoEmpleador'];
                    $item['Sector'] = $row['Sector'];
                    $item['Subsector'] = $row['Subsector'];
                    $item['Registado'] = $row['Registado'];
                    array_push($items, $item);
                }

                return $items;
            } catch (Exception $e) {
                return [];
            }
        }

        public function destroy($id){
            try {

                $PDO = $this->db->connect();
                $PDO->beginTransaction();

                $SQL = 'DELETE usuarios, empleadores, datos_contacto, datos_empleador FROM usuarios
                        JOIN empleadores on empleadores.Usuario_id = usuarios.id
                        JOIN datos_contacto on datos_contacto.id = empleadores.Datos_contacto_id
                        JOIN datos_empleador on datos_empleador.id = empleadores.Dato_empleador_id WHERE Usuario_id =' . $id . '';
                $Destroy_Data = $PDO->prepare($SQL);
                $Destroy_Data->execute();

                $SQL = 'DELETE Ofertas, datos_contacto, solicitudes FROM ofertas
                            LEFT JOIN datos_contacto on datos_contacto.id = ofertas.Dato_contacto_id
                            LEFT JOIN solicitudes on solicitudes.Oferta_id = ofertas.id
                            WHERE ofertas.Empleador_id = (SELECT id FROM empleadores WHERE empleadores.Usuario_id = ' . $id . ')';
                $Destroy_Offert_Data = $PDO->prepare($SQL);
                $Destroy_Offert_Data->execute();

                $PDO->commit();

                return true;
            } catch (Exception $e) {
                $PDO->rollBack();
                print_r($e->getMessage());
                return false;
            }
        }

    }
?>