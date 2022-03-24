<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_workexperience WHERE EmpID='$EmpID' ORDER by toy DESC";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$ctr = 0;
	$title = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$company = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$fm = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$fd = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$fy = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$tom = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$td = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$ty = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$msalary = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$sgsi = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$apstat = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$govtsvce = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");

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
		$title[$ctr] = $row['positionTitle'];
		$company[$ctr] = $row['company'];
		$fd[$ctr] = $row['fromd'];
		$fy[$ctr] = $row['fromy'];
		$td[$ctr] = $row['tod'];
		$ty[$ctr] = $row['toy'];
		$msalary[$ctr] = $row['monthlySalary'];
		$sgsi[$ctr] = $row['sgSI'];
		$apstat[$ctr] = $row['appStatus'];
		$govtsvce[$ctr] = strtoupper($row['govtService']);
		$ctr = $ctr + 1;
	}
?>