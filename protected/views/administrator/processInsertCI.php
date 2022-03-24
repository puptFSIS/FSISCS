<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");
$noOfChild = $_GET['ChildrenNo'];
$emptyfield = 0;
for($nos = 1;$nos<=$_GET['ChildrenNo'];$nos++) {
	if($_POST['childnameno' . $nos . '']==null) {
		$emptyfield++;
	}
} 
if($emptyfield==1) {
	header("location:index.php?r=administrator/ci&msg=There is $emptyfield unnamed child&no=$noOfChild");
} else if($emptyfield>1)
	header("location:index.php?r=administrator/ci&msg=There is $emptyfield unnamed children&no=$noOfChild");
else {
		for($idx=1;$idx<=$noOfChild;$idx++) {
		$fullname = $_POST['childnameno' . $idx . ''];
		$month = $_POST['monthno' . $idx . ''];
		$day = $_POST['dayno' . $idx . ''];
		$year = $_POST['yearno' . $idx . ''];
		$sql="INSERT INTO tbl_children VALUES ('$fullname', '$month', '$day', '$year', '$EmpID')";
		$result=mysqli_query($conn,$sql);	
		}
		header("location:index.php?r=administrator/fb");
}
mysqli_close($conn);
?>