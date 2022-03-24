<?php
	include("config.php");
	session_start();
	$EmpID = $_SESSION['CEmpID'];
	
	$type = $_GET['type'];
	$rating = $_GET['rating'];
	$fm = $_GET['fm'];
	$fd = $_GET['fd'];
	$fy = $_GET['fy'];
	$tm = $_GET['tm'];
	$td = $_GET['td'];
	$ty = $_GET['ty'];

	
	$sql="DELETE FROM tbl_cse WHERE EmpID='$EmpID' and type='$type' and fromm='$fm' and fromd='$fd' and fromy='$fy' and tom='$tm' and tod='$td' and toy='$ty'";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("Location: index.php?r=faculty/communitySE&msg=<strong>$type</strong> has been removed.&msgType=succ");
	} else {
		header("Location: index.php?r=faculty/Error processing request.&msgType=err");
	}
?>