<?php
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$cat = $_POST['cat'];
	$sql2 = "SELECT * FROM tbl_categories WHERE category = '$cat'";
	
	$result2 = mysqli_query($conn,$sql2);
    $count = mysqli_num_rows($result2);
   // echo $count;
    //die();
	if ($count >= 1) 
	{
	        	header("Location: index.php?r=administrator/Categories");
	}
	else
	{
	$sql="INSERT INTO tbl_categories VALUES ('$cat')";
	$result=mysqli_query($conn,$sql);
	header("Location: index.php?r=administrator/Categories");
	}
	mysqli_close($conn);
?>