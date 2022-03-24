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
	$PTFCode = $_POST['PTFCode'];
	$Position = $_POST['Position'];

	$sql = "SELECT * from tbl_evaluationfaculty where FCode = '$PTFCode'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$Name = $row['LName'] .', '. $row['FName'] . ' ' . substr($row['MName'],0,1);
	if($row['MName']<>"")
	{
		$Name = $row['LName'] .', '. $row['FName'] . ' ' . substr($row['MName'],0,1) . '.';
	}

	$sql = "SELECT * from tbl_personalinformation where FCode = '$PTFCode'";
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

	$sql="INSERT INTO tbl_masterlist (FCode,FName,Bday,BMonth,BYear,Contact,Position,Status,sem,schoolYear) VALUES ('$PTFCode','$Name','$bday','$bmonth','$byear','$contact','$Position','PT','$sem','$sy')";
	$result1=mysqli_query($conn,$sql);
	$sql="UPDATE tbl_evaluationfaculty SET status='Active' WHERE FCode='$PTFCode'";
	$result2=mysqli_query($conn,$sql);

	if($result1 && $result2) {
		header("Location: index.php?r=administrator/PartTime&sy=$sy&msg=Part Time Faculty has been added.&msgType=succ");
	}
	mysqli_close();
?>