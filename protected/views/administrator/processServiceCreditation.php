<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$prof = $_POST['prof'];
	$sonum = $_POST['sonum'];
	$desc = strtoupper($_POST['desc']);
	$month = $_POST['scmonth'];
	$day = $_POST['scday'];
	$year = $_POST['scyear'];
	$hrs = $_POST['hrs'];
	$count = 0;
	$sql1="SELECT soNum FROM tbl_servicecredit";
	$result1=mysqli_query($conn,$sql1);	
	while($row=mysqli_fetch_array($result1)){
		if($row['soNum']==$sonum)
			$count=1;
	}
	if($count>0)
		header("Location: index.php?r=administrator/ServiceCredit&msg=SO Number already exists&msgType=err");
	else if($sonum=="")
		header("Location: index.php?r=administrator/ServiceCredit&msg=Please enter the appropriate So Number&msgType=err");
	else if($hrs=="")
		header("Location: index.php?r=administrator/ServiceCredit&msg=Please enter the credited No of hours&msgType=err");	
	else
	{
		$sql="INSERT INTO tbl_servicecredit VALUES ('$prof','$sonum','$desc','$month','$day','$year','$hrs')";
		$result=mysqli_query($conn,$sql);	
		if($result)
			header("Location: index.php?r=administrator/ServiceCredit&msg=Your service credit has been added successfully!&msgType=succ&hrs=$hrs");
	}
?>