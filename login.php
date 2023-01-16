<?php

require_once "Config/database.php";

session_start();

if (isset ($_POST['submit']) ) {  
    echo "<script src='js/sweetalert.js'></script>";
    echo "<br>";

    // Submit Check 
    // Err Check OK 
    
    // SQL INJ Check Pass
    if ($stmt = $conn->prepare('SELECT email, password,user_type FROM user WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);

    //Code Completed
    // Err Code Xdebug 0010 X SQL ERR
    // Debug time : 10s.

        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result( $email, $password,$user_type );
            $stmt->fetch();
            $post_password=$_POST['password'];
            if ($post_password== $password) {
                session_regenerate_id();
                $_SESSION['A2dAjns#s']=rand(50,5000);
                $_SESSION['email'] =$email;
                $_SESSION['type']=$user_type;

                if ($user_type=='admin') {
                    header('Location: Admin/Dashboard.php');
                }elseif($user_type=='student'){
                    header('Location: Student/Dashboard.php');
                }elseif($user_type=='lecturer'){
                    header('Location: Lecturer/Dashboard.php');
                }
             
                
            } else {
                echo "<script>Swal.fire('Incorrect Password!','Incorrect Password!','error').then(function() {window.location = 'index.php';});</script>";
            }
        } else {
           echo "<script>Swal.fire('Incorrect Email!','Incorrect Email!','error').then(function() {window.location = 'index.php';});</script>";
        }
    
        $stmt->close();
    }


}else {
    echo "<script>window.location = 'index.php';</script>";
}


?>