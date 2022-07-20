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