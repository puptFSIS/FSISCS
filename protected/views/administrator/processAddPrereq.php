<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$currID = $_POST['currID'];
	$courseID = $_POST['courseID'];
	$scode = $_POST['scode'];
	$sy = $_POST['sy'];
	$cYear = $_POST['year'];
	$req1 = $_POST['prereq'];
	$sql1 = "SELECT * FROM tbl_subjectload WHERE currID='$currID' AND courseID='$courseID' AND scode='$scode' AND schoolYear = '$sy'";
	$result1 = mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($result1);
	$req2 = $row['prereq'];
	$prereq = $req2 . '/' . $req1;
	$sql="UPDATE tbl_subjectload SET prereq = '$prereq' WHERE currID='$currID' AND courseID='$courseID' AND scode='$scode' AND schoolYear = '$sy'";
	$result=mysqli_query($conn,$sql);
	if($result){
		header("Location: index.php?r=administrator/ViewCurriculum&courseID=$courseID&year=$cYear&currID=$currID&sy=$sy");
	}
	mysqli_close($conn);
?>