<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$courseID = $_GET['cID'];
	$cyear = $_GET['yrlvl'];
	$scode = $_GET['scode'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$sec = $_GET['sec'];
	$blank = "";
	$currID = $_GET['currID'];
	$day = $_GET['day'];

	$sql="UPDATE tbl_schedule SET sday='$blank', stimeS='$blank', stimeE='$blank', sroom='$blank', sprof='$blank',sday2 = '',stimeS2 = '', stimeE2 = '', sroom2 = '' where currID = '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
	$result=mysqli_query($conn,$sql);
	header("Location: index.php?r=administrator/DailySched&sem=$sem&sy=$sy&day=$day");
	mysqli_close($conn);

?>
