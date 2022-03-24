<?php
include("config.php");
$FinFcode = $_POST['FFCode'];
$FinEmpID = $_POST['FFCode'];
$PrevFcode = $_POST['PFCode'];
$PrevEmpID = $_POST['PFCode'];

$FinStatus = $_POST['nfstatus'];
$PrevStatus = "NF";


$sql="UPDATE tbl_evaluationfaculty 
		SET FCode = '$FinFcode', EmpID = '$FinEmpID'
		WHERE FCode = '$PrevFcode'";
$result=mysqli_query($conn,$sql);	

$sql1="UPDATE tbl_masterlist 
		SET FCode = '$FinFcode'
		WHERE FCode = '$PrevFcode'";
$result1=mysqli_query($conn,$sql1);	

$sql2="UPDATE tbl_personalinformation
		SET FCode = '$FinFcode', EmpID = '$FinEmpID'
		WHERE FCode = '$PrevFcode'";
$result2=mysqli_query($conn,$sql2);	

$sql3="UPDATE tbl_familybackground
		SET EmpID = '$FinEmpID'
		WHERE EmpID = '$PrevEmpID'";
$result3=mysqli_query($conn,$sql3);	

$sql4="UPDATE tbl_faculty 
		SET EmpID = '$FinEmpID'
		WHERE EmpID = '$PrevEmpID '";
$result4=mysqli_query($conn,$sql4);	

$sql5="UPDATE tbl_masterlist 
		SET Status = '$FinStatus'
		WHERE FCode = '$PrevFcode'";
$result5=mysqli_query($conn,$sql5);	

header("location:index.php?r=administrator/NewFaculty&msg=New faculty account has been added.&msgType=suc");
mysqli_close();
?>