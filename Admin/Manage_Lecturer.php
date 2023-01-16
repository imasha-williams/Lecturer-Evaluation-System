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

$sql = "SELECT * FROM `class`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $Select_Class = '';
  while ($row = $result->fetch_assoc()) {
      $value = "<option value='" . $row["class_id"] . "'>" . $row["class_name"] . "</option>";
      $Select_Class =  $Select_Class . $value;
  }
} else {
  $Select_Class = "<option></option>";
}

html_header("Manage_Lecturer");

echo<<<EOT

  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Lecturer Registration</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Manage Lecturers</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <br>
  <section class="section">
    <div class="row">
      <div class="col-lg-11">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Adding a New Lecturer</h5>

            <!-- General Form Elements -->
            <form action="Controller/Manage_Lecturer.php" method="POST">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="Lname" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="Lpassword" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="Lemail" required>
                </div>
              </div>

              <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Class name</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="Class_id" required>
                <option disabled selected>Select </option>
                  $Select_Class
                </select>
              </div>
            </div>

              <div class="row mb-3">
                <label for="InputNumber" class="col-sm-2 col-form-label">Phone No</label>
                <div class="col-sm-10">
                  <input type="tele" class="form-control" name="Lphone" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="InputNumber" class="col-sm-2 col-form-label">NIC</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="Lnic" required>
                </div>
              </div>

              <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Select Gender</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="Lgender" required>
                  <option selected>--</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
              </div>
            </div>

              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="Ldate" required>
                </div>
              </div>

              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submiting">Submit</button>
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

?>