<?php
    class chart_solicitudes_Model extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function chart_solicitudes_YEAR(){
        $items = [];

        try {

            $query = $this->db->connect()->prepare('SELECT * FROM vw_estad_year_solicitudes');
            $query->execute();

            while ($row = $query->fetch()) {
                $item['Mes'] = $row['MES'];
                $item['Total'] = $row['TOTAL'];
                array_push($items, $item);
            }


            return $items;
        } catch (Exception $e) {
            return [];
        }
    }
}
