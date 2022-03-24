<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_children WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);

	while($row = mysqli_fetch_array($result)) {
		echo '
		<tr>
		<td><a href="index.php?r=administrator/childInfo&fullname=' . $row['fullname'] . '&month=' . $row['month'] . '&day=' . $row['day'] . '&year=' . $row['year'] . '">' . $row['fullname'] . '</a></td>
		<td>' . $row['month'] . ' ' . $row['day'] . ', ' . $row['year'] . '</td>
		<td><a href="index.php?r=administrator/crch&fname=' . $row['fullname'] . '&bmonth=' . $row['month'] . '&bday=' . $row['day'] . '&byear=' . $row['year'] . '">Remove</a></td>
		</tr> ';
		}
?>