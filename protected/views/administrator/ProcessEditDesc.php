<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$desc = strtoupper($_POST['desc']);
	$old = strtoupper($_POST['oldDesc']);
	$sql1 = "SELECT * FROM tbl_sodescription";
	$result1 = mysqli_query($conn,$sql1);	
	$count=0;
	while($row=mysqli_fetch_array($result1)){
		if(strtoupper($row['description'])==$desc)
			$count=1;
	}
	if($count>0)	
		header("Location: index.php?r=administrator/EditDesc&msg=Description already exists&msgType=err&desc=$old");
	else if($desc==null)
		header("Location: index.php?r=administrator/EditDesc&msg=Please enter a valid SO Description&msgType=err&desc=$old");
	else{
		$sql="UPDATE tbl_sodescription SET description = '$desc' where description = '$old'";
		$result=mysqli_query($conn,$sql);	
		if($result) {
			header("Location: index.php?r=administrator/SODesc&msg=Record has been added successfully!&msgType=succ");
		}
		mysqli_close();
	}	
?>