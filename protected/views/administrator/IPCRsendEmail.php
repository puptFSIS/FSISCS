<?php
	//email credential
	//fsisipcr2021@gmail.com - email
	//puptipcr2021 - email pass
	require ('PHPMailer-master/src/PHPMailer.php');
	require ('PHPMailer-master/src/SMTP.php');


	if(isset($_POST['send']))
	{

	$mailTo = $_POST['email'];
	$body = $_POST['message'];

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
		header("location: index.php?r=administrator/IPCRemailnotif&msg=Email has been sent.&msgType=succ");
	}
	
	}	
?>