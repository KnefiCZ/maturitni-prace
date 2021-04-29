<?php //Načtení všech knihoven z adresáře VENDOR
      //DOLE JE PRSMEROVANI
    session_start();
    require_once "vendor/autoload.php";
    $roleName = UserModel::getRole();
    if(in_array($roleName, ['admin', 'submitter', 'implementer' ])) {  
    ?>
        
<!DOCTYPE html>
<html lang="cz">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MATURITNÍ-PRÁCE</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/components/fontawesome-free/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom css file -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="page-top">
      <!-- Page Wrapper -->
  <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">MATURITNÍ PRÁCE CSM</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  
<!-- Nav Item - Tasks 
<li class="nav-item">
    <a class="nav-link" href="select_tasks.php">
      <i class="fas fa-fw fa-tasks"></i>
      <span>Tásky</span></a>
  </li>-->
  <?php // tato tabulka se zobrazí jen ADMINOVY! 
    $roleName = UserModel::getRole();
    if ($roleName == 'admin') {?>
  <!-- Nav Item - Users -->
  <li class="nav-item">
    <a class="nav-link" href="select_users.php">
      <i class="fa fa-bars"></i>
      <span>Uživatelé</span></a>
      </li>
    <?php } ?>
    <?php // tato tabulka se zobrazí jen ADMINOVY! 
    $roleName = UserModel::getRole();
    if ($roleName == 'admin') {?>
  <!-- Nav Item - Roles -->
  <li class="nav-item">
    <a class="nav-link" href="select_roles.php">
      <i class="fa fa-bars"></i>
      <span>Role</span></a>
      </li>
      <?php } ?>
  <!-- Nav Item - Tasks -->
  <li class="nav-item">
    <a class="nav-link" href="select_tasklists.php">
      <i class="fa fa-bars"></i>
      <span>Seznamy úkolů</span></a>
      </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->  
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Vyhledat..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
       <!-- Login     -->
       <?php if (!isset($_SESSION['loggedEmail'])) { ?>
       <a href="login/user_login.php" class="btn btn-primary" type="button"> Přihlásit </a>
       <?php   }
        ?>
      <?php if (isset($_SESSION['loggedEmail'])) { ?>
        <!--  Logout    -->
        <a href="login/user_logout.php" class="btn btn-primary" type="button"> Odhlásit se</a>
      <?php   }
        ?>
        
    </nav>
    
    <!-- End of Topbar -->
    
        <!-- Begin Page Content -->
        <div class="container-fluid">
      <?php } else {
         header("location:Login/user_login.php");
      } ?>

