<?php
	include('config.php'); 
	session_start();
	require_once('PHPMailer-master/src/PHPMailer.php');
	require_once('PHPMailer-master/src/SMTP.php');
	require ('vendor/autoload.php');

	$m = $_GET['m'];
	$y = $_GET['y'];

	$sql2 = "SELECT * FROM tbl_personalinformation WHERE status = 'vip'";
	$result2 = mysqli_query($conn,$sql2);
	$count = mysqli_num_rows($result2);

	$sql = "SELECT * FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$y'";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
	{
		$available = $row['visible'];
	}
		if($available == "Not Available")
		{
			if(!empty($result2))
			{
				$email = [];
				$counter = 0;
				foreach ($result2 as $row) {
					$email[] = $row['email'];
					$counter++;
				}

				for($i = 0; $i < $count; $i++) //loop to get all the email in the database and store in a array
				{
					$emails = $email[$i];

					//send email
					$mailTo = $emails;			
					ob_start();
					include ('IPCRemailtemplate.php');
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
						header("Location: index.php?r=administrator/IPCRcreate&s=1");
					}
				}
			}
			
			// update db and set ipcr availability to faculty 
			$sql1 = "UPDATE tbl_ipcrvisible SET visible = 'Available' WHERE month = '$m' AND year = '$y'";
			$result1 = mysqli_query($conn,$sql1);

		} else if($available == "Available") {
			header('Location: index.php?r=administrator/IPCRcreate&a=1');
		}

	
?>
