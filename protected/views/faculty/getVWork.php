<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_vwork WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$ctr = 0;
	$orgname = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$orgadd = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$fm = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$fd = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$fy = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$tom = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$td = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$ty = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$hours = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$pos = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");

	while($row = mysqli_fetch_array($result)) {
		if ($row['fromm']=="January") {
			$fm[$ctr]="01";
		} else if ($row['fromm']=="February") {
			$fm[$ctr]="02";
		} else if ($row['fromm']=="March") {
			$fm[$ctr]="03";
		} else if ($row['fromm']=="April") {
			$fm[$ctr]="04";
		} else if ($row['fromm']=="May") {
			$fm[$ctr]="05";
		} else if ($row['fromm']=="June") {
			$fm[$ctr]="06";
		} else if ($row['fromm']=="July") {
			$fm[$ctr]="07";
		} else if ($row['fromm']=="August") {
			$fm[$ctr]="08";
		} else if ($row['fromm']=="September") {
			$fm[$ctr]="09";
		} else if ($row['fromm']=="October") {
			$fm[$ctr]="10";
		} else if ($row['fromm']=="November") {
			$fm[$ctr]="11";
		} else if ($row['fromm']=="December") {
			$fm[$ctr]="12";
		} else {
			$fm[$ctr]="00";
		}
		
		if ($row['tom']=="January") {
			$tom[$ctr]="01";
		} else if ($row['tom']=="February") {
			$tom[$ctr]="02";
		} else if ($row['tom']=="March") {
			$tom[$ctr]="03";
		} else if ($row['tom']=="April") {
			$tom[$ctr]="04";
		} else if ($row['tom']=="May") {
			$tom[$ctr]="05";
		} else if ($row['tom']=="June") {
			$tom[$ctr]="06";
		} else if ($row['tom']=="July") {
			$tom[$ctr]="07";
		} else if ($row['tom']=="August") {
			$tom[$ctr]="08";
		} else if ($row['tom']=="September") {
			$tom[$ctr]="09";
		} else if ($row['tom']=="October") {
			$tom[$ctr]="10";
		} else if ($row['tom']=="November") {
			$tom[$ctr]="11";
		} else if ($row['tom']=="December") {
			$tom[$ctr]="12";
		} else {
			$tom[$ctr]="00";
		}
		$orgname[$ctr] = $row['orgname'];
		$orgadd[$ctr] = $row['orgadd'];
		$fd[$ctr] = $row['fromd'];
		$fy[$ctr] = $row['fromy'];
		$td[$ctr] = $row['tod'];
		$ty[$ctr] = $row['toy'];
		$hours[$ctr] = $row['hours'];
		$pos[$ctr] = $row['pos'];

		$ctr = $ctr + 1;
	}
?>