<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_scholar WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		echo '
			<tr>
			<td><a href="index.php?r=administrator/uscho&name=' . $row['Name'] . '&school=' . $row['School'] . '">' . $row['Name'] . '</td>
			<td>' . $row['School'] . '</td>
			<td>' . $row['Degree'] . '</td>
			<td>' . $row['Funding'] . '</td>
			<td>' . $row['sMonth'] . ' ' . $row['sDay'] . ', ' . $row['sYear'] . '</td>
			</tr>
		';
	} 
?>
