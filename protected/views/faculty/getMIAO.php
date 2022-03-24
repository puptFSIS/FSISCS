<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];

	$sql = "SELECT * FROM tbl_miao WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$ctr = 0;
	$miao = array("  ","  ","  ","  ","  ");
	while($row = mysqli_fetch_array($result)) {
		$miao[$ctr] = $row['miao'];
		$ctr = $ctr + 1;
	}
?>