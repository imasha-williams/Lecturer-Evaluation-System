<?php
require_once "../config/database.php";

if (isset($_POST['Change_StudentPassword'])) { 
    
    $sql = "UPDATE `user` SET `password`= '".
        $_POST['s_new'] ."' WHERE user_id ='".
        $_POST['id']."'";
        $conn->query($sql);
        var_dump($sql);
        
        //header('Location: ../Student/Dashboard.php');
}
?>