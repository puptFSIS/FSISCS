<?php
	include("config.php");
	session_start();
	$EmpID = $_SESSION['CEmpID'];
	
	$type = $_POST['type'];
	$rating = $_POST['rating'];
	$fm = $_POST['fm'];
	$fd = $_POST['fd'];
	$fy = $_POST['fy'];
	$tm = $_POST['tm'];
	$td = $_POST['td'];
	$ty = $_POST['ty'];
	$pexam = $_POST['pexam'];
	$lno = $_POST['lno'];
	
	$newtype = $_POST['newtype'];
	$newrating = $_POST['newrating'];
	$newfm = $_POST['newfm'];
	$newfd = $_POST['newfd'];
	$newfy = $_POST['newfy'];
	$newtm = $_POST['newtm'];
	$newtd = $_POST['newtd'];
	$newty = $_POST['newty'];
	$newpexam = $_POST['newpexam'];
	$newlno = $_POST['newlno'];
	
	$sql="UPDATE tbl_cse SET type='$newtype', rating='$newrating', fromm='$newfm', fromd='$newfd', fromy='$newfy', tom='$newtm', tod='$newtd', toy='$newty', placeOfExam='$newpexam', licenseNumber='$newlno' WHERE EmpID='$EmpID' and type='$type' and fromm='$fm' and fromd='$fd' and fromy='$fy' and tom='$tm' and tod='$td' and toy='$ty' and placeOfExam='$pexam' and licenseNumber='$lno'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/communitySE&msg=Community service eligibility has been updated");
	} else {
		header("Location: index.php?r=administrator/Error processing request.");
	}
?>