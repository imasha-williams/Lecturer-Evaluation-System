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

$sql = "SELECT * FROM `user` LEFT JOIN `lecturer` ON `user`.`user_id` = `lecturer`.`user_id` LEFT JOIN `class` ON `lecturer`.`class_id` = `class`.`class_id` WHERE user.user_type='lecturer';";
$result = $conn->query($sql);

html_header("Lecturer_View");

echo<<<EOT
      
      <main id="main" class="main">
      
        <div class="pagetitle">
          <h1>Lecturer List</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Lecturer View</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
      
        <br>
      
        <div class="col-lg-12">
      
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center;">Lecturer List</h5>
          <br>
      
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
      
                <tfoot>
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
      
EOT;
      
                  if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
      
      
                  echo "<tr>
                    <td>".$row["username"]."</td>
                    <td> <a href='Question_View.php?id=".$row['user_id']."'>Question Form</td>
                  </tr>";
                  }
      
                  echo"</tbody></table></div></div></div>";
                } else {
                  echo "</tbody></table></div></div></div>";
                }
      
echo<<<EOT
        
</main><!-- End #main -->
      
EOT;

html_footer();

?>