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

html_header("Lecturer_Update");

if (isset($_GET['id'])) { 
  $sql = "SELECT * FROM user WHERE user_id ='".$_GET['id']."'";
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
    header('Location: Lecturer_View.php');
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

echo<<<EOT

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Lecturer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Update Lecturer</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Lecturer Details</h5>

            <!-- General Form Elements -->
            <form action = "Lecturer_Update.php">
              <input type="hidden" name="user_id" value="$user_id">

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Lecturer Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="$username" required>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputCode" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="$email" required>
             </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Phone No</label>
              <div class="col-sm-10">
                <input type="tele" class="form-control" name="mobile" value="$phone" required>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">NIC</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nic" value="$nic" required>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Birth Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="dob" value="$dob" required>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Select Gender</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="Lgender" value="$gender" required>
                  <option selected>--</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
              </div>
            </div>

            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="Lecturer_Update" value="Submit">Submit</button>
            </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>

  </main><!-- End #main -->

EOT;

html_footer();

if (isset($_GET['Lecturer_Update'])) { 
  $sql = "UPDATE `user` SET `username`= '". $_GET['name'] ."', `email`= '". $_GET['email'] ."', `mobile`= '". $_GET['mobile'] ."',`nic`= '". $_GET['nic'] ."', `birth_day`= '". $_GET['dob'] ."', `gender`= '" .$_GET['Lgender']."' WHERE user.user_id ='".$_GET['user_id']."';";
      $conn->query($sql);
  echo "<script>window.location = 'Lecturer_View.php';</script>";
}

?>