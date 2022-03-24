<?php

session_start();
$EmpID  = $_SESSION['CEmpID'];
include("config.php");
$BridgeSubjectID = $_POST['BridgeSubjectID'];
$day2            = $_POST['day'];
$timeS2          = $_POST['timeS2'];
$timeE2          = $_POST['timeE2'];
$room            = $_POST['room'];

// I don't know. For error catching I guess
// $sql    = "SELECT * FROM tbl_bridge_subject WHERE SubjCode = '$ccode'";
// $result = mysqli_query($conn,$sql);
// $count  = mysqli_num_rows($result);

$sql = "UPDATE tbl_bridge_subject SET day2 = '$day2', timeS2 = '$timeS2', timeE2 = '$timeE2', room2 = '$room' WHERE BridgeSubjectID = '$BridgeSubjectID'";
// Insert the stupid thing
$result = mysqli_query($conn,$sql);

header("Location: index.php?r=administrator/BridgeSchedulingPage");

mysqli_close($conn);

?>
