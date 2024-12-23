<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NEEMATTECH | VENTURE</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  
 <!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  


    <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">


 <!-- DataTables -->
 <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  


<!-- SweetAlert2 -->
<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
<style>

/* Button Styles */
.button {
  padding: 10px 20px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Back Button */
#backButton {
  background-color: #4CAF50;
  color: white;
}

/* Forward Button */
#forwardButton {
  background-color: #008CBA;
  color: white;
}

/* Hover Effect */
.button:hover {
  background-color: #45a049; /* Darker shade of green for Back Button */
}

#forwardButton:hover {
  background-color: #007095; /* Darker shade of blue for Forward Button */
}

/* Align buttons horizontally */
#backButton, #forwardButton {
  margin-right: 10px;
}



</style>

</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">

  

<div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="index3.html" class="nav-link">Home</a> -->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="#" class="nav-link">Contact</a> -->
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!--backward button -->
      <li class="nav-item dropdown">
      <button id="backButton" class="button">Back</button>
      </li>

      <!-- farward button-->
      <li class="nav-item dropdown">
      <button id="forwardButton" class="button">Forward</button>
      </li>

      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" >
      <span class="brand-text font-weight-light">STORE APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

<?php  if ($_SESSION['role'] == 'Admin')  {
include('adminmenu.php');

} else {
include('usermenu.php');
}
?>

    </div>
    <!-- /.sidebar -->
  </aside>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
    var backButton = document.getElementById("backButton");
    var forwardButton = document.getElementById("forwardButton");

    backButton.addEventListener("click", function() {
        window.history.back();
    });

    forwardButton.addEventListener("click", function() {
        window.history.forward();
    });
});

  </script>