<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_referred";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);



	while($row = mysqli_fetch_array($result)) {
	echo'
	<tr>
	<td>' . $row['Authors'] . '</td>
	<td>' . $row['Title'] . '</td>
	<td>' . $row['Journal'] . '</td>
	<td>' . $row['Editors'] . '</td>
	<td>' . $row['Volume'] . '</td>
	<td>' . $row['Level'] . '</td>
	</tr>'
	;
	}
mysqli_close($conn);
?>
