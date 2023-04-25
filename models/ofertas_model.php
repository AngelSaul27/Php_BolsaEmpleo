<?php
class Ofertas_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllOfferts(){
        $items = [];
        try{
            $SQL = 'SELECT * FROM vw_oferta_full';
            $Oferta = $this->db->connect()->prepare($SQL);
            $Oferta->execute();

            while ($row = $Oferta->fetch()) {
                $item['id'] = $row['id'];
                $item['Fotografia'] = $row['Fotografia'];
                $item['Titulo'] = $row['Titulo'];
                $item['Categoria'] = $row['Categoria'];
                $item['Fecha_Inicio'] = $row['Fecha_Inicio'];
                $item['Fecha_Termino'] = $row['Fecha_Termino'];
                $item['InformaciónExtra'] = $row['InformaciónExtra'];
                $item['PuestosDisponibles'] = $row['PuestosDisponibles'];
                $item['Status'] = $row['Status'];
                $item['Descripcion'] = $row['Descripcion'];
                $item['Beneficios'] = $row['Beneficios'];
                $item['Salario'] = $row['Salario'];
                $item['Referencias'] = $row['Referencias'];
                $item['Calle'] = $row['Calle'];
                $item['Pais'] = $row['Pais'];
                $item['Estado'] = $row['Estado'];
                $item['Municipio'] = $row['Municipio'];
                $item['Colonia'] = $row['Colonia'];
                $item['NumInt'] = $row['NumInt'];
                $item['NumExt'] = $row['NumExt'];
                $item['timestamp'] = $row['Timestamp'];

                array_push($items, $item);
            }
            return $items;
        }catch(Exception $e){
            print_r('Ocurrio un error: ' . $e->getMessage());
            return [];
        }
    }

    public function getOffert($id){
        $items = [];
        try {
            $SQL = 'SELECT * FROM vw_oferta_full WHERE id ='.$id;
            $Oferta = $this->db->connect()->prepare($SQL);
            $Oferta->execute();

            while ($row = $Oferta->fetch()) {
                $item['id'] = $row['id'];
                $item['Fotografia'] = $row['Fotografia'];
                $item['Logo'] = $row['Logo'];
                $item['Nombre'] = $row['Nombre'];
                $item['Titulo'] = $row['Titulo'];
                $item['Categoria'] = $row['Categoria'];
                $item['Fecha_Inicio'] = $row['Fecha_Inicio'];
                $item['Fecha_Termino'] = $row['Fecha_Termino'];
                $item['InformaciónExtra'] = $row['InformaciónExtra'];
                $item['PuestosDisponibles'] = $row['PuestosDisponibles'];
                $item['Status'] = $row['Status'];
                $item['Beneficios'] = $row['Beneficios'];
                $item['Salario'] = $row['Salario'];
                $item['Referencias'] = $row['Referencias'];
                $item['Calle'] = $row['Calle'];
                $item['Pais'] = $row['Pais'];
                $item['Estado'] = $row['Estado'];
                $item['Municipio'] = $row['Municipio'];
                $item['Colonia'] = $row['Colonia'];
                $item['NumInt'] = $row['NumInt'];
                $item['NumExt'] = $row['NumExt'];
                $item['timestamp'] = $row['Timestamp'];

                array_push($items, $item);
            }
            return $items;
        } catch (Exception $e) {
            print_r('Ocurrio un error: ' . $e->getMessage());
            return [];
        }
    }

    public function getMyListado()
    {
        $items = [];
        try {
            $PDO = $this->db->connect();

            $SQL = 'SELECT * FROM vw_oferta_my_list WHERE id = ' . $_SESSION['id'] . '';

            $Listado = $PDO->prepare($SQL);
            $Listado->execute();

            while ($row = $Listado->fetch()) {
                $item['id_oferta'] = $row['Oferta_id'];
                $item['Fotografia'] = $row['Fotografia'];
                $item['Titulo'] = $row['Titulo'];
                $item['Categoria'] = $row['Categoria'];
                $item['Fecha_Inicio'] = $row['Fecha_Inicio'];
                $item['InformaciónExtra'] = $row['InformaciónExtra'];
                $item['PuestosDisponibles'] = $row['PuestosDisponibles'];
                $item['Status'] = $row['Status'];
                $item['RazonSocial'] = $row['RazonSocial'];
                $item['Municipio'] = $row['Municipio'];
                $item['Estado'] = $row['Estado'];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            //print_r($e->getMessage());
            return [];
        }
    }

    public function insert()
    {
        $id = $_SESSION['id'];
        $Titulo = $_POST['titulo'];
        $Fecha_Inicio = $_POST['fecha_inicio'];
        $Fecha_Final = $_POST['fecha_termino'];
        $Categoria = $_POST['oferta_catagoria'];
        $Beneficios = $_POST['beneficios'];
        $Informacion = $_POST['informacion_extra'];
        $Pais = $_POST['pais'];
        $Estado = $_POST['estado'];
        $Municipio = $_POST['municipio'];
        $Colonia = $_POST['colonia'];
        $Calle = $_POST['calle'];
        $Referencias = $_POST['referencia'];
        $NumExt = $_POST['num_ext'];
        $NumInt = $_POST['num_int'];
        $Puestos = $_POST['puestos_disponibles'];
        $Salario = $_POST['salario'];
        $Fotografia = $_FILES['fotografia']['name'];

        $Timestamp = new DateTime();
        $Timestamp = $Timestamp->format('Y-m-d H:i:s');

        try {
            #--------------------------------------------
            #                CONEXIÓN
            #--------------------------------------------
            $PDO = $this->db->connect();
            #--------------------------------------------
            #          INICIAMOS UNA TRANSACCION
            #--------------------------------------------
            $PDO->beginTransaction();
            #--------------------------------------------
            # EJECUTAMOS LAS CONSULTAS DE LA TRANSACCION
            #--------------------------------------------

            $SQL = 'INSERT INTO Datos_Contacto(Pais_id, Estado_id, Municipio_id, Colonia_id, Calle, Referencias, NumExt, NumInt)
                    VALUES(' . $Pais . ',' . $Estado . ',' . $Municipio . ',' . $Colonia . ', "' . $Calle . '","' . $Referencias . '", "' . $NumExt . '", "' . $NumInt . '")';

            $Datos_Contacto = $PDO->prepare($SQL);
            $Datos_Contacto->execute();

            $SQL = 'INSERT INTO Ofertas(Titulo, Fotografia, PuestosDisponibles, Salario, Beneficios, 
                    InformaciónExtra, Fecha_Termino, Fecha_Inicio, Oferta_categoria_id, Oferta_status_id, Empleador_id, Dato_contacto_id , timestamp)
                    VALUES("' . $Titulo . '","' . $Fotografia . '",' . $Puestos . ',' . $Salario . ',"' . $Beneficios . '", "' . $Informacion . '","' . $Fecha_Final . '",
                    "' . $Fecha_Inicio . '",' . $Categoria . ',1,(SELECT empleadores.id FROM empleadores WHERE Usuario_id = ' . $id . ' LIMIT 1), ' . $PDO->lastInsertId() . ' ,"' . $Timestamp . '")';

            $Ofertas = $PDO->prepare($SQL);
            $Ofertas->execute();

            #--------------------------------------------
            #  VALIDA SI LAS CONSULTAS FUERON EXITOSAS
            #--------------------------------------------
            $PDO->commit();
            #--------------------------------------------
            return true;
        } catch (Exception $e) {
            #--------------------------------------------
            #         SE REVIERTE LA TRANSACCION
            #--------------------------------------------
            $PDO->rollBack();
            #--------------------------------------------
            //print_r($e->getMessage());
            return false;
        }
    }

    public function update($id){
        $Upload = true;
        try{
            $Titulo = $_POST['titulo'];
            $Fecha_Inicio = $_POST['fecha_inicio'];
            $Fecha_Final = $_POST['fecha_termino'];
            $Categoria = $_POST['oferta_catagoria'];
            $Beneficios = $_POST['beneficios'];
            $Informacion = $_POST['informacion_extra'];
            $Pais = $_POST['pais'];
            $Estado = $_POST['estado'];
            $Municipio = $_POST['municipio'];
            $Colonia = $_POST['colonia'];
            $Calle = $_POST['calle'];
            $Referencias = $_POST['referencia'];
            $NumExt = $_POST['num_ext'];
            $NumInt = $_POST['num_int'];
            $Puestos = $_POST['puestos_disponibles'];
            $Salario = $_POST['salario'];
            $Fotografia = $_FILES['fotografia']['name'];

            if (empty($Fotografia)) {
                $Fotografia = $_POST['FotografiaDefault'];
                $Upload = false;
            }

            if (empty($Fotografia)) {
                return false;
            }

            $Timestamp = new DateTime();
            $Timestamp = $Timestamp->format('Y-m-d H:i:s');

            $PDO = $this->db->connect();
            #--------------------------------------------
            #          INICIAMOS UNA TRANSACCION
            #--------------------------------------------
            $PDO->beginTransaction();
            #--------------------------------------------
            # EJECUTAMOS LAS CONSULTAS DE LA TRANSACCION
            #--------------------------------------------


            $Datos_Contacto = 'SELECT datos_contacto.id FROM datos_contacto INNER JOIN ofertas ON ofertas.id = '.$id.' WHERE datos_contacto.id = ofertas.Dato_contacto_id;';
            $Datos = $PDO->query($Datos_Contacto);
            $Datos->execute();

            $idContacto = $Datos->fetch(PDO::FETCH_ASSOC)['id'];

            $SQL = 'UPDATE Datos_Contacto SET Pais_id='.$Pais.', Estado_id='.$Estado.', Municipio_id='.$Municipio.', Colonia_id='.$Colonia.', 
                Calle="'.$Calle.'", Referencias="'.$Referencias.'", NumExt="'.$NumExt.'", NumInt="'.$NumInt.'" WHERE datos_contacto.id = '.$idContacto;

            $Datos_Contacto = $PDO->prepare($SQL);
            $Datos_Contacto->execute();

            $SQL = 'UPDATE Ofertas SET Titulo="'.$Titulo.'", Fotografia="'.$Fotografia.'", PuestosDisponibles='.$Puestos.', Salario='.$Salario.', Beneficios="'.$Beneficios.'", 
                    InformaciónExtra="'.$Informacion.'", Fecha_Termino="'.$Fecha_Final.'", Fecha_Inicio="'.$Fecha_Inicio.'", Oferta_categoria_id='.$Categoria. ', Oferta_status_id=1, 
                    Empleador_id=(SELECT empleadores.id FROM empleadores WHERE Usuario_id = ' . $_SESSION['id'] . ' LIMIT 1), Dato_contacto_id ='.$idContacto.', timestamp="'. $Timestamp.'" 
                    WHERE Ofertas.id = '.$id;
            $Ofertas = $PDO->prepare($SQL);
            $Ofertas->execute();

            #--------------------------------------------
            #  VALIDA SI LAS CONSULTAS FUERON EXITOSAS
            #--------------------------------------------
            $PDO->commit();

            #Validar subida
            if ($Upload) {
                $NAME_TEMP = $_FILES['fotografia']['tmp_name'];
                $PATH_DIR = constant('STORAGE') . 'Ofertas/';
                if (move_uploaded_file($NAME_TEMP, $PATH_DIR . $Fotografia)) {
                    chmod($PATH_DIR . $Fotografia, 0777);
                } else {
                    array_push($this->error_mensaje, 'Error Uploading Your Image');
                    return false;
                }
            }
            return true;
        }catch(Exception $e){
            #--------------------------------------------
            #         SE REVIERTE LA TRANSACCION
            #--------------------------------------------
            $PDO->rollBack();
            #--------------------------------------------
            print_r($e->getMessage());
            return false;
        }
    }

    public function destroy($id){
        try {
            $SQL = 'DELETE ofertas, datos_contacto FROM ofertas JOIN datos_contacto on datos_contacto.id = ofertas.dato_contacto_id
            WHERE ofertas.id = '.$id.' AND ofertas.Empleador_id = (SELECT empleadores.id FROM empleadores WHERE empleadores.Usuario_id = '.$_SESSION['id'].')';

            $Destroy = $this->db->connect()->prepare($SQL);
            $Destroy->execute();
        } catch (Exception $e) {
            new Errores();
        }
    }

}
