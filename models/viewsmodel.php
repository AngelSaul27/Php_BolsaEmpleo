<?php
    class ViewsModel extends Model
    {

        public function __construct()
        {
            parent::__construct();
        }

        function saveView($OfertaId){

            if($_SESSION){
                if($_SESSION['role'] == 'Empleador' OR $_SESSION['role'] == 'Administrador'){
                    return false;
                }
            }

            $id = $valor = '';

            try{
                $PDO = $this->db->connect();
                $PDO->beginTransaction();

                $SQL = 'SELECT Consulta, id FROM Consultas WHERE Oferta_consulta_id = '.$OfertaId;
                $Validador = $PDO->prepare($SQL);
                $Validador->execute();

                while ($row = $Validador->fetch()) {
                    $id = $row['id'];
                    $valor = $row['Consulta'];
                }

                if(empty($id)){
                    $SQL = 'INSERT INTO Consultas(Consulta, Oferta_consulta_id) VALUES(1,'.$OfertaId.')';
                    $INSERT = $PDO->prepare($SQL);
                    $INSERT->execute();
                }else{
                    $SQL = 'UPDATE Consultas SET Consulta = ' . ($valor+1).' WHERE id = '.$id;
                    $UPDATE = $PDO->prepare($SQL);
                    $UPDATE->execute();
                }

                $PDO->commit();
            }catch(Exception $e){
                $PDO->rollBack();
                print_r('Ocurrio un error: ' . $e->getMessage());
            }

        }

    }
?>