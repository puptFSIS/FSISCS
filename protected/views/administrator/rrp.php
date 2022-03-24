<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$title = $_GET['Title'];
$journal = $_GET['Journal'];
$editors = $_GET['Editors'];
$volume = $_GET['Volume'];
$level = $_GET['Level'];
$authors = $_GET['Authors'];

	$sql="DELETE FROM tbl_referred WHERE EmpID='$EmpID' AND Title='$title' AND Journal='$journal' AND Editors='$editors' AND Volume='$volume' AND Level='$level' AND Authors='$authors'";
	$result=mysqli_query($conn, $sql);

	header("location:index.php?r=administrator/refereedPublications&msg=$title by $authors has been removed from your refereed publications.&msgType=succ");
mysqli_close($conn);
?>