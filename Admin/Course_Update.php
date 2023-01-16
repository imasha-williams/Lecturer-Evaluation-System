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

html_header("Course_Update");

if (isset($_GET['id'])) { 
  $sql = "SELECT * FROM programme WHERE program_id ='".$_GET['id']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $program_id=$row["program_id"];
    $code=$row["program_code"];
    $Program_name=$row["program_name"];
  }else {
    header('Location: Course_View.php');
  }

}else {
  $program_id='';
  $code='';
  $Program_name='';
}

echo<<<EOT

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Programme</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Update Programme</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Programme Details</h5>

              <!-- General Form Elements -->
              <form method ="GET">
              <input type="hidden" name="program_id" value="$program_id">
              <div class="row mb-3">
              <label for="inputCode" class="col-sm-2 col-form-label">Programme Code</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="code" value="$code" required>
             </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Programme Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="$Program_name" required>
              </div>
            </div>

                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary" name="Course_Update" value="Submit">Submit</button>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>

  </main><!-- End #main -->

EOT;

html_footer();

if (isset($_GET['Course_Update'])) { 
  $sql = "UPDATE `programme` SET `program_code`= '". $_GET['code'] ."', `program_name`= '". $_GET['name'] ."' WHERE `program_id`= '". $_GET['program_id'] ."'";
  $conn->query($sql);
      echo "<script>window.location = 'Course_View.php';</script>";
}
?>