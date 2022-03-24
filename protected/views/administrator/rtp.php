<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("tprogram.php");

$sql="DELETE FROM tbl_tprograms WHERE ID='$tpID' AND EmpID='$EmpID'";
$result=mysqli_query($conn, $sql);

if(!empty($path)) {
	if (file_exists($path)) {
        unlink($path);
    }
}

if($result) {
	header("location: index.php?r=administrator/TrainingPrograms&msg=<strong>$title</strong> has been removed successfully to your training program&msgType=succ");
} else {
	header("location: index.php?r=administrator/TrainingPrograms&msg=Error removing training program to your profile.&msgType=error");
}

?>