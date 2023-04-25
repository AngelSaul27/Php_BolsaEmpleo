<?php

    class Catalogos_Model extends Model{

        public function __construct(){
            parent::__construct();
        }

        #----------------------------------------------------------#
        #                   CATALOGO PAIS
        #----------------------------------------------------------#
        public function catalogo_pais(){
            $items = [];
            try{
                $SQL = 'SELECT Paises.id as id, Paises.Pais FROM Paises ORDER BY id ASC';
                $Estados = $this->db->connect()->prepare($SQL);
                $Estados->execute();

                while ($row = $Estados->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Pais' => $row['Pais']
                    ];
                    array_push($items, $array);
                }

                return $items;

            }catch(Exception $e){
                return null;
            }
        }

        #----------------------------------------------------------#
        #                 CONSULTAS ESTADOS
        #----------------------------------------------------------#
        public function catalogo_estado(){
            $items = array();
            try{
                $SQL = 'SELECT Estados.id as id, Estados.Estado, Estados.Pais_id FROM Estados ORDER BY Estado DESC';
                $Estados = $this->db->connect()->prepare($SQL);
                $Estados->execute();

                while ($row = $Estados->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Estado' => $row['Estado'],
                        'Pais_id' => $row['Pais_id']
                    ];
                    array_push($items, $array);
                }

                return $items;
            }catch(Exception $e){
                return null;
            }
        }

        #----------------------------------------------------------#
        #                  CATALOGO MUNICIPIO
        #----------------------------------------------------------#
        public function catalogo_municipio(){
            $items = [];
            try{
                $SQL = 'SELECT Municipios.id as id, Municipios.Municipio, Estado_id FROM Municipios ORDER BY Municipio DESC';
                $Municpio = $this->db->connect()->prepare($SQL);
                $Municpio->execute();

                while ($row = $Municpio->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Municipio' => $row['Municipio'],
                        'Estado_id' => $row['Estado_id'],
                    ];
                    array_push($items, $array);
                }

                return $items;
            }catch(Exception $e){
                return null;
            }
        }

        #----------------------------------------------------------#
        #                  CATALOGO COLONIAS
        #----------------------------------------------------------#
        public function catalogo_colonia(){
            $items = [];
            try {
                $SQL = 'SELECT Colonias.id as id, Colonias.Colonia, Municipio_id FROM Colonias ORDER BY Colonia DESC';
                
                $Colonia = $this->db->connect()->prepare($SQL);
                $Colonia->execute();

                while ($row = $Colonia->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Colonia' => $row['Colonia'],
                        'Municipio_id' => $row['Municipio_id']
                    ];
                    array_push($items, $array);
                }
                
                return $items;
            } catch (Exception $e) {
                return null;
            }
        }

        #----------------------------------------------------------#
        #                  CATALOGO PROFESIONES
        #----------------------------------------------------------#
        public function catalogo_profesiones(){
            $items = [];
            try{
                $SQL = 'SELECT * FROM profesiones ORDER BY Profesion DESC';
                $Profesion = $this->db->connect()->prepare($SQL);
                $Profesion->execute();

                while ($row = $Profesion->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Profesion' => $row['Profesion']
                    ];
                    array_push($items, $array);
                }
                
                return $items;
                
            }catch(Exception $e){
                return null;
            }
        }

        #----------------------------------------------------------#
        #               CATALOGO NIVELES ACADEMICOS
        #----------------------------------------------------------#
        public function catalogo_niveles_academicos(){
            $items = [];
            try{
                $SQL = 'SELECT * FROM niveles_academicos ORDER BY Nivel DESC';
                $Nivel = $this->db->connect()->prepare($SQL);
                $Nivel->execute();

                while ($row = $Nivel->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Nivel' => $row['Nivel']
                    ];
                    array_push($items, $array);
                }

                return $items;

            }catch(Exception $e){
                return null;
            }
        }

        #----------------------------------------------------------#
        #                   CATALOGO EMPRESAS
        #----------------------------------------------------------#
        public function catalogo_empresas(){
            $items_Sector = []; $items_Actividad = [];
            $items_Tipo = []; $items_Subsector = [];

            try{
                $SQL = 'SELECT id as Sector_id, Sector FROM Emp_Sector_Actividad ORDER BY id ASC';
                $Sector = $this->db->connect()->prepare($SQL);
                $Sector->execute();

                while ($row = $Sector->fetch()) {
                    $array = [
                        'id' => $row['Sector_id'],
                        'valor' => $row['Sector']
                    ];
                    array_push($items_Sector, $array);
                }

                $SQL = 'SELECT id as Actividad_id, ActividadEconomica FROM Emp_Actividad_Economica ORDER BY id ASC';
                $Actividad = $this->db->connect()->prepare($SQL);
                $Actividad->execute();

                while ($row = $Actividad->fetch()) {
                    $array = [
                        'id' => $row['Actividad_id'],
                        'valor' => $row['ActividadEconomica']
                    ];
                    array_push($items_Actividad, $array);
                }

                $SQL = 'SELECT id as Tipo_id, TipoEmpleador FROM Emp_Tipo_Empleador ORDER BY id ASC';
                $Tipo = $this->db->connect()->prepare($SQL);
                $Tipo->execute();

                while ($row = $Tipo->fetch()) {
                    $array = [
                        'id' => $row['Tipo_id'],
                        'valor' => $row['TipoEmpleador']
                    ];
                    array_push($items_Tipo, $array);
                }

                $SQL = 'SELECT id as Subsector_id, Subsector FROM Emp_Subsector ORDER BY id ASC';
                $Subsector = $this->db->connect()->prepare($SQL);
                $Subsector->execute();

                while ($row = $Subsector->fetch()) {
                    $array = [
                        'id' => $row['Subsector_id'],
                        'valor' => $row['Subsector']
                    ];
                    array_push($items_Subsector, $array);
                }

                if(empty($items_Sector) OR empty($items_Subsector) OR empty($items_Actividad) OR empty($items_Tipo))
                {
                    return false;
                }

                $array_items = [
                    'Sector_Actividad' => $items_Sector,
                    'Actividad_Economica' => $items_Actividad,
                    'Tipo_Empleador' => $items_Tipo,
                    'Subsector' => $items_Subsector
                ];

                return $array_items;

            }catch (Exception $e){
                return [];
            }
        }

        #----------------------------------------------------------#
        #                   OFERTAS CATEGORIA
        #----------------------------------------------------------#
        public function catalogo_categoria_ofertas() {
            $items = [];
            try{
                $SQL = 'SELECT * FROM ofertas_categoria ORDER BY Categoria DESC';
                $Nivel = $this->db->connect()->prepare($SQL);
                $Nivel->execute();

                while ($row = $Nivel->fetch()) {
                    $array = [
                        'id' => $row['id'],
                        'Categoria' => $row['Categoria']
                    ];
                    array_push($items, $array);
                }

                return $items;

            }catch(Exception $e){
                return null;
            }
        }
    }

?>