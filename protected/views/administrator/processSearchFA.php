<?php
require_once('config.php');

$EmpID = $_POST['EmpID'];
$FullName= "";
if($EmpID==null) {
	header("location:index.php?r=administrator/mfa&msg=Empty Employee ID.&msgType=err");
} else {
	$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);	
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	if($count>=1) {
	$FullName = $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['nameExtension'];
		header("location:index.php?r=administrator/mfa&msg=Faculty account found!&msgType=suc&EmpID=$EmpID&FullName=$FullName");
	} else {
		header("location:index.php?r=administrator/mfa&msg=No match found!&msgType=err");
	}
}
?>