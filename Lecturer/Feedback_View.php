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

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

html_header("Evaluation_View");

echo<<<EOT


<main id="main" class="main">
<br>

<div class="col-lg-13">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Evaluation Chart</h5>

              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    title: {
                      text: 'Evaluation Result',
                      subtext: 'Total Result',
                      left: 'center'
                    },
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      type: 'pie',
                      radius: '50%',
                      data: [{
                          value: 1048,
                          name: 'Strongly Agree'
                        },
                        {
                          value: 735,
                          name: 'Agree'
                        },
                        {
                          value: 580,
                          name: 'Disagree'
                        },
                        {
                          value: 484,
                          name: 'Strongly Disagree'
                        }
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div>
        <br>

  
  <div class="pagetitle">
    <h1>Evaluation Information</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Evaluation View</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  
  <br>

  <div class="col-lg-15">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style = "text-align: center;">Evaluation Information</h5>
        <br>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Question</th>
              <th scope="col">Feedback</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">Question</th>
              <th scope="col">Feedback</th>
            </tr>
          </tfoot>
          <tbody>


EOT;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


      echo "<tr>  <td>".$row["question"]."</td> 
                  <td>".$row["feedback"]."</td>
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