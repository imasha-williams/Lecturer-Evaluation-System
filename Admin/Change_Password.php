<?php

session_start();
require_once "../Config/database.php";

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

if (isset($_POST['Change_Password'])) { 
    

    $sql = "SELECT * FROM `user` WHERE email = '{$_SESSION['email']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $oldpass= $row["password"];
    if ($oldpass==$_POST['a_pass']) {
        $sql = "UPDATE `user` SET `password`= '".$_POST['a_new'] ."' WHERE email ='".$_SESSION['email']."'";
        $conn->query($sql);
       
        echo '<script>alert(" Pass Changed")</script>';
        header('Location: Dashboard.php');
    }else{
        echo '<script>alert("Wrong Pass")</script>';

    }

        
}

require_once "../Config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";

$sql = "SELECT * FROM user WHERE email='".$_SESSION['email']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$user_id= $row["user_id"];
$password= $row["password"];

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
                                    <input type="password" class="form-control" id="a_pass" name="a_pass" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" class="form-control" name="a_new">
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="Change_Password">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
EOT;

html_footer();

?>