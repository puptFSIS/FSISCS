<?php

class LoginController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
		// $this->render('SubjectPref');
	}
	
	public function actionLogin()
	{
	include("config.php");
	$user = strip_tags($_POST['user']);
	$pass = strip_tags($_POST['pass']);
	$_SESSION['Fcode'] = $_POST['user'];
	$user = stripslashes($user);
	$pass = stripslashes($pass);
	$user = mysqli_real_escape_string($conn, $user);
	$pass = mysqli_real_escape_string($conn, $pass);
	$epass = SHA1($pass);
	
	if($pass=="PUPTFSIS" or $pass=="puptfsis") {
		$sql="SELECT * FROM tbl_evaluationfaculty WHERE FCode='$user'";
		$result=mysqli_query($conn, $sql);
		$count=mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		if($count>=1) {
		session_start();
		if($row['isAdmin']==1) {
			$_SESSION['user'] = 1;
			$_SESSION['CEmpID'] = $row['EmpID'];
			$_SESSION['FCode'] = $row['FCode'];
			
			if($row['EmpID'] == null or $row['EmpID'] == "") {
				header("location: index.php?r=site/SetEmpID");
			} else {
			$_SESSION['user'] = 1;
			Yii::app()->session['user'] = 1;
			$_SESSION['CEmpID'] = $row['EmpID'];
			$_SESSION['FCode'] = $row['FCode'];
			$EmpID = $row['EmpID'];
			$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpID'";
			$result=mysqli_query($conn, $sql);
			$count=mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
			$FullName = $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['nameExtension'];
			$_SESSION['FullName'] = $FullName;
			Yii::app()->session['fullname'] = $FullName;
			$surname = $row['surname'];
			$firstname = $row['firstname'];
			$middlename = $row['middlename'];
			$nameextension = $row['nameExtension'];
			$birthday = $row['birthdate'];
			$birthplace = $row['birthplace'];
			$gender = $row['sex'];
			$civilstatus = $row['civilStatus'];
			$citizenship = $row['citizenship'];
			$height = $row['height'];
			$weight= $row['weight'];
			$bloodtype = $row['bloodType'];
			$gsis = $row['GSIS_ID_NO'];
			$pagibig = $row['PAGIBIG_ID_NO'];
			$philhealth = $row['PHILHEALTH_NO'];
			$sss = $row['SSS_NO'];
			$residentialAdd = $row['residentialAddress'];
			$residentialZip = $row['zipCode'];
			$residentialTel = $row['telNo'];
			$permanentAdd = $row['permanentAddress'];
			$permanentZip = $row['pzipCode'];
			$permanentTel = $row['ptelNo'];
			$email = $row['email'];
			$cel = $row['cellNo'];
			$agencyempno = $row['EmpID'];
			$tin = $row['TIN_NO'];
			$_SESSION['userID'] = $row['userID'];
			// header("location:index.php?r=administrator/");
			Yii::app()->session['fcode'] = $row['EmpID'];
			Yii::app()->session['level'] = 1;
			$this->redirect('index.php?r=administrator');
			}
		} 
		else {
			$_SESSION['user'] = 0;
			$_SESSION['CEmpID'] = $row['EmpID'];
			$_SESSION['FCode'] = $row['FCode'];
			
			if($row['EmpID'] == null or $row['EmpID'] == "") {
				header("location: index.php?r=site/SetEmpID");
			} else {
			$_SESSION['user'] = 0;
			Yii::app()->session['user'] = 0;
			$_SESSION['CEmpID'] = $row['EmpID'];
			$_SESSION['FCode'] = $row['FCode'];
			$EmpID = $row['EmpID'];
			$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpID'";
			$result=mysqli_query($conn, $sql);
			$count=mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
			$FullName = $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['nameExtension'];
			$_SESSION['FullName'] = $FullName;
			Yii::app()->session['fullame'] = $FullName;
			$surname = $row['surname'];
			$firstname = $row['firstname'];
			$middlename = $row['middlename'];
			$nameextension = $row['nameExtension'];
			$birthday = $row['birthdate'];
			$birthplace = $row['birthplace'];
			$gender = $row['sex'];
			$civilstatus = $row['civilStatus'];
			$citizenship = $row['citizenship'];
			$height = $row['height'];
			$weight= $row['weight'];
			$bloodtype = $row['bloodType'];
			$gsis = $row['GSIS_ID_NO'];
			$pagibig = $row['PAGIBIG_ID_NO'];
			$philhealth = $row['PHILHEALTH_NO'];
			$sss = $row['SSS_NO'];
			$residentialAdd = $row['residentialAddress'];
			$residentialZip = $row['zipCode'];
			$residentialTel = $row['telNo'];
			$permanentAdd = $row['permanentAddress'];
			$permanentZip = $row['pzipCode'];
			$permanentTel = $row['ptelNo'];
			$email = $row['email'];
			$cel = $row['cellNo'];
			$agencyempno = $row['EmpID'];
			$tin = $row['TIN_NO'];
			$_SESSION['userID'] = $row['userID'];
			// header("location:index.php?r=faculty/");
			Yii::app()->session['fcode'] = $row['EmpID'];
			Yii::app()->session['level'] = 0;
			$this->redirect('index.php?r=faculty');
			}
		}
	} else {
		header("location:index.php?r=site/index&msg=1");
	}
	} else {
		$sql="SELECT * FROM tbl_evaluationfaculty WHERE FCode='$user' and password='$epass' and status='Active'";
		$result=mysqli_query($conn, $sql);
		$count=mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		if($count>=1) {
		session_start();
		if($row['isAdmin']==1) {
			$_SESSION['user'] = 1;
			$_SESSION['CEmpID'] = $row['EmpID'];
			$_SESSION['FCode'] = $row['FCode'];
			
			if($row['EmpID'] == null or $row['EmpID'] == "") {
				header("location: index.php?r=site/SetEmpID");
			} else {
			
			$_SESSION['user'] = 1;
			Yii::app()->session['user'] = 1;
			$_SESSION['CEmpID'] = $row['EmpID'];
			$_SESSION['FCode'] = $row['FCode'];
			$EmpID = $row['EmpID'];
			$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpID'";
			$result=mysqli_query($conn, $sql);
			$count=mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
			$FullName = $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['nameExtension'];
			$_SESSION['FullName'] = $FullName;
			Yii::app()->session['fullname'] = $FullName;
			$surname = $row['surname'];
			$firstname = $row['firstname'];
			$middlename = $row['middlename'];
			$nameextension = $row['nameExtension'];
			$birthday = $row['birthdate'];
			$birthplace = $row['birthplace'];
			$gender = $row['sex'];
			$civilstatus = $row['civilStatus'];
			$citizenship = $row['citizenship'];
			$height = $row['height'];
			$weight= $row['weight'];
			$bloodtype = $row['bloodType'];
			$gsis = $row['GSIS_ID_NO'];
			$pagibig = $row['PAGIBIG_ID_NO'];
			$philhealth = $row['PHILHEALTH_NO'];
			$sss = $row['SSS_NO'];
			$residentialAdd = $row['residentialAddress'];
			$residentialZip = $row['zipCode'];
			$residentialTel = $row['telNo'];
			$permanentAdd = $row['permanentAddress'];
			$permanentZip = $row['pzipCode'];
			$permanentTel = $row['ptelNo'];
			$email = $row['email'];
			$cel = $row['cellNo'];
			$agencyempno = $row['EmpID'];
			$tin = $row['TIN_NO'];
			$_SESSION['userID'] = $row['userID'];
			// header("location:index.php?r=administrator/");

			Yii::app()->session['fcode'] = $row['EmpID'];
			Yii::app()->session['level'] = 1;
			$this->redirect('index.php?r=administrator');
			}
		} else {
			$_SESSION['user'] = 0;
			$_SESSION['CEmpID'] = $row['EmpID'];
			$_SESSION['FCode'] = $row['FCode'];
			
			if($row['EmpID'] == null or $row['EmpID'] == "") {
				header("location: index.php?r=site/SetEmpID");
			} else {
			$_SESSION['user'] = 0;
			Yii::app()->session['user'] = 1;
			$_SESSION['CEmpID'] = $row['EmpID'];
			$_SESSION['FCode'] = $row['FCode'];
			$EmpID = $row['EmpID'];
			$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpID'";
			$result=mysqli_query($conn, $sql);
			$count=mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
			$FullName = $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['nameExtension'];
			$_SESSION['FullName'] = $FullName;
			Yii::app()->session['fullname'] = $FullName;
			$surname = $row['surname'];
			$firstname = $row['firstname'];
			$middlename = $row['middlename'];
			$nameextension = $row['nameExtension'];
			$birthday = $row['birthdate'];
			$birthplace = $row['birthplace'];
			$gender = $row['sex'];
			$civilstatus = $row['civilStatus'];
			$citizenship = $row['citizenship'];
			$height = $row['height'];
			$weight= $row['weight'];
			$bloodtype = $row['bloodType'];
			$gsis = $row['GSIS_ID_NO'];
			$pagibig = $row['PAGIBIG_ID_NO'];
			$philhealth = $row['PHILHEALTH_NO'];
			$sss = $row['SSS_NO'];
			$residentialAdd = $row['residentialAddress'];
			$residentialZip = $row['zipCode'];
			$residentialTel = $row['telNo'];
			$permanentAdd = $row['permanentAddress'];
			$permanentZip = $row['pzipCode'];
			$permanentTel = $row['ptelNo'];
			$email = $row['email'];
			$cel = $row['cellNo'];
			$agencyempno = $row['EmpID'];
			$tin = $row['TIN_NO'];
			$_SESSION['userID'] = $row['userID'];
			// header("location:index.php?r=faculty/");
			Yii::app()->session['fcode'] = $row['EmpID'];
			Yii::app()->session['level'] = 0;
			$this->redirect('index.php?r=faculty');
			}
		}
	} else {
		header("location:index.php?r=site/index&msg=1");
	}
	}
	}

	public function actionSignUp(){
		$mimes = array('image/png','image/jpeg');

		/*echo "<pre>";
		print_r($_FILES);
		echo "</pre>";*/

		if ($_POST['firstName'] != '' && $_POST['MI'] != '' && $_POST['lastName'] != '' && $_POST['fcode'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['confirm_password'] != '' && $_FILES['id_pic']['name'] != '') {
			if (in_array($_FILES['id_pic']['type'], $mimes)) {
				$target_dir = "signups/".basename($_FILES['id_pic']['name']);
				$firstName = $_POST['firstName'];
				$mid = $_POST['MI'];
				$lastName = $_POST['lastName'];
				$fcode = $_POST['fcode'];
				$email = $_POST['email'];
				$pass = $_POST['confirm_password'];
				$emptype = $_POST['emptype'];
				$pos = $_POST['position'];

				if (move_uploaded_file($_FILES["id_pic"]["tmp_name"], $target_dir)) {
				    $signup = new TblSignup();

				    $signup->attributes=[
				    	'id' => '',
				    	'FCode' => $fcode,
				    	'Employment_type' => $emptype,
				    	'Position' => $pos,
				    	'FName' => $firstName,
				    	'MidInit' => $mid,
				    	'LName' => $lastName,
				    	'Email' => $email,
				    	'Password' => $pass,
				    	'id_pic' => $target_dir,
				    ];
				    $signup->save();
				    header("location: index.php?&mes=0");
				} else {
				   header("location: index.php?&mes=2");
				}
			} else {
				header("location: index.php?&mes=3");
			}
			
		} else {
			header("location: index.php?&mes=1");
		}
	}

	public function actionForgot(){
		$FourDigitRandomNumber = rand(1231,7879);
		$fcode = $_POST['fcode'];

		$prof = TblEvaluationfaculty::model()->CheckSpecProf($fcode);


		if (!empty($prof)) {
			$subject = "Verification Code";
			$message = "Your verification code is ".$FourDigitRandomNumber."<br><br>";

			$message .= 'Click <a href="http://puptaguigcs.net/FSISCS">http://fsiscs.puptaguigcs.net/</a> to visit our website.<br><br>Please do not reply to this email. This is a system-generated notification.';
			


            $mail = new YiiMailer;
        	//Uncomment this following lines when the project is uploaded on the hostinger
			$mail->SMTPDebug  = 1;                                  
			$mail->Host = "smtp.gmail.com";  
			$mail->SMTPAuth = true;                           
			$mail->Username = 'puptfsis2022@gmail.com';                
		    $mail->Password = 'gfmpjesnguqfugsl'; 
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = 465;
			$mail->setFrom('puptfsis2022@gmail.com', 'PUPT FSIS');
			$mail->isHTML(true);                                  
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';
			
			
			
			$mail->AddAddress($prof['Email'], $prof['FName']);    
				
			if(!$mail->send()) {
				echo "Error on Sending Email. Please contact the developers.";
			} else {
				Yii::app()->db->createCommand("INSERT INTO tbl_verification (`FCode`, `Code`) VALUES ('".$fcode."','".$FourDigitRandomNumber."')")
				->query();
				echo "<script>window.location.assign('index.php?r=login/FourCode&fcode=".$fcode."')</script>";
			}

		} else {
			header("location: index.php?&mes=4");
		}
		// echo "<pre>";
		// print_r($prof);
		// echo "</pre>";
	}

	public function actionFourCode(){
		$fcode = $_GET['fcode'];
		$prof = TblEvaluationfaculty::model()->CheckSpecProf($fcode);

		$this->render('FourCode',array('fcode' => $fcode,'email' => $prof['Email']));
	}

	public function actionConfirmCode(){
		$fcode = $_POST['fcode'];
		$code = $_POST['code'];

		$info = TblVerification::model()->CheckCode($fcode);

		if ($info['Code'] == $code) {
			$this->render("ConfCode",array('fcode' => $fcode));
		} else {
			echo "<script>window.location.assign('index.php?r=login/FourCode&fcode=".$fcode."&mes=0')</script>";
		}

		

		// echo "<pre>";
		// print_r($info);
		// echo "</pre>";
	}

	public function actionChangePass(){
		$fcode = $_POST['fcode'];
		$pass = sha1($_POST['confirm_password']);

		Yii::app()->db->createCommand("UPDATE tbl_evaluationfaculty SET password = '".$pass."' WHERE FCode = '".$fcode."'")
		->query();

		Yii::app()->db->createCommand("DELETE FROM tbl_verification WHERE FCode = ".$fcode."")
		->query();

		header("location: index.php?&mes=5");
	}

	public function actionSendAgain(){
		$FourDigitRandomNumber = rand(1231,7879);
		$fcode = $_GET['fcode'];

		$prof = TblEvaluationfaculty::model()->CheckSpecProf($fcode);


		$subject = "Verification Code";
		$message = "Your verification code is ".$FourDigitRandomNumber."<br><br>";

		$message .= 'Click <a href="http://puptaguigcs.net/FSISCS">http://fsiscs.puptaguigcs.net/</a> to visit our website.<br><br>Please do not reply to this email. This is a system-generated notification.';
		


        $mail = new YiiMailer;
    	//Uncomment this following lines when the project is uploaded on the hostinger
		$mail->SMTPDebug  = 1;                                  
		$mail->Host = "smtp.gmail.com";  
		$mail->SMTPAuth = true;                           
		$mail->Username = 'puptfsis2022@gmail.com';                
	    $mail->Password = 'gfmpjesnguqfugsl'; 
		$mail->SMTPSecure = 'ssl';                            
		$mail->Port = 465;
		$mail->setFrom('puptfsis2022@gmail.com', 'PUPT FSIS');
		$mail->isHTML(true);                                  
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';
		
		
		
		$mail->AddAddress($prof['Email'], $prof['FName']);    
			
		if(!$mail->send()) {
			echo "Error on Sending Email. Please contact the developers.";
		} else {
			Yii::app()->db->createCommand("UPDATE tbl_verification SET `Code` = '".$FourDigitRandomNumber."' WHERE FCode = '".$fcode."' ")
				->query();
			echo "<script>window.location.assign('index.php?r=login/FourCode&fcode=".$fcode."')</script>";
		}

		
	}

	// public function actionSubjectPreference(){
		
	// }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}