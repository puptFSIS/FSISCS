<?php
	session_start();
	include_once ("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$prof = $_GET['prof'];
	$sonum = $_GET['sonum'];
	$sql="DELETE FROM tbl_servicecredit where FCode = '$prof' AND soNum = '$sonum'";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("Location: index.php?r=administrator/ServiceCredit&msg=Service has been removed successfully.&msgType=succ");
	} else {
		header("Location: index.php?r=administrator");
	}
	mysqli_close($conn);
?>