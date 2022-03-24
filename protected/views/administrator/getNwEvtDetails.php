<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$id = $_GET['id'];
	$sql="SELECT * FROM tbl_newseventsfaculty WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$title = $row['title'];
	$content = $row['content'];
	$mark = $row['status'];
?>