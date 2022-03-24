<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$SKH1 = $_POST['skh'];

if($SKH1==null) {
	header("location: index.php?r=faculty/OtherInformation&msg=Please fill up the new skill/hobby field. * Required fields.&msgType=error");
} else {
	$sql="INSERT INTO tbl_skh VALUES ('$EmpID', '$SKH1')";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("location: index.php?r=faculty/OtherInformation&msg=<strong>$SKH1</strong> has been added to your special skills / hobbies.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/OtherInformation&msg=Error saving information.&msgType=error");
	}
}

?>