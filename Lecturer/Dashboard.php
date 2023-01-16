<?php

session_start();
if(!isset($_SESSION['A2dAjns#s']))
{
    header('Location: ../login.php');
}else{
    if((isset($_SESSION['user_type']))and ($_SESSION['type']=='admin')  ){
        header('Location: ../Admin/Dashboard.php');
    }elseif((isset($_SESSION['user_type']))and ($_SESSION['type']=='student')  ){
        header('Location: ../Student/Dashboard.php');
    }elseif((isset($_SESSION['user_type']))and ($_SESSION['type']=='lecturer')  ){
        header('Location: ../Lecturer/Dashboard.php');
    }
}

require_once "../Config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";

$sql = "SELECT * FROM `question` LEFT JOIN `feedback` ON `question`.`question_id` = `feedback`.`question_id` LEFT JOIN `user` ON `feedback`.`lecturer_id` = `user`.`user_id` LEFT JOIN `student` ON `feedback`.`student_id` = `student`.`user_id` WHERE user.user_type='lecturer';";
$result = $conn->query($sql);

$sql = "SELECT COUNT('program_id') FROM `programme`";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$program= $row["COUNT('program_id')"];

$sql = "SELECT COUNT('question_id') FROM `question`";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$question= $row["COUNT('question_id')"];

html_header("Dashboard");

echo<<<EOT

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Programs <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$program</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card revenue-card">
          
            <div class="card-body">
              <h5 class="card-title">Questions <span>| Today</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-question-circle"></i>
                </div>
                <div class="ps-3">
                  <h6>$question</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->
    </section>

</main><!-- End #main -->

EOT;

html_footer();
?>    