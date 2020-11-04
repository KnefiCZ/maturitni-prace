<?php
    include 'DB.php';
    require_once '../classes/Model.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = mysqli_real_escape_string($DB,$_POST['email']);
        $password = mysqli_real_escape_string($DB,$_POST['password']); 
        $SQL_AUTHENTICATE = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($DB, $SQL_AUTHENTICATE) or die( mysqli_error($DB));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);      

            if($count == 1) {
                $_SESSION['email'] = "$email";
                header("location: welcome.php");
            }else {
                $error = "Váš email nebo heslo nebylo zadáno správně!";
            }
    }
    var_dump($email);
    var_dump($password);
    var_dump($_SESSION);
?>
    <?php require_once "../header.php"; ?>
    <form action = "#" method = "post">
        <label for="email">Email:</label>
            <input name="email" type="email" placeholder="xxxx@yyyy.xy"><br>
        <label for="password">Heslo:</label>
            <input name="password" type="password" placeholder="********"><br>
        <input type="submit" name="submit" id="submit"> 
    </form>
    <?php  require_once "../footer.php";?>
	