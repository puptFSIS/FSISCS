<?php 
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	$ID = $_POST['ID'];
	$yr = $_POST['year'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$Num = $_POST['Num'];
	$errMsg = "Cannot save preferred schedule: ";
	$valid = checkPrefSched($yr,$day);
	
	if($valid)
	{
		$sql = "UPDATE tbl_masterlist set Contact = '$Num', BDay = '$day',BMonth = '$month', BYear = '$yr' WHERE ID = '$ID'";
		$result = mysqli_query($conn,$sql);	
		header("Location: index.php?r=administrator/InfoReport&msg=Contact Information has been saved.&msgType=succ");
	}
	else 
	{
		$errMsg = $errMsg . 'Invalid Birth Date!';
		header("Location: index.php?r=administrator/InfoReport&msg=$errMsg &msgType=err");
	}
	
	function checkPrefSched($yr,$day)
	{
		$valid = true;
		if($yr<1900 or $yr>date('Y'))
		{
			$valid=false;
		}
		if($day<1 or $day>31)
		{
			$valid=false;
		}
	return $valid;
	}
	
	mysqli_close();

?>