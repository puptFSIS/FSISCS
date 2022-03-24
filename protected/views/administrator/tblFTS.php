<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_fts";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
	echo'
	<tr>
	<td>' . getFullName($row['EmpID']) . '</td>
	<td>' . $row['subject'] . '</td>
	<td>' . $row['lec'] . '</td>
	<td>' . $row['lab'] . '</td>
	<td>' . $row['unit'] . '</td>
	<td>' . $row['sy'] . '</td>
	<td>' . $row['sem'] . '</td>
	</tr>'
	;
	}
mysqli_close($conn);
?>
<?php
	function getFullName($empid) {
		$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$empid'";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['surname'] . ' ' . $row['nameExtension'];
		return $fullname;
	}
?>