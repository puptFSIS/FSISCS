<?php
	//session_start();
	$EmpID = $_SESSION['CEmpID'];

	include("config.php");
	$sql="SELECT * FROM tbl_personalinformation ORDER BY EmpID";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)) {
		echo '
			<option value="'. $row['EmpID'] .'">'. $row['EmpID'] .'</option>
		';
	}
	mysqli_close();
?>