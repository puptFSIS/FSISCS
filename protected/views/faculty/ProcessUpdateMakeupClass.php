<?php
session_start();

$EmpID = $_SESSION['CEmpID'];

include("config.php");
$makeupClassID = $_POST['MakeupClassID'];
$ccode  = $_POST['scode'];
$ctitle = $_POST['stitle'];
$day1   = $_POST['day1'];
$timeS1 = $_POST['timeS1'];
$timeE1 = $_POST['timeE1'];
$room   = $_POST['room1'];
$course = $_POST['course'];


$sql = "UPDATE tbl_makeup_class SET SubjCode = '$ccode', SubjDescription = '$ctitle', day1 = '$day1', timeS1 = '$timeS1', timeE1 = '$timeE1', room1 = '$room', CourseID = '$course' WHERE MakeupClassID = '$makeupClassID'";

mysqli_query($conn, $sql);


header("Location: index.php?r=faculty/MakeupClassRequest&mes=2");

mysqli_close($conn);
?>
