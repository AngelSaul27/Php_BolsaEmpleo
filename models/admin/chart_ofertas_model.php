<?php
    class chart_ofertas_Model extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function chart_ofertas_YEAR(){
        $items = [];

        try {

            $query = $this->db->connect()->prepare('SELECT * FROM vw_estad_year_ofertas');
            $query->execute();

            while ($row = $query->fetch()) {
                $item['Nombre'] = $row['Nombre'];
                $item['Total_Solicitudes'] = $row['Total_Solicitudes'];
                $item['Total_Ofertas'] = $row['Total_Ofertas'];
                $item['Registro'] = $row['Registro'];
                $item['Mes'] = $row['Mes'];
                array_push($items, $item);
            }


            return $items;
        } catch (Exception $e) {
            return [];
        }
    }
}
