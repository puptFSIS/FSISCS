<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_gov";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);



	while($row = mysqli_fetch_array($result)) {
	echo'
	<td>' . $row['EmpID'] . '</td>
	<td>' . $row['Exam'] . '</td>
	<td>' . $row['YearTaken'] . '</td>
	<td>' . $row['Place'] . '</td>
	<td>' . $row['Rating'] . '</td>'
	;
	}
mysqli_close($conn);
?>