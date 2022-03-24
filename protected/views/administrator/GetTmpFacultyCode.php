<?php
	include("config.php");
	$currYear = date('Y');
	$Year = $currYear + 1;
	$newFCode = "a";
	$sql="SELECT * FROM tbl_evaluationfaculty WHERE status='Active' AND yearAdded='$currYear' ORDER BY latestCount DESC LIMIT 1";
	$result=mysqli_query($conn,$sql);
	if($row = mysqli_fetch_array($result)){
		$count = $row['latestCount'] + 1;
		$newFCode = "TMPFA" . getCount($count) . "TG" . $currYear;
	}
	else{
		$count = 1;
		$newFCode = "TMPFA0001" . "TG" .$currYear;
	}
	mysqli_close($conn);
	
	function getCount($c)
	{
		if($c<10)
			$newCount = "000" . $c;
		else if($c<100)
			$newCount = "00" . $c;
		else if($c<1000)
			$newCount = "0" . $c;
		else if($c>=1000)
			$newCount = $c;
		return $newCount;
	}
?>
	