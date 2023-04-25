<?php 

    class Consultas_Model extends Model{

        public function __construct(){
            parent::__construct();
        }

        #----------------------------------------------------------#
        #                 CONSULTAS PARA AJAX
        #----------------------------------------------------------#
        public function consulta_estado($pais_id){
            $items = array();
            try{
                $SQL = 'SELECT Estados.id as id, Estados.Estado FROM Estados WHERE Estados.Pais_id = '.$pais_id.' ORDER BY Estado DESC';
                $Estados = $this->db->connect()->prepare($SQL);
                $Estados->execute();

                while ($row = $Estados->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Estado' => $row['Estado']
                    ];
                    array_push($items, $array);
                }

                echo json_encode($items);
            }catch(Exception $e){
                return null;
            }
        }

        #----------------------------------------------------------#
        #                  CONSULTAS PARA AJAX
        #----------------------------------------------------------#
        public function consulta_municipio($estado_id){
            $items = [];
            try{
                $SQL = 'SELECT Municipios.id as id, Municipios.Municipio FROM Municipios WHERE Municipios.Estado_id = '. $estado_id.' ORDER BY Municipio DESC';
                $Municpio = $this->db->connect()->prepare($SQL);
                $Municpio->execute();

                while ($row = $Municpio->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Municipio' => $row['Municipio']
                    ];
                    array_push($items, $array);
                }

                echo json_encode($items);
            }catch(Exception $e){
                return null;
            }
        }

        #----------------------------------------------------------#
        #                  CONSULTAS PARA AJAX
        #----------------------------------------------------------#
        public function consulta_colonia($municipio_id){
            $items = [];
            try {
                $SQL = 'SELECT Colonias.id as id, Colonias.Colonia FROM Colonias WHERE Colonias.Municipio_id = '. $municipio_id.' ORDER BY Colonia DESC';
                
                $Colonia = $this->db->connect()->prepare($SQL);
                $Colonia->execute();

                while ($row = $Colonia->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Colonia' => $row['Colonia']
                    ];
                    array_push($items, $array);
                }
                
                echo json_encode($items);
            } catch (Exception $e) {
                return null;
            }
        }
        
    }

?>