<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_skh WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$ctr = 0;
	$skh = array("  ","  ","  ","  ","  ");
	while($row = mysqli_fetch_array($result)) {
		$skh[$ctr] = $row['skh'];
		$ctr = $ctr + 1;
	}
?>