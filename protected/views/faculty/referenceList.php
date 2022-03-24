<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_references WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {	
		echo '
			<tr>
			<td><a href="index.php?r=faculty/refinfo&name=' . $row['name'] . '&address=' . $row['address']. '&telno=' . $row['telno']. '">' . $row['name'] . '</a></td>
			<td>' . $row['address'] . '</td>
			<td>' . $row['telno'] . '</td>
			</tr>
		';
	} 
?>