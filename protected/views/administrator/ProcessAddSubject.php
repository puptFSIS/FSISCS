<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	if ($_POST['scode'] != "" && $_POST['stitle'] != "") {
		$ccode = $_POST['scode'];
		$ctitle = $_POST['stitle'];
		$lec = $_POST['lec'];
		$lab = $_POST['lab'];
		$units = $_POST['units'];
		$currYear = $_POST['currYear'];
		$cat = $_POST['cat'];

		$sql = "SELECT * FROM tbl_subjects WHERE SubjCode = '$ccode' AND currYear = ".$currYear."";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		if ($count > 0) 
		{
		header("Location: index.php?r=administrator/SubjectManagement&mes=0");
		}
		else
		{	
			$sql="INSERT INTO tbl_subjects (SubjCode,SubjDescription,Units,HoursLec,HoursLab,Category,currYear) VALUES ('$ccode','$ctitle','$units','$lec','$lab','$cat','$currYear')";
			// echo $sql;	
			$result=mysqli_query($conn,$sql);
			header("Location: index.php?r=administrator/SubjectManagement&mes=1");
		}

		mysqli_close($conn);
	} else {
		header("Location: index.php?r=administrator/SubjectManagement&mes=3");
	}
	
?>