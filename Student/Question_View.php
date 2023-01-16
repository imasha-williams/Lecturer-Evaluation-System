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

$sql = "SELECT * FROM question";
$result = $conn->query($sql);

html_header("Question_View");

echo<<<EOT

  <main id="main" class="main">
  
  <div class="pagetitle">
    <h1>Question Form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Question Form</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <br>

  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style = "text-align: center;">Question Form</h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Question</th>
              <th scope="col">Answer1</th>
              <th scope="col">Answer2</th>
              <th scope="col">Answer3</th>
              <th scope="col">Answer4</th>
            </tr>
          </thead>
          <tfoot>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Question</th>
            <th scope="col">Answer1</th>
            <th scope="col">Answer2</th>
            <th scope="col">Answer3</th>
            <th scope="col">Answer4</th>
          </tr>
          </tfoot>
          <tbody>


EOT;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

      echo "<tr> <td>".$row["question_id"]."</td>
                  <td>".$row["question_text"]."</td> 
                  
                  <td> <a href='#?id=".$row['question_id']."'>Strongly Agree</td>
                  <td> <a href='#?id=".$row['question_id']."'>Agree</td>
                  <td> <a href='#?delete=".$row['question_id']."'>Disagree</td>
                  <td> <a href='#?delete=".$row['question_id']."'>Strongly Disagree</td>
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