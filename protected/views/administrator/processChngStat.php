<?php
include("config.php");
$FCode = $_POST['FCode'];

$newstatus = $_POST['Fstatus'];

$sql="UPDATE tbl_masterlist 
		SET Status = '$newstatus'
		WHERE FCode = '$FCode'";
$result=mysqli_query($conn,$sql);

header("location:index.php?r=administrator/Faculty&msg=New faculty account has been added.&msgType=suc");
mysqli_close();
?>