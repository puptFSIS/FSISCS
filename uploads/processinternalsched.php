<?php
session_start();
$EmpID = $_SESSION['CEmpID']; 
include("config.php");
$request_id = $_GET['request_id'];
$schedID = $_GET['schedID'];

$sql1 = "SELECT * FROM tbl_requestschedule WHERE request_id= '$request_id' and schedID= '$schedID' and status='Pending'";
$result1 = mysql_query($sql1);
while($row = mysql_fetch_array($result1)) 
{
	$request_id = $row['request_id'];
    $schedID = $row['schedID'];
    $currID = $row['currID'];
    $courseID = $row['courseID'];
    $csection = $row['csection'];
    $cyear = $row['cyear'];
    $scode = $row['scode'];
    $stitle = $row['stitle'];
    $units = $row['units'];
    $lec = $row['lec'];
    $lab = $row['lab'];
    $sday = $row['sday'];
    $stimeS = $row['stimeS'];
    $stimeE = $row['stimeE'];
    $sroom = $row['sroom'];
    $sprof = $row['sprof'];
    $sem = $row['sem'];
    $schoolYear = $row['schoolYear'];
    $day2 = $row['sday2'];
    $timeS2 = $row['stimeS2'];
    $timeE2 = $row['stimeE2'];
    $roomNam2 = $row['sroom2'];
				
                if($result1)
                {

                    $count=mysql_num_rows($result1);
                    if($count>0){
                        $sql="UPDATE tbl_requestschedule SET  status='Approved' , datemodified=NOW() where request_id='$request_id' and schedID = '$schedID'";
                        $sql2="UPDATE tbl_internaschedule SET sday='$sday', stimeS='$stimeS', stimeE='$stimeE', sroom='$sroom',".
                             "sday2 = '$day2', stimeS2 = '$timeS2', stimeE2 = '$timeE2', sroom2 = '$roomName2' ".
                             "WHERE schedID='$schedID'";
					 
                        $result=mysql_query($sql);
                        $result2=mysql_query($sql2);
			
                    }
                    header("Location: index.php?r=administrator/RequestsManagement");
					mysql_close();
				}
				else
                {
                    echo"
			<script>
			window.location.replace('index.php?r=administrator/RequestsManagement');
			alert('Something went wrong');
			</script>";
                    mysql_close();	
                }
}
	

?>
