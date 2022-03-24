
<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_personalinformation ORDER BY surname";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);



	while($row = mysqli_fetch_array($result)) {
	echo'
	<tr>
	<td>' . $row['surname'] . '</td>
	<td>' . $row['firstname'] . '</td>
	<td>' . substr($row['middlename'],0,1) . '</td>
	<td>' . $row['telNo'] . ' ; ' . $row['cellNo'] . '</td>
	<td>' . $row['email'] . '</td>
	</tr>'
	;
	}
mysqli_close($conn);
?>