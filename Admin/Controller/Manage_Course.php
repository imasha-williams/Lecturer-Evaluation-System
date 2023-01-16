<?php
require_once "../../Config/database.php";

$sql ='SELECT * FROM programme';
$result= $conn->query($sql);
$row = $result->fetch_assoc();

if (isset ($_POST['submiting']) ) {  

    $program_code=$_POST['Ccode'];
    $program_name=$_POST['Cname'];

$sql =   "INSERT INTO `programme`( `program_code`, `program_name`)
VALUES ('".$program_code."','".$program_name."')";



$conn->query($sql);

header('Location: ../Course_View.php'); 

}