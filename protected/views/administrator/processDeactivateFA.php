<?php
	require_once('config.php');
	$EmpID=$_POST['EmpID'];
	$Fcode=$_POST['Fcode'];
	$EmpStat=$_POST['Empstat'];
	
	$sql="UPDATE tbl_evaluationfaculty SET status='Inactive' WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$sql="DELETE FROM tbl_masterlist WHERE FCode='$Fcode';";
	$result2=mysqli_query($conn,$sql);
	if($result && $result2)
	{
		header("location:index.php?r=administrator/successDFA&header=Faculty Account Deactivated&msg=Faculty account has been deactivated successfully. The owner of the account can no longer log in, until activated by administrator.");
	}
?>