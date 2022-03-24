<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$currID = $_POST['currID'];
	$courseID = $_POST['courseID'];
	$cYear = $_POST['cYear']; 
	$sy = $_POST['sy'];

	$sql1="SELECT * FROM tbl_curriculumref WHERE courseID = '$courseID' AND cyear = '$cYear' AND schoolYear = '$sy'";
	$result1=mysqli_query($conn,$sql1);	
	if($row=mysqli_fetch_array($result1))
	{
		$sql="UPDATE tbl_curriculumref SET currID = '$currID' WHERE courseID = '$courseID' AND cyear = '$cYear' AND schoolYear = '$sy'";
		$res=mysqli_query($conn,$sql);	
		if($res) {
			header("Location: index.php?r=administrator/ViewCurriculum&courseID=$courseID&sy=$sy&year=$cYear&currID=$currID");
		} 
	} else
	{
		$sql="INSERT INTO tbl_curriculumref VALUES ('$courseID','$cYear','$currID','$sy')";
		$res=mysqli_query($conn,$sql);	
		if($res) {
			header("Location: index.php?r=administrator/ViewCurriculum&courseID=$courseID&sy=$sy&year=$cYear&currID=$currID");
	}
		
	mysqli_close();
	}
?>
