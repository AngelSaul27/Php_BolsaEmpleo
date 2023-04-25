<?php

    class Profile_Model extends Model {

        public function __construct(){
            parent::__construct();
        }

        public function get(){
            $items = [];
            try {
                $query = $this->db->connect()->prepare('SELECT * FROM vw_aspirantes_full WHERE id ='.$_SESSION['id']);
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

        public function	update(){
            $Upload = true;
            try{
                $Nombre = $_POST['nombre'];
                $ApellidoP = $_POST['apellido_paterno'];
                $ApellidoM = $_POST['apellido_materno'];
                $FechaNacimiento = $_POST['fecha_nacimiento'];
                $Genero = $_POST['genero'];
                $Extension = $_POST['extension'];
                $Tel = $_POST['telefono'];
                $Pais = $_POST['pais'];
                $Estado = $_POST['estado'];
                $Municipio = $_POST['municipio'];
                $Colonia = $_POST['colonia'];
                $Calle = $_POST['calle'];
                $Referencias = $_POST['referencias'];
                $Numero_Ext = $_POST['num_ext'];
                $Numero_Int  = $_POST['num_int'];
                $Bio = $_POST['biografia'];
                $NivelAcademico = $_POST['nivel_academico'];
                $LugarEstudio = $_POST['lugar_estudio'];
                $Titulo = $_POST['titulo'];
                $FechaIngreso = $_POST['fecha_ingreso'];
                $FechaSalida = $_POST['fecha_salida'];
                $PuestoInteres = $_POST['puesto_interes'];
                $Salario = $_POST['salario'];
                $InfoPersonal = $_POST['informacion_personal'];
                
                $Fotografia = $_FILES['fotografia']['name'];
    
                if (empty($Fotografia)) {
                    $Fotografia = $_POST['FotografiaDefault'];
                    $Upload = false;
                }
    
                if (empty($Fotografia)) {
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

                $Escolar_id = 'SELECT aspirantes.Dato_escolar_id FROM aspirantes WHERE usuario_id = ' . $Usuario_id.'';
                $Escolar_id = $PDO->query($Escolar_id);
                $Escolar_id->execute();

                $Contacto_id = 'SELECT aspirantes.Dato_contacto_id FROM aspirantes WHERE usuario_id = ' . $Usuario_id .'';
                $Contacto_id = $PDO->query($Contacto_id);
                $Contacto_id->execute();

                $Profesion_id = 'SELECT aspirantes.Dato_profesional_id FROM aspirantes WHERE usuario_id = ' . $Usuario_id .'';
                $Profesion_id = $PDO->query($Profesion_id);
                $Profesion_id->execute();

                $Escolar_id = $Escolar_id->fetch(PDO::FETCH_ASSOC)['Dato_escolar_id'];
                $Contacto_id = $Contacto_id->fetch(PDO::FETCH_ASSOC)['Dato_contacto_id'];
                $Profesion_id = $Profesion_id->fetch(PDO::FETCH_ASSOC)['Dato_profesional_id'];

                $SQL = 'UPDATE Datos_Contacto SET Calle = "'.$Calle.'", Referencias = "'.$Referencias.'", NumExt = "'.$Numero_Ext.'",
                    NumInt = "'.$Numero_Int.'", Colonia_id = '.$Colonia.', Municipio_id = '.$Municipio.', Estado_id = '.$Estado.', Pais_id = '.$Pais.',
                    Telefono = '.$Tel.', ExtTelefonica =  '.$Extension.' WHERE id = '.$Contacto_id;

                $Query1 = $PDO->prepare($SQL);
                $Query1->execute();

                if(empty($Escolar_id)){
                    $SQL = 'INSERT INTO Datos_Escolares(Lugar, Carrera, FechaIngreso, FechaSalida, Nivel_Academico_id) 
                    VALUES("'.$LugarEstudio.'", "'.$Titulo.'", "'.$FechaIngreso.'", "'.$FechaSalida.'", '.$NivelAcademico.')';
                    $Query2 = $PDO->prepare($SQL);
                    $Query2->execute();

                    $Query2 = $PDO->lastInsertId();
                }else{
                    $SQL = 'UPDATE Datos_Escolares SET Lugar = "' . $LugarEstudio . '", Carrera = "' . $Titulo . '", 
                        FechaIngreso = "' . $FechaIngreso . '", FechaSalida =  "' . $FechaSalida . '", Nivel_Academico_id = ' . $NivelAcademico . ' 
                        WHERE id ='.$Escolar_id;
                    $Query2 = $PDO->prepare($SQL);
                    $Query2->execute();
                }

                if(empty($Profesion_id)){
                    $SQL = 'INSERT INTO Datos_Profesionales(SalarioAprox, InformacionProfesional, Profesion_id) 
                    VALUES('.$Salario.', "'.$InfoPersonal.'", "'.$PuestoInteres.'")';
                    $Query3 = $PDO->prepare($SQL);
                    $Query3->execute();

                    $Query3 = $PDO->lastInsertId();
                }else{
                    $SQL = 'UPDATE Datos_Profesionales SET SalarioAprox = ' . $Salario . ', InformacionProfesional = "' . $InfoPersonal . '", 
                        Profesion_id = "' . $PuestoInteres . '" WHERE id ='.$Profesion_id;
                    $Query3 = $PDO->prepare($SQL);
                    $Query3->execute();
                }

                if(empty($Escolar_id) OR empty($Profesion_id)){
                    $SQL = 'UPDATE Aspirantes SET Nombre = "'.$Nombre.'", ApellidoMaterno = "'.$ApellidoM.'", ApellidoPaterno = "'.$ApellidoP.'", 
                    Fotografia = "'.$Fotografia.'", FechaNacimiento = "'.$FechaNacimiento.'", Biografia = "'.$Bio.'",
                    Genero_id = '.$Genero.', Dato_escolar_id = '.$Query2.' , Dato_profesional_id = '.$Query3.' WHERE Usuario_id = '.$Usuario_id;

                    $Query4 = $PDO->prepare($SQL);
                    $Query4->execute();
                }else{
                    $SQL = 'UPDATE Aspirantes SET Nombre = "' . $Nombre . '", ApellidoMaterno = "' . $ApellidoM . '", ApellidoPaterno = "' . $ApellidoP . '", 
                        Fotografia = "' . $Fotografia . '", FechaNacimiento = "' . $FechaNacimiento . '", Biografia = "' . $Bio . '",
                        Genero_id = ' . $Genero . ' WHERE Usuario_id = ' . $Usuario_id;
                    $Query4 = $PDO->prepare($SQL);
                    $Query4->execute();
                }

                #--------------------------------------------
                #          FINALIZA LA TRANSACCION
                #--------------------------------------------
                $PDO->commit();
                
                #Validar subida
                if($Upload){
                    $NAME_TEMP = $_FILES['fotografia']['tmp_name'];
                    $PATH_DIR = constant('STORAGE') . 'Avatars/';
                    if (move_uploaded_file($NAME_TEMP, $PATH_DIR . $Fotografia)) {
                        chmod($PATH_DIR . $Fotografia, 0777);
                    } else {
                        array_push($this->error_mensaje, 'Error Uploading Your Image');
                        return false;
                    }
                }

                return true;
            }catch(Exception $e){
                $PDO->rollBack();
                print_r($e);
                return false;
            }
            
        }

        public function destroy(){
            //return false;
        }

    }
