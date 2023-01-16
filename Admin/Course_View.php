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
  $sql="DELETE FROM `programme` WHERE program_id='".$_GET['delete']."';";
  $conn->query($sql);
  
  header('Location: Course_View.php');
}


$sql = "SELECT * FROM programme";
$result = $conn->query($sql);

html_header("Course_View");

echo<<<EOT

  <main id="main" class="main">
  
  <div class="pagetitle">
    <h1>Programme Information</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Programme View</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  
  <br>

  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style = "text-align: center;">Programme Information</h5>
          <br>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Program Code</th>
              <th scope="col">Program Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Program Code</th>
              <th scope="col">Program Name</th>
              <th scope="col">Actions</th>
            </tr>
          </tfoot>
          <tbody>


EOT;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


      echo "<tr> <td>".$row["program_id"]."</td>
                  <td>".$row["program_code"]."</td> 
                  <td>".$row["program_name"]."</td>
                  <td> <a href='Course_Update.php?id=".$row['program_id']."'>Edit<br>
                  <a href='Course_View.php?delete=".$row['program_id']."'>Delete</td>
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