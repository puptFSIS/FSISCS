<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$soDesc = strtoupper($_POST['soDesc']);
	$sql1 = "SELECT * FROM tbl_sodescription";
	$result1 = mysqli_query($conn,$sql1);
	$count=0;
	while($row=mysqli_fetch_array($result1)){
		if(strtoupper($row['description'])==$soDesc)
			$count=1;
	}
	if($count>0)	
		header("Location: index.php?r=administrator/AddDesc&msg=Description already exists&msgType=err");
	else if($soDesc==null)
		header("Location: index.php?r=administrator/AddDesc&msg=Please enter the SO Description you want to add&msgType=err");
	else{
		$sql="INSERT INTO tbl_sodescription VALUES ('$soDesc')";
		$result=mysqli_query($conn,$sql);
		if($result) {
			header("Location: index.php?r=administrator/SODesc&msg=Record has been added successfully!&msgType=succ");
		}
		mysqli_close($conn);
	}	
?>