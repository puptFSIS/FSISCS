<?php 
require_once('config.php');

	$sql="SELECT * FROM tbl_cse";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);



	while($row = mysqli_fetch_array($result)) {
	echo'
	<td>' . $row['EmpID'] . '</td>
	<td>' . $row['Program'] . '</td>
	<td>' . $row['Beneficiaries'] . '</td>
	<td>' . $row['NoBeneficiaries'] . '</td>
	<td>' . $row['Duration'] . '</td>
	<td>' . $row['Hours'] . '</td>'
	;
	}
mysqli_close($conn);
?>