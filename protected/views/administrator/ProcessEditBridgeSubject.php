<?php
session_start();

$EmpID = $_SESSION['CEmpID'];

include("config.php");
$ccode  = $_POST['scode'];
$ctitle = $_POST['stitle'];
$day1   = $_POST['day1'];
$timeS1 = $_POST['timeS1'];
$timeE1 = $_POST['timeE1'];
$FCode  = $_POST['FCode'];
$room   = $_POST['room1'];

// Get the stupid BridgeSubjectID
$BridgeSubjectID = $_POST['BridgeSubjectID'];

// Just delete the courses that are associated with this subject
$sql = "DELETE FROM tbl_bridge_subject_course WHERE BridgeSubjectID = ".$BridgeSubjectID;
$result = mysqli_query($conn,$sql);	

// Loop through each selected course
foreach($_POST['course_selected'] as $item)
{
    // Insert the courses
    $sql = "INSERT INTO tbl_bridge_subject_course (BridgeSubjectID, CourseID) VALUES ('$BridgeSubjectID', '$item')";
    $result = mysqli_query($conn,$sql);	
}

$sqlUpdate = "UPDATE tbl_bridge_subject SET FCode='$FCode', day1='$day1', timeS1='$timeS1', timeE1='$timeE1', room1='$room' WHERE BridgeSubjectID = $BridgeSubjectID";
// Update the thing
$resultUpdate = mysqli_query($conn,$sqlUpdate);


if($result)
{
    header("Location: index.php?r=administrator/BridgeSchedulingPage");
}

mysqli_close($conn);
?>
