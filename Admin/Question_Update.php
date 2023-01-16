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

html_header("Question_Update");

if (isset($_GET['id'])) { 
    $sql = "SELECT * FROM question WHERE question_id ='".$_GET['id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $question_id=$row["question_id"];
      $text=$row["question_text"];
      $criteria=$row["question_criteria"];
      $type=$row["question_type"];
    }else {
      header('Location: Question_View.php');
    }
  
  }else {
    $question_id='';
    $text='';
    $criteria='';
    $type='';
  }

echo<<<EOT

  <main id="main" class="main">

  <div class="pagetitle">
  <h1>Update Questions</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
      <li class="breadcrumb-item active">Update Questions</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<br>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Questions Details</h5>

          <!-- General Form Elements -->
          <form method ="GET">
          <input type="hidden" name="question_id" value="$question_id">

          <div class="row mb-3">
              <label for="inputQuestion" class="col-sm-2 col-form-label">Question</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputQuestion" name="question_text" value="$text">
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
                <select class="form-select" aria-label="Default select example" name="question_type">
                  <option selected>--</option>
                  
                  <option value="Select Answer">Select Answer</option>
                </select>
              </div>
            </div>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary" name="Question_Update" value="Submit">Submit</button>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>
  </div>

</main><!-- End #main -->

EOT;

html_footer();
if (isset($_GET['Question_Update'])) { 
    $sql = "UPDATE `question` SET `question_text`= '". $_GET['question_text'] ."', `question_criteria`= '". $_GET['question_criteria'] ."', `question_type`= '". $_GET['question_type'] ."' WHERE `question_id`= '". $_GET['question_id'] ."'";
    $conn->query($sql);
        echo "<script>window.location = 'Question_View.php';</script>";
  }

?>