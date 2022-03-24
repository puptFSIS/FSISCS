<?php

session_start();
$EmpID  = $_SESSION['CEmpID'];
include("config.php");
$ccode  = $_POST['scode'];
$ctitle = $_POST['stitle'];
$day1   = $_POST['day'];
$timeS1 = $_POST['timeS1'];
$timeE1 = $_POST['timeE1'];
$FCode  = $_POST['FCode'];
$room   = $_POST['room'];

// I don't know. For error catching I guess
$sql    = "SELECT * FROM tbl_bridge_subject WHERE SubjCode = '$ccode'";
$result = mysqli_query($conn,$sql);
$count  = mysqli_num_rows($result);

if ($count > 1)
{
    header("Location: index.php?r=administrator/BridgeSchedulingPage");
}
else
{
    $sql = "INSERT INTO tbl_bridge_subject (SubjCode,SubjDescription, FCode, day1, timeS1, timeE1, room1) VALUES ('$ccode','$ctitle', '$FCode','$day1', '$timeS1', '$timeE1', '$room')";
    // Insert the stupid thing
    $result = mysqli_query($conn, $sql);
    $lastId = mysqli_insert_id($conn);

    // Loop through each selected course
    foreach($_POST['course_selected'] as $item)
    {
        $sql = "INSERT INTO tbl_bridge_subject_course (BridgeSubjectID, CourseID) VALUES ('$lastId', '$item')";
        $result = mysqli_query($conn,$sql);
    }

    header("Location: index.php?r=administrator/BridgeSchedulingPage");
}

mysqli_close($conn);

?>
