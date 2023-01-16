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

if(isset($_GET['delete'])){
  $sql="DELETE FROM `class` WHERE class_id='".$_GET['delete']."';";
  $conn->query($sql);

  header('Location: Class_View.php');
}

$sql = "SELECT * FROM class LEFT JOIN programme ON class.program_id = programme.program_id";
$result = $conn->query($sql);

html_header("Class_View");

echo<<<EOT

  <main id="main" class="main">
  
  <div class="pagetitle">
    <h1>Class Information</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Class View</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  
  <br>

  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style = "text-align: center;">Class Information</h5>
        <br>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Class id</th>
              <th scope="col">Class Name</th>
              <th scope="col">Program Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tfoot>
          <tr>
            <th scope="col">Class id</th>
            <th scope="col">Class Name</th>
            <th scope="col">Program Name</th>
            <th scope="col">Actions</th>
        </tr>
          </tfoot>
          <tbody>


EOT;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


      echo "<tr> <td>".$row["class_id"]."</td>
                  <td>".$row["class_name"]."</td>
                  <td>".$row["program_name"]."</td>
                  <td> <a href='Class_Update.php?id=".$row['class_id']."'>Edit<br>
                  <a href='Class_View.php?delete=".$row['class_id']."'>Delete</td>
          </tr>";
  }

  echo"</tbody></table></div></div></div>";
} else {
  echo "</tbody></table></div></div></div>";
}


echo <<<EOT

</main><!-- End #main -->

EOT;

html_footer();
?>