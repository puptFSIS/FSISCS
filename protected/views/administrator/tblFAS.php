<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_personalinformation";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
	echo'
	<td>' . $row['EmpID'] . '</td>'
	;
	}
mysqli_close($conn);
?>