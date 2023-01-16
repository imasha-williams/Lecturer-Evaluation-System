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

html_header("Manage_Question");

echo<<<EOT

<main id="main" class="main">

<div class="pagetitle">
    <h1>Questions Registration</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Manage Questions</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Questions Form</h5>

              <!-- Horizontal Form -->
              <form action="Controller/Manage_Question.php" method="POST">
                <div class="row mb-3">
                  <label for="inputQuestion" class="col-sm-2 col-form-label">Question</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputQuestion" name = "question_text" required>
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Question Criteria</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name = "question_criteria" required>
                      <option selected>--</option>
                      <option value="Lecturer Based">Lecturer Based</option>
                      <option value="University Based">University Based</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Question Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name = "question_type" required>
                      <option selected>--</option>
                      
                      <option value="Select Answer">Select Answer</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submiting">Submit</button>
              </div>

            </div>
          </div>
          </section>


  

</main><!-- End #main -->

EOT;

html_footer();
?>>