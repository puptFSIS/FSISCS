<?php
	session_start();
	$EmpID = $_SESSION['CEmpID'];
	include("config.php");
	
	$title = $_POST['ann1'];
	$content = $_POST['ann2'];
	$mark = $_POST['ann3'];
	$id = $_GET['id'];
	$sql="UPDATE tbl_newseventsfaculty SET title='$title', content='$content', status='$mark' WHERE id='$id'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/newsandevents");
	}
	mysqli_close();
?>