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
  $sql="DELETE FROM `user` WHERE user_id ='".$_GET['delete']."';";
  $conn->query($sql);

  header('Location: Lecturer_View.php');
}

$sql = "SELECT * FROM `user` LEFT JOIN `lecturer` ON `user`.`user_id` = `lecturer`.`user_id` LEFT JOIN `class` ON `lecturer`.`class_id` = `class`.`class_id` WHERE user.user_type='lecturer';";
//$sql = "SELECT * FROM user WHERE user_type = 'lecturer'";
$result = $conn->query($sql);

html_header("Lecturer_View");

echo<<<EOT
      
      <main id="main" class="main">
      
        <div class="pagetitle">
          <h1>Lecturer Information</h1>
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
              <h5 class="card-title" style="text-align: center;">Lecturer Information</h5>
          <br>
      
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">NIC</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
      
                <tfoot>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">NIC</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
      
EOT;
      
                  if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
      
      
                  echo "<tr>
                    <td>".$row["user_id"]."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["class_name"]."</td>
                    <td>".$row["mobile"]."</td>
                    <td>".$row["nic"]."</td>
                    <td>".$row["gender"]."</td>
                    <td>".$row["birth_day"]."</td>
                    <td>".$row["date_created"]."</td>
                    <td> <a href='Lecturer_Update.php?id=".$row['user_id']."'>Edit<br>
                        <a href='Lecturer_View.php?delete=".$row['user_id']."'>Delete</td>
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