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

$sql = "SELECT * FROM `programme`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $Select_Program = '';
  while ($row = $result->fetch_assoc()) {
      $value = "<option value='" . $row["program_id"] . "'>" . $row["program_name"] . "</option>";
      $Select_Program =  $Select_Program . $value;
  }
} else {
  $Select_Program = "<option></option>";
}

html_header("Manage_Class");

echo<<<EOT

  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Class Registration</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Manage Class</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <br>
  <section class="section">
    <div class="row">
      <div class="col-lg-11">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Adding a New Class</h5>

            <!-- General Form Elements -->
            <form action="Controller/Manage_Class.php" method="POST">

            <div class="row mb-3">
            <label for="inputCode" class="col-sm-2 col-form-label">Class Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Cname" required>
           </div>
           </div>

           <div class="row mb-3">
           <label class="col-sm-2 col-form-label">Programme name</label>
           <div class="col-sm-10">
             <select class="form-select" aria-label="Default select example" name="Name" required>
             <option disabled selected>Select </option>
               $Select_Program
             </select>
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