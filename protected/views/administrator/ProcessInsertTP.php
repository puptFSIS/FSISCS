<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include('upload-certificate.php');
include("config.php");

$tp2 = mysqli_real_escape_string($conn,$_POST['tp2']);
$tp3 = mysqli_real_escape_string($conn,$_POST['tp3']);
$tp4 = mysqli_real_escape_string($conn,$_POST['tp4']);
$tp5 = mysqli_real_escape_string($conn,$_POST['tp5']);
$tp6 = mysqli_real_escape_string($conn,$_POST['tp6']);
$tp7 = mysqli_real_escape_string($conn,$_POST['tp7']);
$tp8 = mysqli_real_escape_string($conn,$_POST['tp8']);
$tp9 = mysqli_real_escape_string($conn,$_POST['tp9']);
$tp10 = mysqli_real_escape_string($conn,$_POST['tp10']);
$tp11 = mysqli_real_escape_string($conn,$_POST['tp11']);
$tp12 = mysqli_real_escape_string($conn,$_POST['tp12']);
$tp13 = mysqli_real_escape_string($conn,$_POST['tp13']);

$picture_seminar = mysqli_real_escape_string($conn,$_FILES['picture_seminar']['name']);

if(!empty($filename)) {
	$tp14 = $upload_dir . $filename;
} else if(!empty($picture_seminar)) {
	$tp14 = $upload_dir . date('YmGdis') . $picture_seminar;
} else {
	$tp14 = ""; 
}

if($tp2==null || $tp9==null || $tp10==null || $tp11==null || $tp12==null || $tp13==null) {
	header("location: index.php?r=administrator/TrainingProgramNew&msg=Please fill up all the required fields. * Required fields.&msgType=error");
} else if($result == 'ERROR') {
	header("location: index.php?r=administrator/TrainingProgramNew&msg=" . $result_msg . "&msgType=error");
} else {
	$sql="INSERT INTO tbl_tprograms VALUES (NULL, '$EmpID', '$tp2', '$tp3', '$tp4', '$tp5', '$tp6', '$tp7', '$tp8', '$tp9', '$tp10', '$tp11', '$tp12', '$tp13', '$tp14')";
	$result=mysqli_query($conn,$sql);	

	if(!empty($filename)) {
		move_uploaded_file($_FILES['certificate']['tmp_name'], $tp14);
	} else if(!empty($picture_seminar)) {
		move_uploaded_file($_FILES['picture_seminar']['tmp_name'], $tp14);
	} 

	if($result) {
		header("location: index.php?r=administrator/TrainingPrograms&msg=New training program has been added to your voluntary work.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/TrainingPrograms&msg=Error saving information to your training programs.&msgType=error");
	}

}

?>