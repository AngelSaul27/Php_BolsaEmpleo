<?php
    class Register_Aspirante_Model extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function	insert(){
            $Nombre = $_POST['nombre'];
            $Email = $_POST['email'];
            $Password = $_POST['password'];
            $FechaNacimiento = $_POST['fecha_nacimiento'];
            $Telefono = $_POST['telefono'];
            $Extension = $_POST['ext_telefonica'];
            $Fotografia = $_FILES['fotografia']['name'];

            $fecha = new DateTime();
            $fecha = $fecha->format('Y-m-d H:i:s');
            
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
                    VALUES("' . $Email . '","' . $Password . '", 2, 2, "' . $fecha . '")';

                $Usuarios = $PDO->prepare($SQL);
                $Usuarios->execute();

                $Usuario_id = $PDO->lastInsertId();

                $SQL = 'INSERT INTO Datos_Contacto(Telefono, ExtTelefonica) VALUES('.$Telefono .','.$Extension.')';

                $Datos_Contacto = $PDO->prepare($SQL);
                $Datos_Contacto->execute();


                $SQL = 'INSERT INTO Aspirantes(Nombre, FechaNacimiento, Fotografia, Usuario_id, Dato_contacto_id)  
                    VALUES("'.$Nombre .'","'.$FechaNacimiento.'","'.$Fotografia.'",'. $Usuario_id.','. $PDO->lastInsertId().')';

                $Aspirantes = $PDO->prepare($SQL);
                $Aspirantes->execute();

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

?>