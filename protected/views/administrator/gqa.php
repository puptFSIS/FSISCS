<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_qa WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row =  mysqli_fetch_array($result);
	$q = array('36a','36b','37a','37b','38','39','40','41a','41b','41c');
	$a = array('','','','','','','','','','');
	$yes = array('','','','','','','','','','');
	if($count<=0) {
		// declaration
		$a = array('','','','','','','','','','');
		$yes = array('','','','','','','','','','');
	} else {
		// initialization
		$ctr = 0;
		for($ctr=0;$ctr<=9;$ctr++) {
			$sqlIns = "SELECT * FROM tbl_qa WHERE EmpID='$EmpID' AND qNo='$q[$ctr]'";
			$sqlInsRes = mysqli_query($conn,$sqlIns);
			$row =  mysqli_fetch_array($sqlInsRes);
			$a[$ctr] = $row['answer'];
			if(strtoupper($a[$ctr])=="YES") {
				$yes[$ctr] = $row['spec'];
			} else {
				$yes[$ctr] = " ";
			}
		}
	}
?>