<?php 
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	$ID = $_GET['ID'];
	$err = 1;

	$sql = "DELETE  FROM tbl_masterlist WHERE ID = '$ID'";
	$result = mysqli_query($conn,$sql);	
	if($result)
	{
		$err = 0;
	}
	
	if($err==1){
		header("Location: index.php?r=administrator/checklist&msg=$errMsg &msgType=err");
	} else {
		header("Location: index.php?r=administrator/checklist&msg=Faculty was removed from the checklist.&msgType=succ");
	}
	
	mysqli_close();

?>