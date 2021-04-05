<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR .  "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
?>
<?php
session_start();
$submit = filter_input(INPUT_POST, 'submit');
$logout = filter_input(INPUT_GET, 'logout');
if(isset($submit)) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $authenticate = UserModel::authenticate($email, $password);
    var_dump($authenticate);
    if ($authenticate) { header("location: ../index.php"); 
    }
    //echo "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$saltedPassword';";
}
?>
<!DOCTYPE html>
    <html lang="cs">
    <html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Přihlášení</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v19/images/icons/favicon.ico">
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./css/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="./css/animate.css">
        <link rel="stylesheet" type="text/css" href="./css/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="./css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="./css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="./css/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="./css/util.css">
        <link rel="stylesheet" type="text/css" href="./css/main.css">

    </head>
    <body>
        <?php 
            if(isset($_SESSION['loggedEmail'])) {
        ?>
            <p>Luxus! Jsi přihlášen jako <b> <?php echo $_SESSION['loggedEmail'];?> </b> </p>
            <p>Tvá role je : <b> <?php echo UserModel::getRole() ?> </b> </p>
        <?php } else { // jinak zobraz formulář k přihlášení ?>  
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                    <form class="login100-form" action="user_login.php" method="post">
                    <span class="login100-form-title p-b-33">
                    Přihlášení účtu
                    </span>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="email" name="email" placeholder="Email">
                            <span class="focus-input100-1"></span>
                            <span class="focus-input100-2"></span>
                        </div>
                    <div class="wrap-input100 rs1 validate-input">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-20">
                        <input class="login100-form-btn" type="submit" name="submit" value="Přihlásit">
                    </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php } ?>
            <?php 
            if (isset($submit) && !$authenticate) { ?>
                <p class="wrong_login">Špatné přihlašovací údaje!</p>
            <?php } ?>
        </div>


    </body>
</html>