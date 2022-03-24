<?php
	include("config.php");
	$OldEmpID = $_GET['OldEmpID'];
	$EmpID = $_POST['NEWEmpID'];
	$sname = $_POST['NEWsname'];
	$fname = $_POST['NEWfname'];
	$mname = $_POST['NEWmname'];
	$next = $_POST['NEWnext'];
	$password = SHA1($_POST['NEWpass']);
	$repass = SHA1($_POST['NEWrepass']);
	if($EmpID==null || $sname==null || $fname==null || $mname==null || $password==null || $repass==null) {
		header("location:index.php?r=administrator/ufa&msg=Please fill up all the required fields.&msgType=err&empID=$OldEmpID");
	} else if($password!=$repass) {
		header("location:index.php?r=administrator/ufa&msg=Mismatch password.&msgType=err&empID=$OldEmpID");
	} else {
		$sql="UPDATE tbl_personalinformation SET EmpID='$EmpID', surname='$sname', firstname='$fname', middlename='$mname', nameExtension='$next' WHERE EmpID='$OldEmpID'";
		$result=mysqli_query($conn,$sql);	
		$sql="UPDATE tbl_accounts SET EmpID='$EmpID', password='$password' WHERE EmpID='$OldEmpID'";
		$result=mmysqli_query($conn,$sql);	
		header("location:index.php?r=administrator/ufa&msg=Faculty account has been succesfully modified.&msgType=suc&empID=$OldEmpID");
	}
?>