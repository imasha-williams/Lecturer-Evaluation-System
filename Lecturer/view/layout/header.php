<?php

function html_header($active) {

  $Dashboard = "";
  
  $Feedback = "";

  $Change_LecturerPassword = "";

  $Profile = "";

switch ($active) {
    case "Dashboard":
        $Dashboard ="active";
        $active="Dashboard";
        break;

    case "Feedback":
      $Feedback="active";
        $active="Feedback";
        break;

    case "Change_LecturerPassword":
      $Change_LecturerPassword="active";
        $active="Change_LecturerPassword";
        break;
    
    case "Profile":
      $Profile="active";
        $active="Profile";
        break;
    
}

echo <<<EOT
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lecturer Panel - $active</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="Dashboard.php" class="logo d-flex align-items-center">
    <img src="../assets/img/bci_logo.png" alt="">
    <span class="d-none d-lg-block">Lecturer Panel</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <!-- End Notification Nav -->

    <!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"
        aria-expanded="true">
        <i class="bi bi-person-circle" style="font-size:30px;"></i>
        <span class="d-none d-md-block dropdown-toggle ps-2">Lecturer</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" data-popper-placement="bottom-end"
        style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-16px, 38px);">
        <li class="dropdown-header">
          <h6>Lecturer</h6>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="Change_Password.php">
            <i class="bi bi-gear-fill"></i>
            <span>Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="Logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item $Dashboard">
        <a class="nav-link collapsed" href="Dashboard.php">
        <i class="bi bi-bar-chart"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item"> $Feedback
        <a class="nav-link collapsed" href="Feedback_View.php">
        <i class="bi bi-chat-left-dots"></i>
          <span>Feedback Evaluation</span>
        </a>
      </li><!-- End Question Nav -->

      <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

      <li class="nav-item">
        <a class="nav-link collapsed $Change_LecturerPassword" href="Change_Password.php">
        <i class="bi bi-gear"></i>
          <span>Change Password</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

EOT;
}
?>