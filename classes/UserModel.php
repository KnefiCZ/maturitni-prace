<?php 
    //UserModel.php rozšiřuje Model.php a propojuje v databázi tabulku users.
    use Illuminate\Database\Capsule\Manager as DB;

        class UserModel extends Model {
            //SELECT
            public static function getUsers() {
                $users=DB::select("SELECT *
                                   FROM users"
                );
                return $users;
            }
            //SALT THAT IS ADDED TO PASSWORDS
            const SALT = '$2a$09$anexamplestringforsalt$';
            //INSERT
            public static function addUser($firstname, $lastname, $email, $password, $phonenumber, $birthdate, $address, $city, $id_role) {
                $saltedPassword = crypt($password, self::SALT);
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
                                         '$saltedPassword',
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