<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$rp1 = $_POST['rp1'];
$rp2 = $_POST['rp2'];
$rp3 = $_POST['rp3'];
$rp4 = $_POST['rp4'];
$rp5 = $_POST['rp5'];
$rp6 = $_POST['rp6'];

$title = $_GET['Title'];
$journal = $_GET['Journal'];
$editors = $_GET['Editors'];
$volume = $_GET['Volume'];
$level = $_GET['Level'];
$authors = $_GET['Authors'];

if($rp1==null || $rp2==null || $rp3==null || $rp4==null || $rp5==null || $rp6==null) {
	header("location:index.php?r=administrator/UpdateRP&msg=Please fill up all the required fields.&msgType=err&title=$title&journal=$journal&editors=$editors&volume=$volume&level=$level&authors=$authors");
} else { 
	$sql="DELETE FROM tbl_referred WHERE EmpID='$EmpID' AND Title='$title' AND Journal='$journal' AND Editors='$editors' AND Volume='$volume' AND Level='$level' AND Authors='$authors'";
	$result=mysqli_query($conn,$sql);	
	$sql="INSERT INTO tbl_referred VALUES ('$rp1', '$rp2', '$rp3', '$rp4', '$rp5', '$rp6', '$EmpID')";
	$result=mysqli_query($conn,$sql);	
	header("location:index.php?r=administrator/refereedPublications&msg=Changes has been saved successfully.&msgType=succ");
}
mysqli_close();
?>