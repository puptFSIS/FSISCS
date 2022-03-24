<?php
	require_once('config.php');
	$EmpID=$_POST['EmpID'];
	$Fcode=$_POST['Fcode'];
	$EmpStat=$_POST['Empstat'];
	$EvalRoles=$_POST['Evalroles'];

	$sql="UPDATE tbl_evaluationfaculty SET status='Active' WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	

	
	if($EvalRoles=='Professor' && $EmpStat == 'Part-time')
	{
		$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ') As Fullname, Mobile, 'PT' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
		$result2=mysqli_query($conn,$sql);
	}
	else if($EvalRoles=='Professor' && $EmpStat == 'Full-time')
	{
		$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ') As Fullname, Mobile, 'FT' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
		$result2=mysqli_query($conn,$sql);
	}
	else if($EvalRoles=='Professor' && $EmpStat == 'Permanent')
	{
		$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ') As Fullname, Mobile, 'FT' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
		$result2=mysqli_query($conn,$sql);
	}
	else if($EvalRoles=='Professor' && $EmpStat == 'Part-time')
	{
		$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ') As Fullname, Mobile, 'PT' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
		$result2=mysqli_query($conn,$sql);
	}
	else if($EvalRoles=='Staff' && $EmpStat == 'Part-time')
	{
		$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ') As Fullname, Mobile, 'AS' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
		$result2=mysqli_query($conn,$sql);
	}
	else if($EvalRoles=='Staff' && $EmpStat == 'Full-time')
	{
		$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ') As Fullname, Mobile, 'AS' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
		$result2=mysqli_query($conn,$sql);
	}
	else if($EvalRoles=='Security Guard' && $EmpStat == 'Part-time')
	{
		$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ') As Fullname, Mobile, 'SG' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
		$result2=mysqli_query($conn,$sql); 
	}
	else if($EvalRoles=='Security Guard' && $EmpStat == 'Full-time')
	{
		$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ') As Fullname, Mobile, 'SG' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
		$result2=mysqli_query($conn,$sql); 
	}
	else
	{
		
	}
	
	if($result)
	{
		header("location:index.php?r=administrator/successDFA&header=Faculty Account Activated&msg=Faculty account has been activated successfully. The owner of the account can now log in.");  
	}
?> 