<?php


function html_header($active) {

  $Dashboard = "";
	$Student_View = "";
	$Manage_Students = "";

    $Lecturer_View = "";
    $Manage_Lecturer="";

    $Program_View = "";
    $Manage_Program = "";

    $Faculty_View = "";
    $Manage_Faculty = "";

	  $Course_view = "";
    $Manage_Course = "";

    $Class_View = "";
    $Manage_Class = "";

    $Question_View = "";
    $Manage_Question = "";

    $Evaluation_View = "";

    $Change_Password = "";


switch ($active) {
    case "Dashboard":
        $Dashboard ="active";
        $active="Dashboard";
        break;

    case "Student_View":
        $Student_View="active";
        $active="Student View";
        break;

    case "Manage_Students":
        $Manage_Students = "active";
        $active="Manage Students";
        break;
    
    case "Lecturer_View":
        $Lecturer_View="active";
        $active="Lecturer View";
        break;

    case "Manage_Lecturer":
        $Manage_Lecturer="active";
        $active="Manage_Lecturer";
        break;
    
    case "Course_view":
        $Course_view="active";
        $active="Course_view";
        break;

    case "Manage_Course":
        $Manage_Course="active";
        $active="Manage_Course";
        break;

	case "Class_View":
        $Class_View="active";
        $active="Class_View";
        break;

	case "Manage_Class":
        $Manage_Class="active";
        $active="Manage_Class";
        break;

    case "Question_View":
        $Question_View="active";
        $active="Question_View";
        break;

    case "Manage_Question":
        $Manage_Question="active";
        $active="Manage_Question";
        break;

    case "Evaluation_View":
        $Evaluation_View="active";
        $active="Evaluation_View";
        break;

    case "Change_Password":
        $Change_Password="active";
        $active="Change_Password";
        break;
}



echo <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Panel - $active</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="Dashboard.php" class="logo d-flex align-items-center">
        <img src="../assets/img/bci_logo.png" alt="">
        <span class="d-none d-lg-block">Admin Panel</span>
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
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" data-popper-placement="bottom-end"
            style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-16px, 38px);">
            <li class="dropdown-header">
              <h6>Admin</h6>
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
          <i class="bi bi-bar-chart-line"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Lecturers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Lecturer_View.php $Lecturer_View">
              <i class="bi bi-circle"></i><span>Lecturer View</span>
            </a>
          </li>
          <li>
            <a href="Manage_Lecturer.php $Manage_Lecturer">
              <i class="bi bi-circle"></i><span>Manage Lecturer</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="Student_View.php $Student_View">
              <i class="bi bi-circle"></i><span>Student View</span>
            </a>
          </li>
          <li>
            <a href="Manage_Students.php $Manage_Students">
              <i class="bi bi-circle"></i><span>Manage Student</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i></i><span>Programs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Course_View.php $Course_view">
              <i class="bi bi-circle"></i><span>Programme View</span>
            </a>
          </li>
          <li>
            <a href="Manage_Course.php $Manage_Course">
              <i class="bi bi-circle"></i><span>Manage Programme</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar-range"></i><span>Classes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Class_View.php $Class_View">
              <i class="bi bi-circle"></i><span>Class View</span>
            </a>
          </li>
          <li>
            <a href="Manage_Class.php $Manage_Class">
              <i class="bi bi-circle"></i><span>Manage Class</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#question-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-question-octagon"></i><span>Questionnaire</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="question-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Question_View.php $Question_View">
              <i class="bi bi-circle"></i><span>Questionnaire view</span>
            </a>
          </li>
          <li>
            <a href="Manage_Question.php $Manage_Question">
              <i class="bi bi-circle"></i><span>Manage Questionnaire</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed $Evaluation_View" href="Evaluation_View.php">
          <i class="bi bi-file-earmark-bar-graph"></i>
          <span>Evaluation</span>
        </a>
      </li><!-- End Login Page Nav -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed $Change_Password" href="Change_Password.php">
          <i class="bi bi-gear"></i>
          <span>Change Password</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
EOT;
}
?>