<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_referred WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		echo '
			<tr>
			<td><a href="index.php?r=faculty/UpdateRP&title=' . $row['Title'] . '&journal='. $row['Journal'] . '&editors=' . $row['Editors'] . '&volume=' . $row['Volume'] . '&level=' . $row['Level'] . '&authors=' . $row['Authors'] . '">' . $row['Title'] . '</td>
			<td>' . $row['Journal'] . '</td>
			<td>' . $row['Editors'] . '</td>
			<td>' . $row['Volume'] . '</td>
			<td>' . $row['Level'] . '</td>
			<td>' . $row['Authors'] . '</td>
			</tr>
		';
	} 
?>
