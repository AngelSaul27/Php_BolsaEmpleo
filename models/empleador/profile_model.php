<?php

    class Profile_Model extends Model {

        public function __construct(){
            parent::__construct();
        }

        public function get(){
            $items = [];
            try {
                $query = $this->db->connect()->prepare('SELECT * FROM vw_empleadores_full WHERE id ='.$_SESSION['id']);
                $query->execute();

                while ($row = $query->fetch()) {
                    $item['id'] = $row['id'];
                    $item['Email'] = $row['Email'];
                    $item['Status'] = $row['Status'];
                    $item['Nombre'] = $row['Nombre'];
                    $item['Descripcion'] = $row['Descripcion'];
                    $item['Logo'] = $row['Logo'];
                    $item['Extension'] = $row['ExtTelefonica'];
                    $item['Calle'] = $row['Calle'];
                    $item['Referencias'] = $row['Referencias'];
                    $item['NumExt'] = $row['NumExt'];
                    $item['NumInt'] = $row['NumInt'];
                    $item['Colonia'] = $row['Colonia'];
                    $item['Estado'] = $row['Estado'];
                    $item['Municipio'] = $row['Municipio'];
                    $item['Pais'] = $row['Pais'];
                    $item['RFC'] = $row['RFC'];
                    $item['RazonSocial'] = $row['RazonSocial'];
                    $item['ActividadEconomica'] = $row['ActividadEconomica'];
                    $item['TipoEmpleador'] = $row['TipoEmpleador'];
                    $item['Sector'] = $row['Sector'];
                    $item['Subsector'] = $row['Subsector'];
                    $item['Registado'] = $row['Registado'];
                    array_push($items, $item);
                }

                return $items;
            } catch (Exception $e) {
                return [];
            }
        }

        public function update(){
            $Upload = true;
            
            try {
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

                if(empty($Fotografia)){
                    $Fotografia = $_POST['FotografiaDefault'];
                    $Upload = false;
                }

                if(empty($Fotografia)){
                    return false;
                }


                $PDO = $this->db->connect();
                #--------------------------------------------
                #          INICIAMOS UNA TRANSACCION
                #--------------------------------------------
                $PDO->beginTransaction();
                #--------------------------------------------
                # EJECUTAMOS LAS CONSULTAS DE LA TRANSACCION
                #--------------------------------------------

                $Usuario_id = $_SESSION['id'];

                $DatoEmpleador = 'SELECT empleadores.dato_empleador_id FROM empleadores WHERE usuario_id = ' . $Usuario_id.'';
                $DatoEmpleador = $PDO->query($DatoEmpleador);
                $DatoEmpleador->execute();

                $DatoEmpleador = $DatoEmpleador->fetch(PDO::FETCH_ASSOC)['dato_empleador_id'];

                $DatoContacto = 'SELECT empleadores.datos_contacto_id FROM empleadores WHERE usuario_id = ' . $Usuario_id .'';
                $DatoContacto = $PDO->query($DatoContacto);
                $DatoContacto->execute();

                $DatoContacto = $DatoContacto->fetch(PDO::FETCH_ASSOC)['datos_contacto_id'];

                $SQL = 'UPDATE Datos_Contacto SET Calle = "'.$Calle.'", Referencias = "'.$Referencias.'", NumExt = "'.$Numero_Ext.'",
                    NumInt = "'.$Numero_Int.'", Colonia_id = '.$Colonia.', Municipio_id = '.$Municipio.', Estado_id = '.$Estado.', Pais_id = '.$Pais.' 
                    WHERE id = (SELECT datos_contacto_id FROM empleadores where usuario_id = '.$Usuario_id.')';

                $Datos_Contacto = $PDO->prepare($SQL);
                $Datos_Contacto->execute();

                $SQL = 'UPDATE Datos_empleador SET Emp_actividad_economica_id = '.$Actividad_Economica.', Emp_tipo_empleador_id = '.$Tipo_Empresa.', 
                    Emp_subsector_id = '. $Subsector.', Emp_sector_actividad_id = '.$Sector_Actividad.', RFC = "'.$RFC.'", RazonSocial = "'.$RazonSocial. '" 
                    WHERE (SELECT dato_empleador_id FROM empleadores where usuario_id = ' . $Usuario_id . ')';

                $Datos_empleador = $PDO->prepare($SQL);
                $Datos_empleador->execute();

                $SQL = 'UPDATE Empleadores SET Nombre = "'.$Nombre.'", Descripcion = "'.$Descripcion.'", Logo = "'.$Fotografia.'", Usuario_id = '.$Usuario_id. ', 
                    Dato_empleador_id = '.$DatoEmpleador.' ,Datos_Contacto_id = '.$DatoContacto.' WHERE Empleadores.Usuario_id = '.$Usuario_id;

                $Empleadores = $PDO->prepare($SQL);
                $Empleadores->execute();

                #--------------------------------------------
                #          FINALIZA LA TRANSACCION
                #--------------------------------------------
                $PDO->commit();

                #Validar subida
                if($Upload){
                    $NAME_TEMP = $_FILES['fotografia']['tmp_name'];
                    $PATH_DIR = constant('STORAGE') . 'LogosEmpresas/';
                    if (move_uploaded_file($NAME_TEMP, $PATH_DIR . $Fotografia)) {
                        chmod($PATH_DIR . $Fotografia, 0777);
                    } else {
                        array_push($this->error_mensaje, 'Error Uploading Your Image');
                        return false;
                    }
                }

                return true;
            }catch (Exception $e ) {
                #--------------------------------------------
                #         SE REVIERTE LA TRANSACCION
                #--------------------------------------------
                $PDO->rollBack();
                #--------------------------------------------
                return false;
            }

        }

        public function destroy(){
            try {
                $id= $_SESSION['id'];

                $PDO = $this->db->connect();
                $PDO->beginTransaction();

                $SQL = 'DELETE usuarios, empleadores, datos_contacto, datos_empleador FROM usuarios
                    JOIN empleadores on empleadores.Usuario_id = usuarios.id
                    JOIN datos_contacto on datos_contacto.id = empleadores.Datos_contacto_id
                    JOIN datos_empleador on datos_empleador.id = empleadores.Dato_empleador_id WHERE Usuario_id ='.$id.'';
                $Destroy_Data = $PDO->prepare($SQL);
                $Destroy_Data->execute();

                $SQL = 'DELETE Ofertas, datos_contacto, solicitudes FROM ofertas
                        LEFT JOIN datos_contacto on datos_contacto.id = ofertas.Dato_contacto_id
                        LEFT JOIN solicitudes on solicitudes.Oferta_id = ofertas.id
                        WHERE ofertas.Empleador_id = (SELECT id FROM empleadores WHERE empleadores.Usuario_id = '.$id.')';
                $Destroy_Offert_Data = $PDO->prepare($SQL);
                $Destroy_Offert_Data->execute();

                $PDO->commit();

                return true;
            }catch (Exception $e){
                $PDO->rollBack();
                print_r($e->getMessage());
                return false;
            }

        }

    }

?>