<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$prof = $_POST['prof'];
	$sonum = $_POST['sonum'];
	$desc = $_POST['description'];
	$month = $_POST['scmonth'];
	$day = $_POST['scday'];
	$year = $_POST['scyear'];
	$hrs = $_POST['hrs'];
	$oldSO = $_POST['oldSO'];
	//$result="";
	if($hrs==null)
		header("Location: index.php?r=administrator/UpdateServiceCredit&msg=Please enter the total number of credit hours&msgType=err&sonum=$sonum&desc=$desc
		&month=$month&day=$day&year=$year&hrs=&prof=$prof");
	else if($sonum==null)
		header("Location: index.php?r=administrator/UpdateServiceCredit&msg=Cannot leave the SO number blank&msgType=err&sonum=$sonum&desc=$desc
		&month=$month&day=$day&year=$year&hrs=$hrs&prof=$prof");
	else{ 
		if($sonum==$oldSO)
			$sql="UPDATE tbl_servicecredit SET SOdesc = '$desc', month = '$month', day = '$day', year = '$year', hrs = '$hrs' WHERE FCode = '$prof' AND soNum = '$sonum'";
		else
			$sql="UPDATE tbl_servicecredit SET soNum = '$sonum', SOdesc = '$desc', month = '$month', day = '$day', year = '$year', hrs = '$hrs' WHERE FCode = '$prof' AND soNum = '$oldSO'";
		$result=mysqli_query($conn,$sql);	
		if($result)
			header("Location: index.php?r=administrator/ServiceCredit&msg=Your service credit has been updated successfully!&msgType=succ&oldSO=$oldSO");
		else
			header("Location: index.php?r=administrator/ServiceCredit&msg=Error saving your service credit.&msgType=err");
	}
?>