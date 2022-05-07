<?php 
	session_start();
	include("config.php");
	

	$today = date("y.m.d");
	$accomp = $_GET['accomp'];
	$fcode = $_GET['fcode'];
	$id = $_GET['id'];
	$sql = "UPDATE tbl_proof SET deleted_at ='$today' WHERE id = '$id'";
	$result = mysqli_query($conn,$sql);
	if($result) {
		header('location: index.php?r=faculty/IPCRaddproof&accomp='.$accomp.'&id='.$id.'&fcode='.$fcode.'');
	}
	mysqli_close($conn);
?>