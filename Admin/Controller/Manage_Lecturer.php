<?php
require_once "../../Config/database.php";

$sql = "SELECT * FROM `user` LEFT JOIN `lecturer` ON `user`.`user_id` = `lecturer`.`user_id` LEFT JOIN `class` ON `lecturer`.`class_id` = `class`.`class_id` WHERE user.user_type='lecturer';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset ($_POST['submiting'])) {  

$sql =   "INSERT INTO `user`(`username`, `password`, `email`, `mobile`, `nic`, `gender`, `birth_day`,  `user_type`)
VALUES ('{$_POST['Lname']}','{$_POST['Lpassword']}','{$_POST['Lemail']}','{$_POST['Lphone']}','{$_POST['Lnic']}','{$_POST['Lgender']}','{$_POST['Ldate']}','lecturer')";

$conn->query($sql);
$userid=$conn->insert_id;

$sql = "INSERT INTO `lecturer`(`user_id`, `class_id`) VALUES ('$userid','{$_POST['Class_id']}')";
$conn->query($sql);

header('Location: ../Lecturer_View.php'); 

}