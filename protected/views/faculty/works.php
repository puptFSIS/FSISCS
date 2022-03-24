<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_workexperience WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);
	//$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
	if($row['fromm']=="January")
			$m = "01";
		else if($row['fromm']=="February")
			$m = "02";
		else if($row['fromm']=="March")
			$m = "03";
		else if($row['fromm']=="April")
			$m = "04";
		else if($row['fromm']=="May")
			$m = "05";
		else if($row['fromm']=="June")
			$m = "06";
		else if($row['fromm']=="July")
			$m = "07";
		else if($row['fromm']=="August")
			$m = "08";
		else if($row['fromm']=="September")
			$m = "09";
		else if($row['fromm']=="October")
			$m = "10";
		else if($row['fromm']=="November")
			$m = "11";
		else if($row['fromm']=="December")
			$m = "12";
		else
			$m = "00";
			
		if($row['tom']=="January")
			$tm = "01";
		else if($row['tom']=="February")
			$tm = "02";
		else if($row['tom']=="March")
			$tm = "03";
		else if($row['tom']=="April")
			$tm = "04";
		else if($row['tom']=="May")
			$tm = "05";
		else if($row['tom']=="June")
			$tm = "06";
		else if($row['tom']=="July")
			$tm = "07";
		else if($row['tom']=="August")
			$tm = "08";
		else if($row['tom']=="September")
			$tm = "09";
		else if($row['tom']=="October")
			$tm = "10";
		else if($row['tom']=="November")
			$tm = "11";
		else if($row['tom']=="December")
			$tm = "12";
		else
			$tm = "00";
			
		echo '
			<tr>
			<td>' . $m . '/' . $row['fromd'] . '/' . $row['fromy'] . '-'  . $tm . '/' . $row['tod'] . '/' . $row['toy'] . '</td>
			<td><a href="index.php?r=faculty/UpdateWE&pos=' . $row['positionTitle'] . '&fm=' . $row['fromm'] . '&fd=' . $row['fromd'] . '&fy=' . $row['fromy'] . '&tm=' . $row['tom'] . '&td=' . $row['tod'] . '&ty=' . $row['toy'] . '&com=' . $row['company'] . '">' . $row['positionTitle'] . '</a></td>
			<td>' . $row['company'] . '</td>
			<td>' . 'P' . $row['monthlySalary'] . '</td>
			<td>' . $row['sgSI'] . '</td>
			<td>' . $row['appStatus'] . '</td>
			<td>' . $row['govtService'] . '</td>
			</tr>
		';
	} 
?>