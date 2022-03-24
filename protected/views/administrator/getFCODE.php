<?php
	//session_start();
	$EmpID = $_SESSION['CEmpID'];

	include("config.php");
	$sql="SELECT * FROM tbl_evaluationfaculty WHERE int_courseGroup='24' AND EmpID='' ORDER BY FCode";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)) {
		echo '
			<option value="'. $row['FCode'] .'">'. $row['FCode'] .'</option>
		';
	}
	mysqli_close();
?>