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
                header("location: succesful_login.php");
            }else {
                $error = "Váš email nebo heslo nebylo zadáno správně!";
            }
    }
    var_dump($email);
    var_dump($password);
    var_dump($_SESSION);
?>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>MATURITNÍ-PRÁCE</title>

<!-- Custom fonts for this template -->
<link href="../vendor/components/fontawesome-free/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

    <?php require_once "../header.php"; ?>
    <form action = "#" method = "post">
        <label for="email">Email:</label>
            <input name="email" type="email" placeholder="xxxx@yyyy.xy"><br>
        <label for="password">Heslo:</label>
            <input name="password" type="password" placeholder="********"><br>
        <input type="submit" name="submit" id="submit"> 
    </form>
    <?php  require_once "../footer.php";?>
	