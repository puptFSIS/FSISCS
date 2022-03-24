<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$sy = $_GET['sy'];
	$currID = $_GET['currID'];
	$courseID = $_GET['courseID'];
	$scode = $_GET['scode'];
	$cYear = $_GET['year'];
	$currYear = $_GET['currYear'];
	//$sy = $_GET['sy'];

	//echo $sy."  ".$currID."  ".$courseID."  ".$scode."  ".$cYear;
	$sql="DELETE FROM tbl_subjectload WHERE currID='".$currID."' AND courseID='".$courseID."' AND scode='".$scode."' AND schoolYear = '".$sy."' AND currYear='".$currYear."'";
	$sql2="DELETE FROM tbl_schedule WHERE currID='".$currID."' AND courseID='".$courseID."' AND scode='".$scode."' AND schoolYear = '".$sy."'";

	echo $sql."<br>";
	echo $sql2;
	$result=mysqli_query($conn,$sql);	
	$result2=mysqli_query($conn,$sql2);	
	if($result AND $result2) {
		header("Location: index.php?r=administrator/ViewCurriculum/&courseID=$courseID&year=$cYear&currID=$currID&sy=$sy&mes=1&currYear=$currYear");
		mysqli_close($conn);
	}

	
?>