<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_educationalbackground WHERE level='Graduate'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	/*<td>' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['nameExtension'] . '</td>*/
	while($row = mysqli_fetch_array($result)) {
	echo'
	<tr>
	<td>' . $row['schoolName'] . '</td>
	<td>' . $row['degreeCourse'] . '</td>
	<td>' . $row['yearGraduated'] . '</td>
	<td>' . $row['highestLevel'] . '</td>
	<td>' . $row['incDateFrom'] . '-' . $row['incDateTo'] . '</td>
	<td>' . $row['honorsReceived'] . '</td>
	</tr>';
	}
mysqli_close($conn);
?>