<?php 
	include('config.php');
	session_start();
	require_once('PHPMailer-master/src/PHPMailer.php');
	require_once('PHPMailer-master/src/SMTP.php');
	require ('vendor/autoload.php');

	if(isset($_GET['fcode'],$_GET['m'],$_GET['y'],$_GET['mark']))
	{
		$fcode = $_GET['fcode'];
		$m = $_GET['m'];
		$y = $_GET['y'];
		$remarks = $_GET['mark'];

	}
	// echo $remarks;

	$sql2 = "SELECT * FROM tbl_personalinformation WHERE status = 'vip' AND FCode = '$fcode'";
	$result2 = mysqli_query($conn,$sql2);

	$sql = "UPDATE tbl_ipcrstatus SET status='$remarks' WHERE fcode = '$fcode' AND month = '$m' AND year = '$y'";
	$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_array($result2))
		{
			$email = $row['email'];
			
		}
				$mailTo = $email;			
				ob_start();
				if($remarks == "Approved") {
					include ('IPCRemailtemplateApproved.php');	
				} elseif ($remarks == "Pending"){
					include ('IPCRemailtemplatePending.php');
				}
				$body = ob_get_clean();

				$mail = new PHPMailer\PHPMailer\PHPMailer();
 
				//$mail->SMTPDebug = 3;	//Logs 

				$mail->isSMTP(); //Disable or comment this in Live server

				$mail->Host = "smtp.gmail.com";	//Host Server

				$mail->SMTPAuth = true;	//To require username and pass

				$mail->Username="FSISipcr2021@gmail.com";
				$mail->Password="sngcsaxssuoohfiq";

				$mail->SMTPSecure = "tls"; //Either SSL or TLS

				$mail->Port = "587"; //TLS default port

				$mail->From = "FSISipcr2021@gmail.com"; //Where email came from
				$mail->FromName = "PUP Taguig - Head of Academic Program(HAP)"; // Name of Email sender

				$mail->addAddress($mailTo, "Faculty"); //To where you will send the email

				$mail->isHTML(true); //Enable HTML to atelast design the content


				$mail->Subject = "Individual Performance, Commitment and Review (IPCR)"; //Name of Email
				$mail->Body = $body;
				$mail->AltBody = "To view the message, please use an HTML compatible email viewer.";

				if(!$mail->send())
				{
					header('Location: index.php?r=administrator/IPCRview&fcode='.$fcode.'&m='.$m.'&y='.$y.'&err=1');
				} 
				else
				{
					if($remarks == "Approved")
					{
						header('Location: index.php?r=administrator/IPCRview&fcode='.$fcode.'&m='.$m.'&y='.$y.'&c=1');
					// header('Location: ' . $_SERVER['HTTP_REFERER']);
					} elseif ($remarks == "Pending") {
						header('Location: index.php?r=administrator/IPCRview&fcode='.$fcode.'&m='.$m.'&y='.$y.'&d=1');
					}
				}
?> 