<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$sy = $_POST['sy'];
	$currID = $_POST['currID'];
	$courseID = $_POST['courseID'];
	$cYear = $_POST['year'];
	$scode = $_POST['scode'];
	$sem = $_POST['sem'];
	// $unit=$_POST['units'];
	$csection =1;
	
	if(isset($_POST['prereq'])){
	$prereq = $_POST['prereq'];
	if($scode==$prereq)
		{
			echo"
			<script>
			window.location.replace('index.php?r=administrator/ViewCurriculum/&courseID=$courseID&year=$cYear&currID=$currID&sy=$sy');
			alert('Subject and Pre-requisite are identical!');
			</script>";
		}
	}
	
	$sql1="SELECT * FROM tbl_subjects WHERE SubjCode = '$scode'";
	$result1=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($result1);
	$stitle=$row['SubjDescription'];
	$lec=$row['HoursLec'];
	$lab=$row['HoursLab'];
	$unit = $row['Units'];
	$sql3 = "SELECT * FROM tbl_subjectload WHERE currID = '$currID' AND courseID = '$courseID' AND scode = '$scode'";
	$result3 = mysqli_query($conn,$sql3);
	while($row3 = mysqli_fetch_array($result3)){
		if($result3){
			echo"
			<script>
			window.location.replace('index.php?r=administrator/ViewCurriculum/&courseID=$courseID&year=$cYear&currID=$currID&sy=$sy');
			alert('Subject Already exists for this curriculum!');
			</script>";
					
		}
	}
include("config.php");
	$sql = "INSERT INTO tbl_subjectload VALUES ('$currID','$courseID','$csection','$cYear','$scode','$stitle','$unit','$sem','$sy','$lec','$lab','$prereq')";
	$sql2 = "INSERT INTO tbl_schedule VALUES ('$currID','$courseID','$csection','$cYear','$scode','$stitle','$unit','$lec','$lab','','','','','','$sem','$sy','','','','')";
	$result = mysqli_query($conn,$sql);
	$resulttwo = mysqli_query($conn,$sql2);
	if($result || $resulttwo) {
		header("Location: index.php?r=administrator/ViewCurriculum/&courseID=$courseID&year=$cYear&currID=$currID&sy=$sy");
	}
	mysqli_close($conn);
?>
