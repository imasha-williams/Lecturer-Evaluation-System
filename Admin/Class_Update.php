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

html_header("Class_Update");

if (isset($_GET['id'])) { 
  $sql = "SELECT * FROM class WHERE class_id ='".$_GET['id']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $class_id=$row["class_id"];
    $name=$row["class_name"];
  }else {
    header('Location: Class_View.php');
  }

}else {
  $class_id='';
  $name='';
}

echo<<<EOT

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Class</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Update Class</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <br>

        <div class="col-lg-11">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Class Details</h5>

              <!-- General Form Elements -->
              <form method = "GET">
              <input type="hidden" name="class_id" value="$class_id">
              <div class="row mb-3">
                <label for="inputCode" class="col-sm-2 col-form-label">Class Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="Cname" value="$name" required>
               </div>
              </div>

                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary" name="Class_Update" value="Submit">Submit</button>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>

</main><!-- End #main -->

EOT;

html_footer();

if (isset($_GET['Class_Update'])) { 

  $sql = "UPDATE `class` SET  `class_name`= '". $_GET['Cname'] ."' WHERE class_id ='".$_GET['class_id']."'";
  $conn->query($sql);
  
  echo "<script>window.location = 'Class_View.php';</script>";

}

?>