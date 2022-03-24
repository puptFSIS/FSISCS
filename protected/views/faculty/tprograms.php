<?php

	include("config.php");

	$EmpID = $_SESSION['CEmpID'];

	$sql = 
		"SELECT * 

		 FROM tbl_tprograms 

		 WHERE EmpID='$EmpID' 

		 ORDER BY fromy ASC,

		 	FIELD(fromm, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December') ASC,
		 	
		 	FIELD(fromd, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31') ASC";

	$result=mysqli_query($conn, $sql);

	$count=mysqli_num_rows($result);

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

			<td style="word-wrap: break-word; max-width: 105px;"><a href="index.php?r=faculty/tpinfo&tpID=' . $row['ID'] . '">' . $row['title'] . '</a></td>

			<td>' . $m . '/' . $row['fromd'] . '/' . $row['fromy'] . '</td>

			<td>' . $tm . '/' . $row['tod'] . '/' . $row['toy'] . '</td>

			<td style="word-wrap: break-word; max-width: 50px;">' . $row['hours'] . '</td>

			<td style="word-wrap: break-word; max-width: 120px;">' . $row['conby'] . '</td>
			
			<td style="word-wrap: break-word; max-width: 70px;">' . $row['venue'] . '</td>

			</tr>

		';

	} 

?>