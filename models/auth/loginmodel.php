<?php

class LoginModel extends Model{

    function __construct()
    {
        parent::__construct();

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        try{
            $items = [];

            $query = $this->db->connect()->prepare('SELECT * FROM vw_login_event where Email = "'.$email.'" and password = "'.$password.'"');
            $query->execute();

            while ($row = $query->fetch()) {
                $user_id = $row['id'];
                array_push($items, $user_id);
                $correo = $row['Email'];
                array_push($items, $correo);
                $password = $row['Password'];
                array_push($items, $password);
                $role = $row['Role'];
                array_push($items, $role);
            }

            if(!$items){
                return false;
            }

            if($items[3] == 'Empleador'){
                $_SESSION['id'] = $items[0];
                $_SESSION['role'] = 'Empleador';
                return false;
            }

            if ($items[3] == 'Aspirante') {
                $_SESSION['id'] = $items[0];
                $_SESSION['role'] = 'Aspirante';
                return false;
            }

            if ($items[3] == 'Administrador') {
                $_SESSION['id'] = $items[0];
                $_SESSION['role'] = 'Administrador';
                return false;
            }

        }catch (Exception $e){
            print_r($e->getMessage());
            return false;
        }

    }

}