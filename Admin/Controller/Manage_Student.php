<?php
require_once "../../Config/database.php";

$sql = "SELECT * FROM `user` LEFT JOIN `student` ON `user`.`user_id` = `student`.`user_id` LEFT JOIN `class` ON `student`.`class_id` = `class`.`class_id` WHERE user.user_type='student';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset ($_POST['submiting'])) {  

$sql =   "INSERT INTO `user`(`username`, `password`, `email`, `mobile`, `nic`, `gender`, `birth_day`,  `user_type`)
VALUES ('{$_POST['name']}','{$_POST['password']}','{$_POST['email']}','{$_POST['phone']}','{$_POST['nic']}','{$_POST['gender']}','{$_POST['date']}','student')";

$conn->query($sql);
$userid=$conn->insert_id;

$sql = "INSERT INTO `student`(`user_id`, `class_id`) VALUES ('$userid','{$_POST['Class_id']}')";
$conn->query($sql);

header('Location: ../Student_View.php'); 

}