<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_nadr WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$ctr = 0;
	$nadr = array("  ","  ","  ","  ","  ");
	while($row = mysqli_fetch_array($result)) {
		$nadr[$ctr] = $row['nadr'];
		$ctr = $ctr + 1;
	}
?>