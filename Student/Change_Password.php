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

$sql = "SELECT * FROM user WHERE email='".$_SESSION['email']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['Change_StudentPassword'])) { 

    $sql = "SELECT * FROM `user` WHERE email = '{$_SESSION['email']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $oldpass= $row["password"];
        if ($oldpass==$_POST['s_pass']) {
            $sql = "UPDATE `user` SET `password`= '".$_POST['s_new'] ."' WHERE email ='".$_SESSION['email']."'";
            $conn->query($sql);
        
            echo '<script>alert(" Pass Changed")</script>';
            header('Location: Dashboard.php');
        }else{
            echo '<script>alert("Wrong Pass")</script>';

        }
    }

html_header("Change_Password");

echo<<<EOT

<main id="main" class="main">

    <br>
    <section class="section">
    <div class="row">
    <div class="col-lg-11">

        <div class="card">
            <div class="card-body">
            <form method="POST">
            <h5 class="card-title">Change Your Password</h5>
                <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                    <input type="password" class="form-control" onkeyup='check_pass();' id="s_pass" name="s_pass" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                    <input type="password" class="form-control" id="s_new" name="s_new">
                    </div>
                </div>

                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary" name="Change_StudentPassword">Submit</button>
                </div>
                </form><!-- End Change Password Form -->
            </div>
        </div>
    </div>
    </div>
    </section>

</main><!-- End #main -->

EOT;

html_footer();

?>