<?php
	include("config.php");
	$tpID = $_GET['tpID'];
	$sql = "SELECT * FROM tbl_tprograms WHERE ID='$tpID'";
	$result=mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		$tpID  = $row['ID'];
		$EmpID = $row['EmpID'];
		$title = $row['title'];
		$type  = $row['type'];
		$fromm = $row['fromm'];
		$fromd = $row['fromd'];
		$fromy = $row['fromy'];
		$tom   = $row['tom'];
		$tod   = $row['tod'];
		$toy   = $row['toy']; 
		$hours = $row['hours']; 
		$conby = $row['conby'];
		$level = $row['level'];
		$venue = $row['venue']; 
		$path  = $row['path'];
	}
?>