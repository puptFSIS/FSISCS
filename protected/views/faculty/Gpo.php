<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_org WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		echo '
			<tr>
			<td><a href="index.php?r=faculty/uProOrg&p=' . $row['Pos'] . '&o=' . $row['Organization'] . '&l=' . $row['Level'] . '">' . $row['Pos'] . '</td>
			<td>' . $row['Organization'] . '</td>
			<td>' . $row['Level'] . '</td>
			<td>' . $row['sMonth'] . ' ' . $row['sDay'] . ', ' . $row['sYear'] . '</td>
			</tr>
		';
	} 
?>
