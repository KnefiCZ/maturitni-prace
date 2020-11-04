<?php //Načtení všech knihoven z adresáře VENDOR
    include_once "classes/UsersModel.php";
    class UserLogin {
        //SALT ADDED TO PASSWORDS
        const SALT = '$2a$09$anexamplestringforsalt$';

        public static function authenticate($email, $password) {
            $saltedPassword = crypt($password, self::SALT);
            if (($email) && ($password)) {
                $_SESSION['loggedEmail'] = $email;
                $_SESSION['loggedPassword'] = $password;
                return TRUE;
            }
            return FALSE;
        }
    }