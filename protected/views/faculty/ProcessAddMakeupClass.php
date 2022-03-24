<?php

session_start();
$FCode  = $_POST['RequestedFCode'];
include("config.php");
$ccode  = $_POST['scode'];
$ctitle = $_POST['stitle'];
$day1   = $_POST['day'];
$timeS1 = $_POST['timeS1'];
$timeE1 = $_POST['timeE1'];
$room   = $_POST['room'];
$courseID = $_POST['course'];



$sql = "INSERT INTO tbl_makeup_class (SubjCode,SubjDescription, FCode, day1, timeS1, timeE1, room1, CourseID) VALUES ('$ccode','$ctitle', '$FCode','$day1', '$timeS1', '$timeE1', '$room', '$courseID')";

// run the stupid query
mysqli_query($conn, $sql);

header("Location: index.php?r=faculty/MakeupClassRequest&mes=1");

mysqli_close($conn);

?>
