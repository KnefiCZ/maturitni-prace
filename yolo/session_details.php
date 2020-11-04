<?php
   include __DIR__ . DIRECTORY_SEPARATOR .  'classes/Model.php';
   session_start();

   $check_user = $_SESSION['email'];
   
   $SQL = mysqli_query($DB," select * from users where email = '$check_user' ") or die( mysqli_error($DB));

   if(!isset($_SESSION['email'])){
      header("location: user_login.php");
      die();
   }
