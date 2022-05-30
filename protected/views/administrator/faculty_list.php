<?php 

	// $sql="SELECT DISTINCT sprof FROM tbl_schedule WHERE sem = 2 AND schoolYear = 2021-2022 ";
	$sql ="SELECT * from tbl_schedule Where `sem` = 2";
		$result=mysqli_query($conn,$sql);


 
	foreach($result as $newresult)
	{
		echo '
	 	<tr>
	 		<td>
	 			'.$newresult['schedID'].'
	 		</td>
	 		<td>
	 			'.$newresult['sprof'].'
	 		</td>
	 		<td>
	 			'.$newresult['schedID'].'
	 		</td>
	 	</tr>

	 	';
	}
	
?>