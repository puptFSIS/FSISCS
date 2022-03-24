<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 

	include("config.php");


	/*require 'scripts/phpmailer/PHPMailerAutoload.php';
$email = '';
$password = '';
$to_id = '';
$message = 'Your request for internal changes has been declined!';
$subject = "Request Schedule";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->msgHTML($message);
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else {
echo '<p id="para">Message sent!</p>';
}
*/
?>
<?php


	$request_id = $_GET['request_id'];
	$schedID = $_GET['schedID'];

	$sql1 = "SELECT * FROM tbl_requestschedule WHERE request_id= '$request_id' and schedID= '$schedID' and status='Pending'";
	$result1 = mysqli_query($conn,$sql1);	
while($row = mysqli_fetch_array($result1)) 
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
					$reason = $row['reason'];
					$schoolYear = $row['schoolYear'];
				
	if($result1)
	{

		$count=mysqli_num_rows($result1);
			if($count>0){
				$sql="UPDATE tbl_requestschedule SET  status='Rejected' , datemodified=NOW(), reason='Declined by the administrator' where request_id='$request_id' and schedID = '$schedID'";
					# sday2 = '$day2', stimeS2 = '$timeS2', stimeE2 = '$timeE2', sroom2 = '$roomName2'
				$result=mysqli_query($conn,$sql);	
		
			
			}
				header("Location: index.php?r=administrator/RequestsManagement&mes=1");
					mysqli_close($conn);
				}
				else
		{
		echo"
			<script>
			window.location.replace('index.php?r=administrator/RequestsManagement');
			alert('Something went wrong');
			</script>";
			mysqli_close($conn);	
		}
	}
	

?>
