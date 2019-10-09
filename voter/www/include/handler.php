<?php
session_start();
include("db_voter.php");
 
if (isset($_POST['question'])){
$question = $_POST['question'];
$description = $_POST['description'];
$answer = $_POST['answer'];
$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];
$answer4 = $_POST['answer4'];

$sql = "INSERT INTO questions(title,description,answer,answer1,answer2,answer3,answer4) VALUES('$question','$description','$answer','$answer1','$answer2','$answer3','$answer4')";
if (mysqli_query($link, $sql)) {
    
     header("Location: ../index.php");   
     exit;
}
    else {
     echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
}
