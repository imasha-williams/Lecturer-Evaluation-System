<?php
require_once "../../Config/database.php";

$sql ='SELECT * FROM question';
$result= $conn->query($sql);
$row = $result->fetch_assoc();

if (isset ($_POST['submiting']) ) {  

    $text=$_POST['question_text'];
    $criteria=$_POST['question_criteria'];
    $type=$_POST['question_type'];

$sql = "SELECT * FROM question";
$result = $conn->query($sql);

$sql =   "INSERT INTO `question`( `question_text`, `question_criteria`, `question_type`)
VALUES ('".$text."','".$criteria."','".$type."')";
$conn->query($sql);
var_dump($sql);

header('Location: ../Question_View.php'); 

}