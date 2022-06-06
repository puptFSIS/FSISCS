<?php
	include('config.php'); 
	session_start();
	require_once('PHPMailer-master/src/PHPMailer.php');
	require_once('PHPMailer-master/src/SMTP.php');
	require ('vendor/autoload.php');

	$m = $_GET['m'];
	$y = $_GET['y'];
	
	// echo $m;
	// echo $y;
	$sql = "SELECT tbl_evaluationfaculty.LName,tbl_evaluationfaculty.FName,tbl_evaluationfaculty.MName,tbl_evaluationfaculty.Email,tbl_ipcrstatus.* FROM tbl_evaluationfaculty LEFT JOIN tbl_ipcrstatus ON tbl_ipcrstatus.fcode = tbl_evaluationfaculty.FCode WHERE tbl_evaluationfaculty.Status = 'Active' AND tbl_ipcrstatus.year = '$y' AND tbl_ipcrstatus.month = '$m' AND tbl_ipcrstatus.status IS NULL ORDER BY tbl_evaluationfaculty.LName ASC";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
		   // echo $count;
		   // die;
				if($count > 0)
				{
					$email = [];
					$counter = 0;
					foreach ($result as $row) {
						$email[] = $row['Email'];
						$counter++;
					}

					for($i = 0; $i < $count; $i++) //loop to get all the email in the database and store in a array
					{
						$emails = $email[$i];

						//send email
						$mailTo = $emails;			
						ob_start();
						include ('IPCRemailtemplateunsubmit.php');
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
							header("location: index.php?r=administrator/IPCRemailnotif&msg=Email could not be sent.&msgType=err");
						} 
						else
						{
							header('Location: index.php?r=administrator/IPCRlist&m='.$m.'&y='.$y.'&mess=1');
						}
					}
				} elseif($count == 0)
				{
					header('Location: index.php?r=administrator/IPCRlist&m='.$m.'&y='.$y.'&mess=2');
				}
?>
