<?php
	include("config.php");
	session_start();
	$EmpID = $_SESSION['CEmpID'];
	$s1 = $_POST['s1'];
	$s2 = $_POST['s2'];
	$s3 = $_POST['s3'];
	$s4 = $_POST['s4'];
	$s5 = $_POST['s5'];
	$s6 = $_POST['s6'];
	$s7 = $_POST['s7'];
	$s8 = $_POST['s8'];
	$s9 = $_POST['s9'];
	$s10 = $_POST['s10'];
	$s12 = $_POST['s12'];
	$s13 = $_POST['s13'];
	$s14 = $_POST['s14'];
	$sql="UPDATE tbl_familybackground SET spouseSurname = '$s1', spouseFirstname='$s2', spouseMiddlename='$s3', spouseOccupation='$s4', spouseEmployerName='$s5', spouseBusinessAddress='$s6', spouseBusinessTelNo='$s7', spouseFSurname='$s8', spouseFFirstname='$s9', spouseFMiddlename='$s10', spouseMFirstname='$s13', spouseMSurname='$s12', spouseMMiddlename='$s14' WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);	
	if($result) {
		header("Location: index.php?r=faculty/fb&msg=Your family background has been updated successfully!");
	} else {
		echo "mali" . mysqli_error();
	}
	
?>