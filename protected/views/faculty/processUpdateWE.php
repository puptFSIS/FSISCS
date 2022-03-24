<?php
	include("config.php");
	session_start();
	$EmpID = $_SESSION['CEmpID'];
	$d1 = $_POST['e1'];
	$d2 = $_POST['e2'];
	$d3 = $_POST['e3'];
	$d4 = $_POST['e4'];
	$d5 = $_POST['e5'];
	$d6 = $_POST['e6'];
	$d7 = $_POST['e7'];
	$d8 = $_POST['e8'];
	$d9 = $_POST['e9'];
	$d10 = $_POST['e10'];
	$d11= $_POST['e11'];
	
	if(isset($_POST['e12'])) {
		$d12 = $_POST['e12'];
	} else {
		$d12 = "No";
	}
	if(isset($_GET['mode'])) {
		if($_GET['mode']=="1") {
		
		} else {
			$com = $_POST['com'];
			$pos = $_POST['pos'];
			$fm = $_POST['fm'];
			$fd = $_POST['fd'];
			$fy = $_POST['fy'];
			$tm = $_POST['tm'];
			$td = $_POST['td'];
			$ty = $_POST['ty'];
		}
	}
	
	if(isset($_GET['oldpos'])) {
		$oldposition = $_GET['oldpos'];
	}
	
	if(isset($_GET['oldcom'])) {
		$oldcompany = $_GET['oldcom'];
	}
	
	if(isset($_POST['e8'])) {
		$d8 = $_POST['e8'];
	} else {
		$d8 = 'No';
	}
	
	if($d1==null || $d2==null) {
		header("location:index.php?r=faculty/Uwe&msg=Please fill up all the required fields&msgType=err&pos=$pos&fm=$fm&fd=$fd&fy=$fy&tm=$tm&td=$td&ty=$ty&com=$com");
	} else {
	if(isset($_GET['mode'])) {
		$mode = $_GET['mode'];
		if($mode==1) {
			$sql="INSERT INTO tbl_workexperience (fromm, fromd, fromy, tom, tod, toy, positionTitle, company, sgSI, monthlySalary, appStatus, govtService, EmpID) VALUES ('$d3', '$d4', '$d5', '$d6', '$d7', '$d8', '$d2', '$d1', '$d9', '$d10', '$d11', '$d12', '$EmpID')";
			$result=mysqli_query($conn, $sql);	
				if($result) {
					header("Location: index.php?r=faculty/we&msg=Your work experience has been updated successfully!");
				} else {
					echo "mali" . mysqli_error();
				}
		} else {
			$sql="UPDATE tbl_workexperience SET fromm='$d3', fromd='$d4', fromy='$d5', tom='$d6', tod='$d7', toy='$d8', positionTitle='$d2', company='$d1', monthlySalary='$d10', sgSI='$d9', appStatus='$d11', govtService='$d12' WHERE EmpID='$EmpID' and fromm='$fm' and fromd='$fd' and fromy='$fy' and tom='$tm' and tod='$td' and toy='$ty' and company='$com' and positionTitle='$pos'";
			$result=mysqli_query($conn, $sql);
				if($result) {
					header("Location: index.php?r=faculty/we&msg=Your work experience has been updated successfully!");
				} else {
					echo "mali" . mysqli_error();
				}
		}
			
	} else {
		$sql="UPDATE tbl_workexperience SET fromm='$d3', fromd='$d4', fromy='$d5', tom='$d6', tod='$d7', toy='$d8', positionTitle='$d2', company='$d1', monthlySalary='$d9', sgSI='$d10', appStatus='$d11', govtService='$d12' WHERE EmpID='$EmpID' and fromm='$fm' and fromd='$fd' and fromy='$fy' and tom='$tm' and tod='$td' and toy='$ty' and company='$com' and positionTitle='$pos'";
			$result=mysqli_query($conn, $sql);	
				if($result) {
					header("Location: index.php?r=faculty/we&msg=Your work experience has been updated successfully!");
				} else {
					echo "mali" . mysqli_error();
				}
	}
	}
?>