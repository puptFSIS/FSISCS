<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_org";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);

	while($row = mysqli_fetch_array($result)) {
	echo'
	<tr>
	<td>' . $row['EmpID'] . '</td>
	<td>' . $row['Pos'] . '</td>
	<td>' . $row['Organization'] . '</td>
	<td>' . $row['Level'] . '</td>
	<td>' . $row['sMonth'] . ' ' . $row['sDay'] . ', ' . $row['sYear'] . '</td>
	</tr>'
	;
	}
mysqli_close($conn);
?>