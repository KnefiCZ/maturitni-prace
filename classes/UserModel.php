<?php 
    //TaskModel.php rozšiřuje Model.php a propojuje v databázi tabulku tasks.
    use Illuminate\Database\Capsule\Manager as DB;

        class UserModel extends Model {
            //SELECT
            public static function getUsers() {
                $users=DB::select("SELECT *
                                   FROM users"
                );
                return $users;
            }
            //INSERT
            public static function addUser($firstname, $lastname, $email, $password, $phonenumber, $birthdate, $address, $city, $id_role) {
                $inserted = DB::insert("INSERT INTO users 
                                    (firstname,
                                    lastname,
                                    email,
                                    password,
                                    phonenumber,
                                    birthdate,
                                    address,
                                    city,
                                    id_role,
                                    created_at)
                                     VALUES(
                                         '$firstname',
                                         '$lastname',
                                         '$email',
                                         '$password',
                                         '$phonenumber',
                                         '$birthdate',
                                         '$address',
                                         '$city',
                                         '$id_role',
                                         NOW());");
        
                  return $inserted;
                
            }
        }
?>