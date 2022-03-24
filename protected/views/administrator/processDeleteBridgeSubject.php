<?php
	session_start();

	$EmpID = $_SESSION['CEmpID'];

	include("config.php");

    // Get the stupid BridgeSubjectID
    $BridgeSubjectID = $_GET['BridgeSubjectID'];

	$sql="DELETE FROM tbl_bridge_subject WHERE BridgeSubjectID =".$BridgeSubjectID;
    // do the query
	$result=mysqli_query($conn,$sql);	

	if($result) {
		header("Location: index.php?r=administrator/BridgeSchedulingPage");
	}

	mysqli_close($conn);
?>
