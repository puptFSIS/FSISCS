<?php
	//fsisipcr2021@gmail.com - email
	// puptipcr2021 - email pass
	require ('PHPMailer-master/src/PHPMailer.php');
	require ('PHPMailer-master/src/SMTP.php');
	include ('config.php');

	$sql = "SELECT DISTINCT tbl_evaluationfaculty.`Email`
		FROM tbl_evaluationfaculty
		INNER JOIN tbl_schedule
		ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
		LEFT JOIN tbl_dtr 
		ON tbl_dtr.`FCode` = tbl_schedule.`sprof`
		WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022' and tbl_dtr.`FCode` IS NULL;";
		 $result=mysqli_query($conn,$sql);
		 $count = mysqli_num_rows($result); 
		 // echo $count;
	if(!empty($result))
	{	
		$new_var = [];
		$counter = 0;
		foreach($result as $newresult)
		{
			$new_var[] = $newresult['Email'];

			$counter++;
			


		}
		for ($i=0; $i <$count ; $i++) { 
			$email=$new_var[$i];
			$mailTo = $email;
			ob_start();
			include ('dtr_email_template.php');
			$body = ob_get_clean();
			// $body = $_POST['message'];


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


			$mail->Subject = "DAILY TIME RECORD"; //Name of Email
			$mail->Body = $body;
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer.";
			
			if(!$mail->send())
			{
				header("location: index.php?r=administrator/ListOfFac&msg=Email could not be sent.&msgType=err");
			} 
			else
			{
				header("location: index.php?r=administrator/ListOfFac&msg=Email has been sent.&msgType=succ");
			}
		}
	}
?>