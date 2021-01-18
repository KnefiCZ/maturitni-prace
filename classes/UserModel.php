<?php
    //UserModel.php rozšiřuje Model.php a propojuje v databázi tabulku users.
    use Illuminate\Database\Capsule\Manager as DB;

class UserModel extends Model
{
    //SALT THAT IS ADDED TO PASSWORDS
    //private const SALT = '$6$rounds=5000$usesomesillystringforsalt$';
    //SELECT
    public static function getUsers()
    {
        $users=DB::select(
            "SELECT *
                                   FROM users"
        );
        return $users;
    }
    //INSERT
    public static function addUser(
        $firstname,
        $lastname,
        $email,
        $password,
        $phonenumber,
        $birthdate,
        $address,
        $city,
        $id_role
    ) {
        $saltedPassword = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
        $inserted = DB::insert(
            "INSERT INTO users 
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
                                         NOW());"
        );
          return $inserted;
    }
    public static function authenticate(string $email, string $password): bool
    {  
        $saltedPassword = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
        $query = "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$saltedPassword'";
        $authenticate = DB::select($query);
        if (count($authenticate) > 0) {
                //session_start();
                $_SESSION['loggedEmail'] = $email;
                return true;
        }
                return false;
    }
    public static function getRole(): string
    {
        $roleName = 'guest';

        // KONTROLA ROLE, POKUD JE POUŽITO PŘIHLÁŠENÍ
            //session_start();
        if (isset($_SESSION['loggedEmail'])) {
            $role = DB::select(
                "SELECT r.sname
                        FROM users u 
                        JOIN roles r 
                        ON u.id_role = r.id_role
                        WHERE u.email LIKE  '" . $_SESSION['loggedEmail'] . "'"
            );
                if (count($role) > 0 ) {
                    $roleName = $role[0]->sname;
                }
                
        }
                return $roleName;
    }
}
