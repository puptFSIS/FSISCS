<?php
	include('config.php');
	session_start();
	$FCode = $_SESSION['FCode'];
	$EmpID = $_POST['EmpIDSet'];
	$sql="SELECT * FROM tbl_evaluationfaculty WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	$_SESSION['user'] = $row['isAdmin'];
	if($count>=1) {
		header("location:index.php?r=site/SetEmpID&submit_attempt=1");
	} else {
		$sql="UPDATE tbl_evaluationfaculty SET EmpID='$EmpID' WHERE FCode='$FCode'";
		$result=mysqli_query($conn, $sql);
		$_SESSION['CEmpID'] = $EmpID;
		$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpID'";
		$result=mysqli_query($conn, $sql);
		$count=mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		$FullName = $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['nameExtension'];
		$_SESSION['FullName'] = $FullName;
		if(isset($_SESSION['user'])) {
			if($_SESSION['user']==1) {
			header("location:index.php?r=administrator/");
			} else {
			header("location:index.php?r=faculty/");
			}
		} else {
			header("location:index.php?r=site/login");
		}
	}
?>