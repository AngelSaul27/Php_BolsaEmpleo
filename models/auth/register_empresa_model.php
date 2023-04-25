<?php
class Register_Empresa_Model extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function    insert()
    {
        $Email = $_POST['email'];
        $Password = $_POST['password'];
        $Nombre = $_POST['nombre'];
        $Tipo_Empresa = $_POST['tipo_empresa'];
        $Sector_Actividad = $_POST['sector_actividad'];
        $Actividad_Economica = $_POST['actividad_economica'];
        $Subsector = $_POST['subsector'];
        $RazonSocial = $_POST['razon_social'];
        $RFC = $_POST['RFC'];
        $Pais = $_POST['pais'];
        $Estado = $_POST['estado'];
        $Municipio = $_POST['municipio'];
        $Colonia = $_POST['colonia'];
        $Calle = $_POST['calle'];
        $Referencias = $_POST['referencias'];
        $Numero_Ext = $_POST['num_ext'];
        $Numero_Int  = $_POST['num_int'];
        $Descripcion = $_POST['descripcion'];
        $Fotografia = $_FILES['fotografia']['name'];

        $timestamp = new DateTime();
        $timestamp = $timestamp->format('Y-m-d H:i:s');
        
        try {
            $PDO = $this->db->connect();
            #--------------------------------------------
            #          INICIAMOS UNA TRANSACCION
            #--------------------------------------------
            $PDO->beginTransaction();
            #--------------------------------------------
            # EJECUTAMOS LAS CONSULTAS DE LA TRANSACCION
            #--------------------------------------------
            $SQL = 'INSERT INTO Usuarios(Email, Password, Role_id, Usuario_Status_id, timestamp)  
                    VALUES("' . $Email . '","' . $Password . '", 1, 1, "' . $timestamp . '")';
            $Usuarios = $PDO->prepare($SQL);
            $Usuarios->execute();

            $Usuario_id = $PDO->lastInsertId();

            $SQL = 'INSERT INTO Datos_Contacto(Calle, Referencias, NumExt, NumInt, Colonia_id, Municipio_id, Estado_id, Pais_id) 
                    VALUES("'.$Calle.'","'.$Referencias.'","'.$Numero_Ext.'", "'.$Numero_Int.'",'.$Colonia.','.$Municipio.','.$Estado.','.$Pais.')';

            $Datos_Contacto = $PDO->prepare($SQL);
            $Datos_Contacto->execute();

            $Datos_Contacto_id = $PDO->lastInsertId();

            $SQL = 'INSERT INTO Datos_empleador(Emp_actividad_economica_id, Emp_tipo_empleador_id, Emp_subsector_id, Emp_sector_actividad_id, RFC, RazonSocial) 
                    VALUES('.$Actividad_Economica.','.$Tipo_Empresa.','.$Subsector.','.$Sector_Actividad.',"'.$RFC.'","'.$RazonSocial.'")';

            $Datos_empleador = $PDO->prepare($SQL);
            $Datos_empleador->execute();

            $SQL = 'INSERT INTO Empleadores(Nombre, Descripcion, Logo, Usuario_id, Dato_empleador_id ,Datos_Contacto_id)  
                    VALUES("'.$Nombre.'","'.$Descripcion.'","'.$Fotografia.'",'.$Usuario_id.',' . $PDO->lastInsertId().','.$Datos_Contacto_id.')';

            $Empleadores = $PDO->prepare($SQL);
            $Empleadores->execute();

            #--------------------------------------------
            #          FINALIZA LA TRANSACCION
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
            print_r($e->getMessage());
            return false;
        }
    }
}
