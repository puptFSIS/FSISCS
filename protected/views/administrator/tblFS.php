<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_scholar";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);



	while($row = mysqli_fetch_array($result)) {
	echo'
	<tr>
	<td>' . $row['EmpID'] . '</td>
	<td>' . $row['Name'] . '</td>
	<td>' . $row['School'] . '</td>
	<td>' . $row['Degree'] . '</td>
	<td>' . $row['Funding'] . '</td>
	<td>' . $row['sMonth'] . ' ' . $row['sDay'] . ', ' . $row['sYear'] . '</td>
	</tr>'
	;
	}
mysqli_close($conn);
?>