<?php 
// PROC SE MI KURVA NEJDE DOSTAT DO MODEL.php PRES TENHLE ZKURVENEJ SOUBOR KURVA AAAAAA A A A !!! >:(((((( UZ NA TO NEMAM
require_once '../vendor/autoload.php';
?>
<?php
session_start();
$submit = filter_input(INPUT_POST, 'submit');
$logout = filter_input(INPUT_GET, 'logout');
if(isset($submit)) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $authenticate = UserModel::authenticate($email, $password);
    if ($authenticate) { header("location: ../index.php"); }
    echo "SELECT * FROM useres WHERE email LIKE '$email' AND password LIKE '$saltedPassword'";
}
 
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php 
    var_dump($_SESSION['loggedEmail']);
    if(isset($_SESSION['loggedEmail']))  {
    ?>
        <p>Luxus! Jsi přihlášen jako <?= $_SESSION['loggedEmail'];?> </p>
    <?php } else { // jinak zobraz formulář k přihlášení ?>
 
    <h1>Přihlašovací formulář</h1>
    <form action="user_login.php" method="post">
        <label for="email">Přihlašovací email:</label>
            <input type="email" name="email">
        <label for="password">Heslo:</label>
            <input type="password" name="password">
        <input type="submit" name="submit" value="Odeslat">
    </form>
    <?php } ?>
    <?php 
        if (isset($submit) && !$authenticate) { ?>
            <p>Špatné přihlašovací údaje!</p>
    <?php } ?>
</body>
</html>

