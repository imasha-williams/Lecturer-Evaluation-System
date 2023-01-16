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

if (isset($_GET['id'])) { 
  $sql = "SELECT * FROM user WHERE user_id='".$_GET['id']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id=$row["user_id"];
    $username=$row["username"];
    $email=$row["email"];
    $phone=$row["mobile"];
    $nic=$row["nic"];
    $dob=$row["dob"];
    $gender=$row["gender"];
  }else {
    header('Location: Student_View.php');
  }

}else {
  $user_id='';
  $username='';
  $email='';
  $phone='';
  $nic='';
  $dob='';
  $gender='';
}

/*$sql = "SELECT * FROM `class`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $Select_Class = '';
  while ($row = $result->fetch_assoc()) {
      $value = "<option value='" . $row["class_name"] . "'>" . $row["class_name"] . "</option>";
      $Select_Class =  $Select_Class . $value;
  }
} else {
  $Select_Class = "<option></option>";
}
*/


html_header("Student_Update");

echo<<<EOT

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Student</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Update Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <br>
    <section class="section">
      <div class="row">
        <div class="col-lg-11">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Student Details</h5>

              <!-- General Form Elements -->
              <form action = "Student_Update.php">
              <input type="hidden" name="user_id" value="$user_id">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="$username" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="$email" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="InputNumber" class="col-sm-2 col-form-label">Phone No</label>
                  <div class="col-sm-10">
                    <input type="tele" class="form-control" name="pnumber" value="$phone" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="InputNumber" class="col-sm-2 col-form-label">NIC</label>
                  <div class="col-sm-10">
                    <input type="tele" class="form-control" name="nic" value="$nic" required>
                  </div>
                </div>

                <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="dob" value="$dob" required>
                </div>
              </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select Gender</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="gender" value="$gender" required>
                      <option selected>--</option>
                      <option value="Female">Female</option>
                      <option value="Male">Male</option>
                    </select>
                  </div>
                </div>

                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary" name="Student_Update">Submit</button>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  

EOT;

html_footer();

if (isset($_GET['Student_Update'])) { 
  //$sql = "UPDATE `user` LEFT JOIN `student` ON `user`.`user_id` = `student`.`user_id` LEFT JOIN `class` ON `student`.`class_id` = `class`.`class_id` SET `user`.`class_id = `class`.`class_id` WHERE user.user_type='student';";
  $sql = "UPDATE `user` SET `username`= '". $_GET['name'] ."', `email`= '". $_GET['email'] ."', `mobile`= '". $_GET['pnumber'] ."',`nic`= '". $_GET['nic'] ."', `birth_day`= '". $_GET['dob'] ."', `gender`= '" .$_GET['gender']."' WHERE user.user_id ='".$_GET['user_id']."';";
      $conn->query($sql);
      
      echo "<script>window.location = 'Student_View.php';</script>";
}

?>