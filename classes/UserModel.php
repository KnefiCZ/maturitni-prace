<?php 
    //UserModel.php rozšiřuje Model.php a propojuje v databázi tabulku users.
    use Illuminate\Database\Capsule\Manager as DB;

        class UserModel extends Model {
            //SALT THAT IS ADDED TO PASSWORDS
            const SALT = '$2a$09$anexamplestringforsalt$';
            //SELECT
            public static function getUsers() {
                $users=DB::select("SELECT *
                                   FROM users"
                );
                return $users;
            }
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
            public static function authenticate(string $email, string $password): bool {
            $saltedPassword = crypt($password, self::SALT);
            $authenticate = DB::select("SELECT * FROM useres WHERE email LIKE $email AND password LIKE $saltedPassword");
            
            if ($authenticate !== FALSE) {
                sesstion_start();
                $_SESSION['loggedEMail'] = $email;
                return TRUE;
                }
            return FALSE;
            }
            public static function getRole() {
                $role=DB::select("SELECT *
            FROM roles"
               );
                //  if ($_SESSION['role'] == 'admin') {
                //  }
             }
    }
?>