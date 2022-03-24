<?php
	include("config.php");
	$result = mysqli_query($conn,"SELECT * FROM tbl_reportcoverage WHERE report='FAS'");
	while ($row = mysqli_fetch_array($result)) {
		$FASfrom = $row['yfrom'];
		$FASto = $row['yto'];
	}
	
	
	$result = mysqli_query($conn,"SELECT * FROM tbl_reportcoverage WHERE report='WE'");
	while($row = mysqli_fetch_array($result)) {
		$WEfrom = $row['yfrom'];
		$WEto = $row['yto'];
	}
	
	$result = mysqli_query($conn,"SELECT * FROM tbl_reportcoverage WHERE report='VW'");
	while ($row = mysqli_fetch_array($result)) {
		$VWfrom = $row['yfrom'];
		$VWto = $row['yto'];
	}
	
?>