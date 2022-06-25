<?php
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$currMonth = date('n');
	if(in_array($currMonth, array(4, 5))) {
		$sem = 3;
	} else if(in_array($currMonth, array(11, 12, 1, 2, 3))) {
		$sem = 2;	
	} else {
		$sem = 1;
	}
	$sy = $_POST['sy'];
	$FCode = $_POST['name'];
	$Position = $_POST['Position'];

	$sql = "SELECT * from tbl_evaluationfaculty where FCode = '$FCode'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$Name = $row['LName'] .', '. $row['FName'] . ' ' . substr($row['MName'],0,1);
	if($row['MName']<>"")
	{
		$Name = $row['LName'] .', '. $row['FName'] . ' ' . substr($row['MName'],0,1) . '.';
	}

	$sql = "SELECT * from tbl_personalinformation where FCode = '$FCode'";
	$result = mysqli_query($conn,$sql);
	$bday = $bmonth = $byear = $contact = '';
	if(!empty($result)) {
		$row = mysqli_fetch_array($result);
		$bday = $row['bday'];
		if(is_numeric($row['bmonth'])) {
			$bmonth = $row['bmonth'];
		} else {
			$month = date_parse($row['bmonth']);
			$bmonth = $month['month'];
		}
		$byear = $row['byear'];
		$telNo = $row['telNo'];
		$cellNo = $row['cellNo'];
		$contact = $telNo;
		$contact .= !empty($telNo) ? ' / ' : '';
		$contact .= $cellNo;
	}

	// in case that my process is correct
	// $sql = 'UPDATE tbl_evaluationfaculty SET Regular_Load = 9, PartTime_Load = 0 WHERE FCode = '.$FCode.'';
	// $result = mysqli_query($conn,$sql);
	
	$sql="INSERT INTO tbl_masterlist (FCode,FName,Bday,BMonth,BYear,Contact,Position,Status) VALUES ('$FCode','$Name','$bday','$bmonth','$byear','$contact','$Position','BO')";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("Location: index.php?r=administrator/BranchOfficials&mes=0");
	}
	mysqli_close($conn);
?>