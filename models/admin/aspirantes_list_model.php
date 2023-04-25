<?php
class Aspirantes_List_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];

        try {

            $query = $this->db->connect()->prepare('SELECT * FROM vw_aspirantes_small');
            $query->execute();

            while ($row = $query->fetch()) {
                $item['User_id'] = $row['User_id'];
                $item['Fotografia'] = $row['Fotografia'];
                $item['Fecha_Registro'] = $row['Fecha_Registro'];
                $item['Nombre'] = $row['Nombre'];
                $item['Email'] = $row['Email'];
                $item['ApellidoMaterno'] = $row['ApellidoMaterno'];
                $item['ApellidoPaterno'] = $row['ApellidoPaterno'];
                $item['FechaNacimiento'] = $row['FechaNacimiento'];
                array_push($items, $item);
            }

            return $items;
        } catch (Exception $e) {
            return [];
        }
    }

    public function getAll($id)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM vw_aspirantes_full WHERE id ='.$id);
            $query->execute();

            while ($row = $query->fetch()) {
                $item['id'] = $row['id'];
                $item['Email'] = $row['Email'];
                $item['Status'] = $row['Status'];
                $item['Nombre'] = $row['Nombre'];
                $item['ApellidoPaterno'] = $row['ApellidoPaterno'];
                $item['ApellidoMaterno'] = $row['ApellidoMaterno'];
                $item['Fotografia'] = $row['Fotografia'];
                $item['FechaNacimiento'] = $row['FechaNacimiento'];
                $item['Biografia'] = $row['Biografia'];
                $item['Genero'] = $row['Genero'];
                $item['Telefono'] = $row['Telefono'];
                $item['Extension'] = $row['ExtTelefonica'];
                $item['Calle'] = $row['Calle'];
                $item['Referencias'] = $row['Referencias'];
                $item['NumExt'] = $row['NumExt'];
                $item['NumInt'] = $row['NumInt'];
                $item['Colonia'] = $row['Colonia'];
                $item['Estado'] = $row['Estado'];
                $item['Municipio'] = $row['Municipio'];
                $item['Pais'] = $row['Pais'];
                $item['Lugar'] = $row['Lugar'];
                $item['Carrera'] = $row['Carrera'];
                $item['FechaIngreso'] = $row['FechaIngreso'];
                $item['FechaSalida'] = $row['FechaSalida'];
                $item['Nivel'] = $row['Nivel'];
                $item['SalarioAprox'] = $row['SalarioAprox'];
                $item['InformacionProfesional'] = $row['InformacionProfesional'];
                $item['Profesion'] = $row['Profesion'];
                $item['Registro'] = $row['Registro'];
                array_push($items, $item);
            }

            return $items;
        } catch (Exception $e) {
            return [];
        }
    }

    public function getAllData()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM vw_aspirantes_full');
            $query->execute();

            while ($row = $query->fetch()) {
                $item['id'] = $row['id'];
                $item['Email'] = $row['Email'];
                $item['Status'] = $row['Status'];
                $item['Nombre'] = $row['Nombre'];
                $item['ApellidoPaterno'] = $row['ApellidoPaterno'];
                $item['ApellidoMaterno'] = $row['ApellidoMaterno'];
                $item['Fotografia'] = $row['Fotografia'];
                $item['FechaNacimiento'] = $row['FechaNacimiento'];
                $item['Biografia'] = $row['Biografia'];
                $item['Genero'] = $row['Genero'];
                $item['Telefono'] = $row['Telefono'];
                $item['Extension'] = $row['ExtTelefonica'];
                $item['Calle'] = $row['Calle'];
                $item['Referencias'] = $row['Referencias'];
                $item['NumExt'] = $row['NumExt'];
                $item['NumInt'] = $row['NumInt'];
                $item['Colonia'] = $row['Colonia'];
                $item['Estado'] = $row['Estado'];
                $item['Municipio'] = $row['Municipio'];
                $item['Pais'] = $row['Pais'];
                $item['Lugar'] = $row['Lugar'];
                $item['Carrera'] = $row['Carrera'];
                $item['FechaIngreso'] = $row['FechaIngreso'];
                $item['FechaSalida'] = $row['FechaSalida'];
                $item['Nivel'] = $row['Nivel'];
                $item['SalarioAprox'] = $row['SalarioAprox'];
                $item['InformacionProfesional'] = $row['InformacionProfesional'];
                $item['Profesion'] = $row['Profesion'];
                $item['Registro'] = $row['Registro'];
                array_push($items, $item);
            }

            return $items;
        } catch (Exception $e) {
            return [];
        }
    }

    public function destroy($id){

        try{
            $SQL = 'DELETE Aspirantes, Usuarios, Datos_Profesionales, Datos_Escolares, Datos_contacto FROM Aspirantes 
            LEFT JOIN Usuarios ON Usuarios.id = Aspirantes.Usuario_id 
            LEFT JOIN Datos_Profesionales ON Datos_Profesionales.id = Aspirantes.Dato_escolar_id 
            LEFT JOIN Datos_Escolares ON Datos_Escolares.id = Aspirantes.Dato_profesional_id 
            LEFT JOIN Datos_contacto ON Datos_contacto.id = Aspirantes.Dato_contacto_id 
            WHERE usuarios.id ='.$id;

            $PDO = $this->db->connect();
            $PDO->beginTransaction();

            $destroy = $PDO->prepare($SQL);
            $destroy->execute();

            $PDO->commit();

            return true;
        }catch (Exception $e) {
            $PDO->rollBack();
            print_r($e->getMessage());
            return false;
        }

    }
}
