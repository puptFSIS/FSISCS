<?php
	include ("config.php");
	require ('phpmailer/PHPMailerAutoload.php');

	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$message .= '<br><br><br>Click <a href="http://puptaguig.org/FSISCS">http://puptaguig.org/FSISCS</a> to visit our website.';

	$recipients = array();

	$currMonth = date('n');
	$currYear = date('Y');

	if($currMonth < 6) {
		$currSchoolYear = ($currYear-1).'-'.$currYear;
	} else {
		$currSchoolYear = $currYear.'-'.($currYear+1);
	}

	$sql = 
		"SELECT * FROM tbl_evaltest";

	$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_array($result)) {
		$recipients[$row['email']] = $row['firstname'];
	}

	if(!empty($recipients)) {
		$mail = new PHPMailer;

		$mail->isSMTP();   // Uncomment this line on testing server                                  
		$mail->Host = 'ssl://smtp.googlemail.com';  
		$mail->SMTPAuth = true;                           
		$mail->Username = 'puptfsis2022@gmail.com';                
		$mail->Password = '@PUPTfsis2022';                          
		$mail->SMTPSecure = 'ssl';                            
		$mail->Port = 465;                                

		$mail->setFrom('puptfsis2022@gmail.com', 'PUPT-FSIS');

		foreach ($recipients as $email => $name) {
			$mail->AddAddress($email, $name);     
		}

		$mail->isHTML(true);                                  

		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';

		if(!$mail->send()) {
			echo $mail->ErrorInfo;
		} else {
			header("location: index.php?r=administrator/other&msg=Message has been sent.&msgType=succ");
		}
	} else {
		header("location: index.php?r=administrator/other&msg=Message could not be sent. There are no active faculty and staff listed for the current year.&msgType=error");
	}