<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_cse WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		echo '
			<tr>
			<td><a href="index.php?r=faculty/updateCSE&type=' . $row['type'] . '&rating=' . $row['rating'] . '&fm=' . $row['fromm'] . '&fd=' . $row['fromd'] . '&fy=' . $row['fromy'] . '&pexam=' . $row['placeOfExam'] . '&lno=' . $row['licenseNumber'] . '&tm=' . $row['tom'] . '&td=' . $row['tod'] . '&ty=' . $row['toy'] . '">' . $row['type'] . '</a></td>
			<td>' . $row['rating'] . '</td>
			<td>' . $row['fromm'] . ' ' . $row['fromd'] . ', ' . $row['fromy'] . '</td>
			<td>' . $row['placeOfExam'] . '</td>
			<td>' . $row['licenseNumber'] . '</td>
			<td>' . $row['tom'] . ' ' . $row['tod'] . ',' . $row['toy'] . '</td>
			</tr>
		';
	} 
?>
