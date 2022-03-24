<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_qa WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);	
	$count=mysqli_num_rows($result);
	$a36a = $_POST['36a'];
	$a36b = $_POST['36b'];
	$a37a = $_POST['37a'];
	$a37b = $_POST['37b'];
	$a38 = $_POST['38'];
	$a39 = $_POST['39'];
	$a40 = $_POST['40'];
	$a41a = $_POST['41a'];
	$a41b = $_POST['41b'];
	$a41c = $_POST['41c'];
	
	$a36ayes = $_POST['36ayes'];
	$a36byes = $_POST['36byes'];
	$a37ayes = $_POST['37ayes'];
	$a37byes = $_POST['37byes'];
	$a38yes = $_POST['38yes'];
	$a39yes = $_POST['39yes'];
	$a40yes = $_POST['40yes'];
	$a41ayes = $_POST['41ayes'];
	$a41byes = $_POST['41byes'];
	$a41cyes = $_POST['41cyes'];
	
	$q = array('36a','36b','37a','37b','38','39','40','41a','41b','41c');
	$a = array($a36a, $a36ayes, $a36b, $a36byes, $a37a, $a37ayes, $a37b, $a37byes, $a38, $a38yes, $a39, $a39yes, $a40, $a40yes, $a41a, $a41ayes, $a41b, $a41byes, $a41c, $a41cyes);
	
	if($count<=0) {
		// Insert
		$ctr = 0;
		$actr = 0;
		$cctr = 0;
		for($ctr=0;$ctr!=10;$ctr++) {
			$cctr = $actr + 1;
			$sqlIns = "INSERT INTO tbl_qa VALUES('$EmpID','$q[$ctr]','$a[$actr]','$a[$cctr]')";
			$sqlInsRes = mysqli_query($conn,$sqlIns);
			$actr = $actr + 2;
		}
		if($sqlInsRes) {
			header("location: index.php?r=administrator/Questions&msg=Your answers have been saved&msgType=succ");
		} else {
			echo 'mali';
		}
	} else {
		// Update
		$ctr = 0;
		$actr = 0;
		for($ctr=0;$ctr<=9;$ctr++) {
			$cctr = $actr + 1;
			$sqlIns = "UPDATE tbl_qa Set qNo='$q[$ctr]', answer='$a[$actr]',spec='$a[$cctr]' WHERE EmpID = '$EmpID' AND qNo='$q[$ctr]'";
			$sqlInsRes = mysqli_query($conn, $sqlIns);
			$actr = $actr + 2;
		}
		if($sqlInsRes) {
			header("location: index.php?r=administrator/Questions&msg=Your answers have been saved&msgType=succ");
		} else {
			echo 'mali';
		}
	}
?>