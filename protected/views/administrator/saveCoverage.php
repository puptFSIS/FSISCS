<?php
	include("config.php");
	session_start();
	
	//$report = $_POST['reportCat'];
	//if($report=="FAS") {
		$from = $_POST['fromFAS'];
		$to = $_POST['toFAS'];
		$fromMonth = $_POST['fromMonth'];
		$toMonth = $_POST['toMonth'];
		
		$_SESSION['fmonth'] = $fromMonth;
		$_SESSION['tmonth'] = $toMonth;
		/*
		if($result) {
			header("location: index.php?r=administrator/reports&msg=Report coverage has been updated.&msgType=succ");
		} else {
			header("location: index.php?r=administrator/reports&msg=Failed to update report coverage for Faculty Attended Seminar.&msgType=err");
		}
	} else if($report=="WE") {
		$from = $_POST['fromWE'];
		$to = $_POST['toWE'];*/
		
		/*if($result) {
			header("location: index.php?r=administrator/reports&msg=Report coverage has been updated.&msgType=succ");
		} else {
			header("location: index.php?r=administrator/reports&msg=Failed to update report coverage for Work Experience.&msgType=err");
		}
	} else if($report=="VW") {
		$from = $_POST['fromVW'];
		$to = $_POST['toVW'];*/
	
		if($from > $to or ($fromMonth > $toMonth and $from >= $to))
		{
			header("location: index.php?r=administrator/reports&msg=Failed to update report coverage. Please put a valid month/year timespan&msgType=err");
		}
		else{
			$result = mysqli_query($conn,"UPDATE tbl_reportcoverage SET yfrom='$from', yto='$to', fromMonth='$fromMonth', toMonth='$toMonth'");
			$result2 = mysqli_query($conn,"UPDATE tbl_reportcoverage SET yfrom='$from', yto='$to', fromMonth='$fromMonth', toMonth='$toMonth'");
			$result3 = mysqli_query($conn,"UPDATE tbl_reportcoverage SET yfrom='$from', yto='$to', fromMonth='$fromMonth', toMonth='$toMonth'");
			if($result and $result2 and $result3) 
			{
				header("location: index.php?r=administrator/reports&msg=Report coverage has been updated&msgType=succ");
			} else {
				header("location: index.php?r=administrator/reports&msg=Failed to update report coverage for Voluntary Work.&msgType=err");
			}
		} 
	//}
?>