<?php 
require_once('config.php');
	$int_courseGroup = 24;

	$sql="SELECT * FROM tbl_evaluationfaculty ORDER BY LName AND status";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	if(isset($_POST['acc'])) {
		$acc = $_POST['acc'];
		$input = $_POST['stbox'];
		if($acc=="EmpNo") {
			$sql="SELECT * FROM tbl_evaluationfaculty WHERE EmpID='$input'";
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($conn,$result);
		}
		else if($acc=="fname") {
			$sql="SELECT * FROM tbl_evaluationfaculty WHERE FName like '$input%'";
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
		}
		else if($acc=="sname") {
			$sql="SELECT * FROM tbl_evaluationfaculty WHERE LName like '$input%'";
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
		}
		else {
			$sql="SELECT * FROM tbl_evaluationfaculty WHERE LName LIKE %A%";
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
		}
	}
	$title = "";
	while($row = mysqli_fetch_array($result))
	{
		if($row['status']=="Inactive") {
			$title = "Click to deactivate.";
			$link = "index.php?r=administrator/afa&EmpID=";
		} else {
			$title = "Click to activate.";
			$link = "index.php?r=administrator/dfa&EmpID=";
		}
		$EID = $row['EmpID'];
		if($row['EmpID']==null or $row['EmpID']=="") {
			$EID = "not set";
		}
	
		$Lname = $row['LName'];
		$Fname= $row['FName'];
		$Mname = $row['MName'];
		echo'
		<tr>
		<td style="width: 7%;">' . $row['FCode'] . '</td>
		<td style="width: 4%;">' . $EID . '</td>
		<td style="width: 10%;">' . $Lname . '</td>
		<td style="width: 10%;">' . $Fname . '</td>
		<td style="width: 8%;">' . $Mname . '</td>
		<td style="width: 4%;">' . $row['evalRoles'] . '</td>
		<td style="width: 4%;">' . $row['enu_employmentStat'] . '</td>
		<td style="width: 6%;">' . ucfirst($row['status']) . '</a></td>
		<td style="width: 47%;"><center><a class="btn-s" style="width: 12px; height: 20px;" href=index.php?r=administrator/view&EmpID=' .$EID .'><img src="images/icons/info-white.png"></a> <a class="btn-s" style="width: 12px; height: 20px;" href='.$link , $EID  .'><img src="images/icons/x-white.png"></a> </center> </td>
		
		</tr>';
	}
	//pra sa gitnang icon dati 
	//<a class="btn-s" style="width: 12px; height: 20px;" href=index.php?r=administrator/ufa&empID=' . $row['EmpID'] . '><img src="images/icons/post-white.png"></a> 
	/* 
	<td>' . $row['residentialAddress'] . '</td>
	<td>' . $row['telNo'] . '/' . $row['cellNo']. '</a></td>
	*/
mysqli_close($conn);
?>