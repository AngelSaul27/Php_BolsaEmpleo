<?php

    class Estadisticas_Model extends Model {

        function __construct(){
            parent::__construct();
        }

        public function getEstadisticasOferts(){
            $items = [];
            try{
                $SQL = 'SELECT ofertas.Titulo AS Ofertas, ofertas.PuestosDisponibles AS Puestos_Ofertados, ofertas.Empleador_id AS id , 
                    COUNT( solicitudes.id ) as Total_Solicitudes FROM ofertas LEFT JOIN solicitudes ON solicitudes.Oferta_id = ofertas.id 
                    WHERE ofertas.Empleador_id = (SELECT empleadores.id FROM empleadores WHERE Usuario_id = '.$_SESSION['id'].' LIMIT 1) 
                    GROUP BY ofertas.id';
                $rel = $this->db->connect()->prepare($SQL);
                $rel->execute();

                while ($row = $rel->fetch()){
                    $item['Ofertas'] = $row['Ofertas'];
                    $item['Puestos_Ofertados'] = $row['Puestos_Ofertados'];
                    $item['Total_Solicitudes'] = $row['Total_Solicitudes'];

                    array_push($items, $item);
                }

                return $items;
            }catch(Exception $e){
                return [];
            }
        }

        public function mis_ofertas_estad($condition = null,$group = 'Categoria' , $order = 'Mes'){
            $array = [];
            try{
                
                if($condition == null){
                    $SQL = 'SELECT IFNULL(COUNT(O.Titulo), 0) as Total, C.Categoria,  SUM(IFNULL(V.Consulta,0)) AS Consulta, MONTH (O.Timestamp) as Mes FROM Ofertas O
                    LEFT JOIN Consultas V ON V.Oferta_consulta_id = O.id LEFT JOIN Ofertas_categoria C ON C.id = O.oferta_categoria_id 
                    GROUP BY '.$group.' ORDER BY '.$order;
                }else{
                    $SQL = 'SELECT IFNULL(COUNT(O.Titulo), 0) as Total, C.Categoria,  SUM(IFNULL(V.Consulta,0)) AS Consulta, MONTH (O.Timestamp) as Mes FROM Ofertas O
                    LEFT JOIN Consultas V ON V.Oferta_consulta_id = O.id LEFT JOIN Ofertas_categoria C ON C.id = O.oferta_categoria_id 
                    WHERE O.Empleador_id = ' . $_SESSION['id'] . ' GROUP BY '.$group.' ORDER BY '.$order;
                }
                
                $PDO = $this->db->connect()->prepare($SQL);
                $PDO->execute();

                if(strcasecmp('mes', $group) === 0){
                    while ($row = $PDO->fetch()) {
                        $Item['Total'] = $row['Total'];
                        $Item['Categoria'] = 'Multiples Categorias';
                        $Item['Consulta'] = $row['Consulta'];
                        $Item['Mes'] = $row['Mes'];
                        array_push($array, $Item);
                    }
                }

                while ($row = $PDO->fetch()) {
                    $Item['Total'] = $row['Total'];
                    $Item['Categoria'] = $row['Categoria'];
                    $Item['Consulta'] = $row['Consulta'];
                    $Item['Mes'] = $row['Mes'];
                    array_push($array, $Item);
                }
                

                return $array;
            }catch(Exception $e){
                return false;
            }

        }

        public function mis_contrataciones_estad($condition = null, $group = 'Categoria' , $order = 'Mes'){
            $array = [];
            try{
                
                if($condition == null){
                    $SQL = 'SELECT COUNT(O.Titulo) as Total, C.Categoria, (COUNT(V.Oferta_id)) AS Contrataciones, MONTH (O.Timestamp) as Mes FROM Ofertas O 
                     INNER JOIN Ofertas_categoria C ON C.id = O.oferta_categoria_id INNER JOIN Solicitudes V ON V.Oferta_id = O.id  GROUP BY ' . $group . ' ORDER BY ' . $order;
                }else{
                    $SQL = 'SELECT COUNT(O.Titulo) as Total, C.Categoria, (COUNT(V.Oferta_id)) AS Contrataciones, MONTH (O.Timestamp) as Mes FROM Ofertas O 
                     INNER JOIN Ofertas_categoria C ON C.id = O.oferta_categoria_id INNER JOIN Solicitudes V ON V.Oferta_id = O.id
                     WHERE V.Solicitud_status_id = 3 AND O.Empleador_id = ' . $_SESSION['id'] . ' GROUP BY ' .$group. ' ORDER BY '.$order;
                }
                
                $PDO = $this->db->connect()->prepare($SQL);
                $PDO->execute();

                if(strcasecmp('mes', $group) === 0){
                    while ($row = $PDO->fetch()) {
                        $Item['Total'] = $row['Total'];
                        $Item['Categoria'] = 'Multiples Categorias';
                        $Item['Consulta'] = $row['Contrataciones'];
                        $Item['Mes'] = $row['Mes'];
                        array_push($array, $Item);
                    }
                }

                while ($row = $PDO->fetch()) {
                    $Item['Total'] = $row['Total'];
                    $Item['Categoria'] = $row['Categoria'];
                    $Item['Consulta'] = $row['Contrataciones'];
                    $Item['Mes'] = $row['Mes'];
                    array_push($array, $Item);
                }
                

                return $array;
            }catch(Exception $e){
                print_r($e);
                return false;
            }

        }
    }

?>