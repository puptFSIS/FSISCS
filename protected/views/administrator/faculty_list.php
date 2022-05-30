<?php 



if(isset($_GET['sort']))
{
	if($_GET['sort']=="all")
	{
		$sql = "SELECT DISTINCT tbl_evaluationfaculty.`FCode`, tbl_evaluationfaculty.`FName`, tbl_evaluationfaculty.`LName`, tbl_evaluationfaculty.`MName`
		FROM tbl_evaluationfaculty
		INNER JOIN tbl_schedule
		ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
		WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022'";
		 $result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
			
		}
		else
		{
			$status = "all";

		}

	}
	if($_GET['sort']=="passed")
	{
		$sql = "SELECT DISTINCT tbl_evaluationfaculty.`FCode`, tbl_evaluationfaculty.`FName`, tbl_evaluationfaculty.`LName`, tbl_evaluationfaculty.`MName`
		FROM tbl_evaluationfaculty
		INNER JOIN tbl_schedule
		ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
		INNER JOIN tbl_dtr 
		ON tbl_dtr.`FCode` = tbl_schedule.`sprof`
		WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022'";
		 $result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
			
		}
		else
		{
			$status = "passed";

		}

	}

	if($_GET['sort']=="notyet")
	{
		$sql = "SELECT DISTINCT tbl_evaluationfaculty.`FCode`, tbl_evaluationfaculty.`FName`, tbl_evaluationfaculty.`LName`, tbl_evaluationfaculty.`MName`
			FROM tbl_evaluationfaculty
			INNER JOIN tbl_schedule
			ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
			INNER JOIN tbl_dtr
			ON tbl_schedule.`sprof` = tbl_dtr.`FCode`
			WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022' and tbl_dtr.`FCode`  != tbl_evaluationfaculty.`FCode`;";
		 $result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
			
		}
		else
		{
			$status = "notyet";

		}

	}
}






else
{
	$sql = "SELECT DISTINCT tbl_evaluationfaculty.`FCode`, tbl_evaluationfaculty.`FName`, tbl_evaluationfaculty.`LName`, tbl_evaluationfaculty.`MName`
		FROM tbl_evaluationfaculty
		INNER JOIN tbl_schedule
		ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
		WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022'";
		 $result=mysqli_query($conn,$sql);
		 $status = "all";
}


//backup
// SELECT DISTINCT tbl_evaluationfaculty.FCode, tbl_evaluationfaculty.FName, tbl_evaluationfaculty.LName, tbl_evaluationfaculty.MName
// FROM tbl_evaluationfaculty
// INNER JOIN tbl_schedule
// ON tbl_evaluationfaculty.FCode = tbl_schedule.sprof
// LEFT JOIN tbl_dtr
// ON tbl_schedule.sprof = tbl_dtr.FCode
// WHERE tbl_schedule.sem = 2 and tbl_schedule.schoolYear = '2021-2022';

	

if($status == "empty")
{
	echo'
		 no records found
		
	';
	
}
else if($status == "all")
{

	foreach($result as $newresult)
	{
		echo '
	 	<tr>
	 		<td>
	 			'.$newresult['FCode'].'
	 		</td>
	 		<td>
	 			'.$newresult['FName'].' '.$newresult['MName'].' '.$newresult['LName'].'
	 		</td>
	 		<td>
	 			'.$newresult['FCode'].'
	 		</td>
	 	</tr>

	 	';

	}
	echo "<h3 style='border: 2px solid black; background-color: orange; text-align: center; color: black'; class='status_tab_apr'>All Members with Schedule</h3>";
}
else if($status == "passed")
{
	
	foreach($result as $newresult)
	{
		echo '
	 	<tr>
	 		<td>
	 			'.$newresult['FCode'].'
	 		</td>
	 		<td>
	 			'.$newresult['FName'].' '.$newresult['MName'].' '.$newresult['LName'].'
	 		</td>
	 		<td>
	 			'.$newresult['FCode'].'
	 		</td>
	 	</tr>

	 	';

	}
	echo "<h3 style='border: 2px solid black; background-color: orange; text-align: center; color: black'; class='status_tab_apr'>All Members with Schedule</h3>";
}

 
else if($status == "notyet")
{
	
	foreach($result as $newresult)
	{
		echo '
	 	<tr>
	 		<td>
	 			'.$newresult['FCode'].'
	 		</td>
	 		<td>
	 			'.$newresult['FName'].' '.$newresult['MName'].' '.$newresult['LName'].'
	 		</td>
	 		<td>
	 			'.$newresult['FCode'].'
	 		</td>
	 	</tr>

	 	';

	}
	echo "<h3 style='border: 2px solid black; background-color: orange; text-align: center; color: black'; class='status_tab_apr'>All Members with Schedule</h3>";
}
	
?>