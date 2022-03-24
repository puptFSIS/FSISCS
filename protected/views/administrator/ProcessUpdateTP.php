<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include('upload-certificate.php');
include("tprogram.php");

$vw1 = mysqli_real_escape_string($conn,$_GET['tpID']);
$vw2 = mysqli_real_escape_string($conn,$_POST['tp2']);
$vw3 = mysqli_real_escape_string($conn,$_POST['tp3']);
$vw4 = mysqli_real_escape_string($conn,$_POST['tp4']);
$vw5 = mysqli_real_escape_string($conn,$_POST['tp5']);
$vw6 = mysqli_real_escape_string($conn,$_POST['tp6']);
$vw7 = mysqli_real_escape_string($conn,$_POST['tp7']);
$vw8 = mysqli_real_escape_string($conn,$_POST['tp8']);
$vw9 = mysqli_real_escape_string($conn,$_POST['tp9']);
$vw10 = mysqli_real_escape_string($conn,$_POST['tp10']);
$vw11 = mysqli_real_escape_string($conn,$_POST['tp11']);
$vw12 = mysqli_real_escape_string($conn,$_POST['tp12']);
$vw13 = mysqli_real_escape_string($conn,$_POST['tp13']);
$vw14 = "";

$picture_seminar = mysqli_real_escape_string($conn,$_FILES['picture_seminar']['name']);

if(!empty($filename)) {
	$vw14 = $upload_dir . $filename;
} else if(!empty($picture_seminar)) {
	$vw14 = $upload_dir . date('YmGdis') . $picture_seminar;
} else {
	$vw14 = $path;
}

if($vw2==null || $vw9==null || $vw10==null || $vw11==null || $vw12==null || $vw13==null) {
	header("location: index.php?r=administrator/tpinfo&tpID=$vw1&msg=Please fill up all the required fields. * Required fields.&msgType=error");
} else if($result == 'ERROR') {
	header("location: index.php?r=administrator/tpinfo&tpID=$vw1&msg=$result_msg&msgType=error");
} else {
	$sql = "UPDATE tbl_tprograms SET title='$vw2', type='$vw3', fromm='$vw4', fromd='$vw5', fromy='$vw6', tom='$vw7', tod='$vw8', toy='$vw9', hours='$vw10', conby='$vw11', level='$vw12', venue='$vw13', path='$vw14' WHERE ID='$vw1'";
	$result=mysqli_query($conn,$sql);	

	if(!empty($filename) || !empty($picture_seminar)) {
		if (file_exists($path)) {
	        unlink($path);
	    }
	}

	if(!empty($filename)) {
		move_uploaded_file($_FILES['certificate']['tmp_name'], $vw14);
	} else if(!empty($picture_seminar)) {
		move_uploaded_file($_FILES['picture_seminar']['tmp_name'], $vw14);
	} 

	if($result) {
		header("location: index.php?r=administrator/TrainingPrograms&msg=Training program has been updated successfully.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/TrainingPrograms&msg=Error saving information to your training programs.&msgType=error");
	}
}

?>