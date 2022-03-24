<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$ccode = $_GET['SubjCode'];
	$ctitle = $_GET['SubTits'];
	$sql="DELETE FROM tbl_subjects WHERE SubjCode = '$ccode' AND SubjDescription ='$ctitle'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/SubjectManagement");
	}
	mysqli_close($conn);
?>
