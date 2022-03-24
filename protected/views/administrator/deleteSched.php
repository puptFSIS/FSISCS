

<?php
	//session_start();
	//$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$courseID = $_GET['courseID'];
	$sec = $_GET['sec'];
	$cyear = $_GET['cyear'];
	$scode = $_GET['scode'];
	$sem = $_GET['sem'];
	$title = $_GET['title'];
	$units = $_GET['units'];
	$lec = $_GET['lec'];
	$lab =$_GET['lab'];
	$currID = $_GET['CurrID'];
	$sy = $_GET['sy'];
	$profName = $_GET['prof'];
	$schedID = $_GET['schedID'];
	$sql1 = "SELECT * FROM tbl_schedule WHERE schedID = ".$schedID."";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($result1);

	$load_type = $row1['load_type'];

	$count1=mysqli_num_rows($result1);
	if($count1>0){
		$sql="DELETE FROM tbl_schedule where schedID = ".$schedID."";
		$result=mysqli_query($conn,$sql);

		$sqlfac = "SELECT * FROM tbl_facultycurrentload WHERE FCode = '".$profName."' and schoolYear = '".$sy."' and sem = ".$sem."";
		$resultfac = mysqli_query($conn,$sqlfac);
		$row = mysqli_fetch_array($resultfac);
			if($load_type == 0){
				$load = $row['PartTime_Load'];
				$total = $load - $units;
				$sqlup = "UPDATE tbl_facultycurrentload SET PartTime_Load = ".$total." WHERE FCode = '".$profName."' and schoolYear = '".$sy."' and sem = ".$sem."";
				mysqli_query($conn,$sqlup);
			} else if($load_type == 2){
				$load = $row['TeachingSub_Load'];
				$total = $load - $units;
				$sqlup = "UPDATE tbl_facultycurrentload SET TeachingSub_Load = ".$total." WHERE FCode = '".$profName."' and schoolYear = '".$sy."' and sem = ".$sem."";
				mysqli_query($conn, $sqlup);
			} else {
				$regular = $row['Regular_Load'];
				$total = $regular - $units;
				$sqlup = "UPDATE tbl_facultycurrentload SET Regular_Load = ".$total." WHERE FCode = '".$profName."' and schoolYear = '".$sy."' and sem = ".$sem."";
				mysqli_query($conn,$sqlup);
				
			}
		// echo "<script>alert('Schedule deleted successfully')</script>";
		header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=3");
		mysqli_close($conn);
	}
	else
	{
		header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=3");
		mysqli_close($conn);
	}
	/*
	$sql="UPDATE tbl_schedule SET sday='', stime='', sroom='',sprof='' WHERE courseID = '$courseID' AND csection = '$sec' AND cyear = '$cyear' AND scode = '$scode'";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("Location: index.php?r=administrator/SchedulingPage&courseID=$courseID");
	}*/
?>

