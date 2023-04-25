<?php
    class Charts_Model extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function chart_aspirantes(){
        $items = [];

        try {

            $query = $this->db->connect()->prepare('SELECT * FROM vw_estad_aspirantes');
            $query->execute();

            while ($row = $query->fetch()) {
                $item = $row;
                array_push($items, $item);
            }

            return $items;
        } catch (Exception $e) {
            return [];
        }
    }

    public function chart_empleadores()
    {
        $items = [];

        try {

            $query = $this->db->connect()->prepare('SELECT * FROM vw_estad_empresas');
            $query->execute();

            while ($row = $query->fetch()) {
                $item['Nombre'] = $row['Nombre'];
                $item['id'] = $row['id'];
                $item['Total_Solicitudes'] = $row['Total_Solicitudes'];
                $item['Total_Ofertas'] = $row['Total_Ofertas'];
                array_push($items, $item);
            }

            return $items;
        } catch (Exception $e) {
            return [];
        }
    }

}
