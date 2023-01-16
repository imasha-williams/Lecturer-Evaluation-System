<?php

require_once "../../Config/database.php";

$sql = "SELECT * FROM class LEFT JOIN programme ON class.program_id = programme.program_id";
$result= $conn->query($sql);
$row = $result->fetch_assoc();

if (isset ($_POST['submiting']) ) { 

$sql =   "INSERT INTO `class`(`class_name`,`program_id`)
VALUES ('{$_POST['Cname']}', '{$_POST['Name']}')";

$conn->query($sql);

header('Location: ../Class_View.php');

}