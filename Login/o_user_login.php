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
    if ($authenticate) { header("location: ../index.php"); 
    }
    echo "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$saltedPassword';";
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
      <!-- Custom fonts for this template -->
        <link href="vendor/components/fontawesome-free/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

      <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

      <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
    .wrong_login {
        color: red;
    }
    </style>
</head>
<body>
    <div class="login-obal">
    <?php 
    if(isset($_SESSION['loggedEmail'])) {
        ?>
        <p>Luxus! Jsi přihlášen jako <b> <?php echo $_SESSION['loggedEmail'];?> </b> </p>
        <p>Tvá role je : <b> <?php echo UserModel::getRole() ?> </b> </p>
    <?php } else { // jinak zobraz formulář k přihlášení ?>  
    <h1>Přihlašovací formulář</h1>
        <form class="login-form" action="user_login.php" method="post">
            <label for="email">Přihlašovací email:</label>
                <input type="email" name="email"> <br>
            <label for="password">Heslo:</label>
                <input type="password" name="password">
                <input type="submit" name="submit" value="Odeslat">
        </form>
    
    <?php } ?>
    <?php 
    if (isset($submit) && !$authenticate) { ?>
            <p class="wrong_login">Špatné přihlašovací údaje!</p>
    <?php } ?>
    </div>
</body>
</html>

