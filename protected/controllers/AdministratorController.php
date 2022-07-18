<?php

class AdministratorController extends Controller
{
	private function CheckEmpID($empID){

		$fcode = Yii::app()->session['fcode'];
		$fullName = Yii::app()->session['fullname'];

		if($fcode != $empID){
			$_SESSION['CEmpID'] = $fcode;
			// $_SESSION['FullName'] = $fullName;
		}

		if($fullName != $_SESSION['FullName']){
			$_SESSION['FullName'] = $fullName;
		}
	}

	public function actionIndex()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('index');
	}
	public function actionLogout()
	{	session_start();
		unset(Yii::app()->session['userid']);
		$this->render('logout');
		
	}
	public function actionProfile()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('profile');
	}
	public function actionAccount()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('account');
	}
	public function actionSubject()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('subject');
	}
	public function actionOther()
	{
		session_start();
		$proflist = TblEvaluationfaculty::model()->GetFcode();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('other', array('fcode' => $proflist));
	}
	public function actionFaculty()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('faculty');
	}
	public function actionReports()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('reports');
	}
	public function actionForms()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('forms');
	}
	public function actionMaintenance()
	{
		$this->render('maintenance');
	}
	public function actionPi()
	{
		$this->render('pi');
	}
	public function actionFb()
	{
		$this->render('fb');
	}public function actionEb()
	{
		$this->render('eb');
	}
	public function actionWe()
	{
		$this->render('we');
	}
	public function actionUPi()
	{
		$this->render('Upi');
	}
	public function actionAFb()
	{
		$this->render('afb');
	}public function actionUEb()
	{
		$this->render('Ueb');
	}
	public function actionUWe()
	{
		$this->render('Uwe');
	}
	public function actionProcessUpdatePI()
	{
		$this->render('processUpdatePI');
	}
	public function actionProcessUpdateFB()
	{
		$this->render('processUpdateFB');
	}
	public function actionProcessUpdateEB()
	{
		$this->render('processUpdateEB');
	}
	public function actionProcessUpdateWE()
	{
		$this->render('processUpdateWE');
	}
	public function actionNfa()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('nfa');
	}
	public function actionMfa()
	{
		$this->render('mfa');
	}
	public function actionDfa()
	{
		$this->render('dfa');
	}
	public function actionSfa()
	{
		$this->render('sfa');
	}
	public function actionLfa()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$FacultyList = TblEvaluationfaculty::model()->GetAllProf();
		$this->render('lfa',array('FacultyList'=>$FacultyList));
	}
	public function actionProcessInsertFA()
	{
		$sql = "SELECT * FROM tbl_facultyunits";
		$ta = Yii::app()->db->createCommand($sql)
		->queryRow();

		$reg = $ta['RegUnits'];
		$part = $ta['PartTimeUnits'];
		$ts = $ta['TempSubUnits'];
		$fd = $ta['FacultyDesignee'];

		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		$this->render('processInsertFA',array('reg' => $reg, 'part' => $part, 'ts' => $ts, 'fd' => $fd));
	}
	public function actionProcessUpdateFA()
	{
		$this->render('processUpdateFA');
	}
	public function actionProcessSearchFA()
	{
		$this->render('processSearchFA');
	}
	public function actionProcessSFA()
	{
		$this->render('processSFA');
	}
	public function actionProcessDeactivateFA()
	{
		$this->render('processDeactivateFA');
	}
	public function actionUfa()
	{
		$this->render('ufa');
	}
	public function actionSdfa()
	{
		$this->render('sdfa');
	}
	public function actionDeactivateFM()
	{
		$this->render('deactivateFM');
	}
	public function actionSuccessDFA()
	{
		$this->render('successDFA');
	}
	public function actionFAS()
	{
		$this->render('fas');
	}
	public function actionFASQ()
	{
		$this->render('fasq');
	}
	public function actionFEGS()
	{
		$this->render('fegs');
	}
	public function actionFOMPO()
	{
		$this->render('fompo');
	}
	public function actionFS()
	{
		$this->render('fs');
	}
	public function actionFRP()
	{
		$this->render('frp');
	}
	public function actionFTS()
	{
		$this->render('fts');
	}
	public function actionGEP()
	{
		$this->render('gep');
	}
	public function actionCSE()
	{
		$this->render('cse');
	}
	public function actionSa()
	{
		$this->render('sa');
	}
	public function actionUsa()
	{
		$this->render('usa');
	}
	public function actionProcessInsertSA()
	{
		$this->render('processInsertSA');
	}
	public function actionAc()
	{
		$this->render('ac');
	}
	public function actionCi()
	{
		$this->render('ci');
	}
	public function actionProcessInsertCI()
	{
		$this->render('processInsertCI');
	}
	public function actionAebl()
	{
		$this->render('aebl');
	}
	public function actionAnnouncements()
	{
		$this->render('Announcements');
	}
	public function actionNewsandevents()
	{
		$this->render('newsandevents');
	}
	public function actionEvents()
	{
		$this->render('Events');
	}
	public function actionMessages()
	{
		$this->render('messages');
	}
	public function actionProcessInsertEBL()
	{
		$this->render('processInsertEBL');
	}
	public function actionUebl()
	{
		$this->render('uebl');
	}
	public function actionCreb()
	{
		$this->render('creb');
	}
	public function actionReb()
	{
		$this->render('reb');
	}
	public function actionProOrg()
	{
		$this->render('proOrg');
	}
	public function actionFci()
	{
		$this->render('fci');
	}
	public function actionScholarships()
	{
		$this->render('scholarships');
	}
	public function actionRefereedPublications()
	{
		$this->render('refereedPublications');
	}
	public function actionCommunitySE()
	{
		$this->render('communitySE');
	}
	public function actionAccSettings()
	{
		$this->render('AccSettings');
	}
	public function actionCrch()
	{
		$this->render('crch');
	}
	public function actionCrcl()
	{
		$this->render('crcl');
	}
	public function actionCas()
	{
		$this->render('cas');
	}
	public function actionProcessUpdateAccSettings()
	{
		$this->render('processUpdateAccSettings');
	}
	public function actionAwe()
	{
		$this->render('awe');
	}
	public function actionCrwe()
	{
		$this->render('crwe');
	}
	public function actionRwe()
	{
		$this->render('rwe');
	}
	public function actionGedl()
	{
		$this->render('gedl');
	}
	public function actionView()
	{
		$facInfo = TblPersonalinformation::model()->GetFacultyInfo($_GET['EmpID']);
		$employmentStats = array('Full-time', 'Part-time','Temporary');
		$rolesSelect = array('Administrator','Faculty Designee','HAP','HAP Secretary','Professor','Staff','System');
		// $roles2 = array('Administrator','HAP','HAP Secretary','Professor','Staff','System');
		$status = Yii::app()->db->createCommand('SELECT enu_employmentStat, evalRoles FROM tbl_evaluationfaculty WHERE FCode = :fcode')
		->bindValue(':fcode',$_GET['FCode'])
		->queryRow();
		$stats = $status['enu_employmentStat'];
		$roles = $status['evalRoles'];
		// echo "<pre>";
		// print_r($facInfo);
		// echo "</pre>";

		$this->render('view',array('row' => $facInfo, 'EmploymentStats' => $employmentStats, 'stats' => $stats, 'roles' => $roles, 'rolesSelect' => $rolesSelect));
	}

	public function actionEditFacultyInfo(){
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";


		$employ = $_POST['Employment'];
		$fcode = $_POST['FCode'];
		$empID = $_POST['EmpID'];
		$id = $_POST['ID'];
		$pass = $_POST['pass'];
		$civilstatus = $_POST['CivilStatus'];
		$other = $_POST['other'];
		$citizenship = $_POST['Citizenship'];
		$height = $_POST['Height'];
		$weight = $_POST['Weight'];
		$email = $_POST['email'];
		$cell = $_POST['CellNum'];
		$tele = $_POST['TeleNum'];
		$address = $_POST['Address'];
		$zip = $_POST['Zip'];
		$roles = $_POST['role'];
		$password = SHA1($pass);

		if ($employ != "Full-time" && $roles == "Faculty Designee") {
			header("location: index.php?r=administrator/View&EmpID=".$empID."&FCode=".$fcode."&mes=1");
		} else {
			$units = Yii::app()->db->createCommand("SELECT * FROM tbl_facultyunits")
			->queryRow();
			$reg = $units['FacultyDesignee'];
			echo $fcode;
			$sqlUp = "UPDATE tbl_evaluationfaculty SET Regular_Load = :load, enu_employmentStat = :employmentStat WHERE FCode = :fcode";

			Yii::app()->db->createCommand($sqlUp)
			->bindValue(':load', $reg)
			->bindValue(':fcode', $empID)
			->bindValue(':employmentStat',$employ)
			->query();


			if (($employ == "Full-time" || $employ == "Permanent") && ($employ == "Full-time" && $roles != "Faculty Designee")) {
			$units = Yii::app()->db->createCommand("SELECT * FROM tbl_facultyunits")
			->queryRow();
			$reg = $units['RegUnits'];
			$part = $units['PartTimeUnits'];
			$ts = $units['TempSubUnits'];

			$sqlUp = "UPDATE tbl_evaluationfaculty SET Regular_Load = :reg, PartTime_Load = :part, TeachingSub_Load = :ts, enu_employmentStat = :employmentStat WHERE FCode = :fcode";
			
			Yii::app()->db->createCommand($sqlUp)
			->bindValue(':reg',$reg)
			->bindValue(':part',$part)
			->bindValue(':ts',$ts)
			->bindValue(':employmentStat',$employ)
			->bindValue(':fcode',$empID)
			->query();

		} else if($employ == "Part-time" || $employ == "Temporary"){
			$units = Yii::app()->db->createCommand("SELECT PartTimeUnits, TempSubUnits FROM tbl_facultyunits")
			->queryRow();
			$part = $units['PartTimeUnits'];
			$ts = $units['TempSubUnits'];

			$sqlUp = "UPDATE tbl_evaluationfaculty SET Regular_Load = :reg, PartTime_Load = :part, TeachingSub_Load = :ts, enu_employmentStat = :employmentStat WHERE FCode = :fcode";

			Yii::app()->db->createCommand($sqlUp)
			->bindValue(':reg',0)
			->bindValue(':part',$part)
			->bindValue(':ts',$ts)
			->bindValue(':employmentStat',$employ)
			->bindValue(':fcode',$empID)
			->query();
		// } else if($employ == "Faculty Designee"){
		// 	$units = Yii::app()->db->createCommand("SELECT * FROM tbl_facultyunits")
		}

		if($roles=="Staff") {
			$isAdmin = 0;
		} else if($roles=="Professor") {
			$isAdmin = 0;
		} else if($roles=="Administrator") {
			$isAdmin = 1;
		} else if($roles=="HAP") {
			$isAdmin = 1;
		} else if($roles=="HAP Secretary") {
			$isAdmin = 1;
		} else if($roles=="Faculty Designee"){
			$isAdmin = 1;
		} else {
			$isAdmin = 0;
		}

		$sqlUp = "UPDATE tbl_evaluationfaculty SET evalRoles = :role, isAdmin = :admin WHERE FCode = :fcode";
		Yii::app()->db->createCommand($sqlUp)
		->bindValue(':role', $roles)
		->bindValue(':admin', $isAdmin)
		->bindValue(':fcode', $empID)
		->query();

		

		// $sql = "UPDATE tbl_personalinformation SET civilStatus = $civilstatus, citizenship = $citizenship, height = $height, weight = $weight, email = $email, cellNo = $cell, telNo = $tele, residentialAddress = $address, pzipCode = $zip WHERE id = $id";

		if ($civilstatus == "Others"){
			$sql = "UPDATE tbl_personalinformation SET civilStatus = :other, citizenship = :citizenship, height = :height, weight = :weight, email = :email, cellNo = :cell, telNo = :tele, residentialAddress = :address, pzipCode = :zip WHERE id = :id";
			Yii::app()->db->createCommand($sql)
			->bindValue(':other', $other)
			->bindValue(':citizenship', $citizenship)
			->bindValue(':height', $height)
			->bindValue(':weight', $weight)
			->bindValue(':email', $email)
			->bindValue(':cell', $cell)
			->bindValue(':tele', $tele)
			->bindValue(':address', $address)
			->bindValue(':zip', $zip)
			->bindValue(':id', $id)
			->query();

		} else {
			$sql = "UPDATE tbl_personalinformation SET civilStatus = :civilstatus, citizenship = :citizenship, height = :height, weight = :weight, email = :email, cellNo = :cell, telNo = :tele, residentialAddress = :address, pzipCode = :zip WHERE id = :id";
			Yii::app()->db->createCommand($sql)
			->bindValue(':civilstatus', $civilstatus)
			->bindValue(':citizenship', $citizenship)
			->bindValue(':height', $height)
			->bindValue(':weight', $weight)
			->bindValue(':email', $email)
			->bindValue(':cell', $cell)
			->bindValue(':tele', $tele)
			->bindValue(':address', $address)
			->bindValue(':zip', $zip)
			->bindValue(':id', $id)
			->query();
		}


		if ($pass != ""){
			$sql2 = "UPDATE tbl_evaluationfaculty SET password = :pass WHERE FCode = :fcode OR EmpID = :empID";
			Yii::app()->db->createCommand($sql2)
			->bindValue(':pass', $password)
			->bindValue(':fcode', $empID)
			->bindValue(':empID', $empID)
			->query();
		}

		if ($empID != $fcode) {

			// $res = "SELECT FCode FROM tbl_evaluationfaculty WHERE FCode = :fcode";
			// $result = Yii::app()->db->createCommand($res)
			// ->bindValue(':fcode',$fcode)
			// ->queryRow();

			// if (empty($result)) {
			// 	echo "empty";
			// } else {
			// 	echo "wala";
			// }

			$sql1 = "UPDATE tbl_evaluationfaculty SET FCode = :fcode, EmpID = :fcode WHERE FCode = :empID OR EmpID = :empID";
			Yii::app()->db->createCommand($sql1)
			->bindValue(':fcode',$fcode)
			->bindValue(':empID',$empID)
			->query();

			$sql2 = "UPDATE tbl_personalinformation SET FCode = :fcode, EmpID = :fcode, userID = :fcode WHERE FCode = :empID OR EmpID = :empID";
			Yii::app()->db->createCommand($sql2)
			->bindValue(':fcode',$fcode)
			->bindValue(':empID',$empID)
			->query();

			
		}

		header("location: index.php?r=administrator/View&EmpID=".$fcode."&FCode=".$fcode."&mes=0");
		}

		

	}

	public function actionAnncNew()
	{
		$this->render('AnncNew');
	}
	public function actionNwEvtNew()
	{
		$this->render('NwEvtNew');
	}
	public function actionProcessInsertAnnc()
	{
		$this->render('processInsertAnnc');
	}
	public function actionProcessInsertNwEvt()
	{
		$this->render('processInsertNwEvt');
	}
	public function actionProcessUpdateAnnc()
	{
		$this->render('processUpdateAnnc');
	}
	public function actionProcessUpdateNwEvt()
	{
		$this->render('processUpdateNwEvt');
	}
	public function actionUAnnc()
	{
		$this->render('uAnnc');
	}
	public function actionUNwEvt()
	{
		$this->render('uNwEvt');
	}
	public function actionCrannc()
	{
		$this->render('crannc');
	}
	public function actionCrNwEvt()
	{
		$this->render('crNwEvt');
	}
	public function actionRannc()
	{
		$this->render('rannc');
	}
	public function actionRNwEvt()
	{
		$this->render('rNwEvt');
	}
	public function actionNewSeminarAttended()
	{
		$this->render('NewSeminarAttended');
	}
	public function actionProcessUpdateSA()
	{
		$this->render('processUpdateSA');
	}
	public function actionCrsa()
	{
		$this->render('crsa');
	}
	public function actionRsa()
	{
		$this->render('rsa');
	}
	public function actionProcessActivateFA()
	{
		$this->render('processActivateFA');
	}
	public function actionReport()
	{
		$this->render('report');
	}
	public function actionPrintAllCertificates()
	{
		$this->render('PrintAllCertificates');
	}
	public function actionChildInfo()
	{
		$this->render('childInfo');
	}
	public function actionprocessUpdateCI()
	{
		$this->render('processUpdateCI');
	}
	public function actionVoluntaryWork()
	{
		$this->render('VoluntaryWork');
	}
	public function actionTrainingPrograms()
	{
		$this->render('TrainingPrograms');
	}
	public function actionOtherInformation()
	{
		$this->render('OtherInformation');
	}
	public function actionReferences()
	{
		$this->render('References');
	}
	public function actionTaxCertificate()
	{
		$this->render('TaxCertificate');
	}
	public function actionVoluntaryWorkNew()
	{
		$this->render('VoluntaryWorkNew');
	}
	public function actionProcessInsertVWork()
	{
		$this->render('ProcessInsertVWork');
	}
	public function actionVwinfo()
	{
		$this->render('vwinfo');
	}
	public function actionCrvw()
	{
		$this->render('crvw');
	}
	public function actionProcessUpdateVWork()
	{
		$this->render('ProcessUpdateVWork');
	}
	public function actionRvw()
	{
		$this->render('rvw');
	}
	public function actionNewCSE()
	{
		$this->render('NewCSE');
	}
	public function actionProcessInsertCSE()
	{
		$this->render('processInsertCSE');
	}
	public function actionUpdateCSE()
	{
		$this->render('updateCSE');
	}
	public function actionProcessUpdateCSE()
	{
		$this->render('processUpdateCSE');
	}
	public function actionCrcse()
	{
		$this->render('crcse');
	}
	public function actionRcse()
	{
		$this->render('rcse');
	}
	public function actionTrainingProgramNew()
	{
		$this->render('TrainingProgramNew');
	}
	public function actionProcessInsertTP()
	{
		$this->render('ProcessInsertTP');
	}
	public function actionTpinfo()
	{
		$this->render('tpinfo');
	}
	public function actionCrtp()
	{
		$this->render('crtp');
	}
	public function actionRtp()
	{
		$this->render('rtp');
	}
	public function actionProcessUpdateTP()
	{
		$this->render('ProcessUpdateTP');
	}
	public function actionNewSKH()
	{
		$this->render('NewSKH');
	}
	public function actionCrskh()
	{
		$this->render('crskh');
	}
	public function actionProcessUpdateSKH()
	{
		$this->render('ProcessUpdateSKH');
	}
	public function actionNewNADR()
	{
		$this->render('NewNADR');
	}
	public function actionCrnadr()
	{
		$this->render('crnadr');
	}
	public function actionProcessUpdateNADR()
	{
		$this->render('ProcessUpdateNADR');
	}
	public function actionCrmiao()
	{
		$this->render('crmiao');
	}
	public function actionNewmiao()
	{
		$this->render('Newmiao');
	}
	public function actionProcessUpdateMIAO()
	{
		$this->render('ProcessUpdateMIAO');
	}
	public function actionQuestions()
	{
		$this->render('Questions');
	}
	public function actionProcessSaveAnswers()
	{
		$this->render('processSaveAnswers');
	}
	public function actionReferencesNew()
	{
		$this->render('ReferencesNew');
	}
	public function actionProcessInsertREF()
	{
		$this->render('ProcessInsertREF');
	}
	public function actionRefinfo()
	{
		$this->render('refinfo');
	}
	public function actionProcessUpdateREF()
	{
		$this->render('ProcessUpdateREF');
	}
	public function actionCrref()
	{
		$this->render('crref');
	}
	public function actionRref()
	{
		$this->render('rref');
	}
	public function actionNewTC()
	{
		$this->render('newTC');
	}
	public function actionTaxCertificateUpdate()
	{
		$this->render('TaxCertificateUpdate');
	}
	public function actionProcessInsertTC()
	{
		$this->render('ProcessInsertTC');
	}
	public function actionProcessUpdateTC()
	{
		$this->render('ProcessUpdateTC');
	}
	public function actionPDS()
	{
		$this->render('PDS');
	}
	public function actionMyPDS1()
	{
		$this->render('MyPDS1');
	}
	public function actionMyPDS2()
	{
		$this->render('MyPDS2');
	}
	public function actionMyPDS3()
	{
		$this->render('MyPDS3');
	}
	public function actionMyPDS4()
	{
		$this->render('MyPDS4');
	}
	public function actionFAQs()
	{
		$this->render('FAQs');
	}
	public function actionNewScholarship()
	{
		$this->render('NewScholarship');
	}
	public function actionProcessInsertSCHO()
	{
		$this->render('ProcessInsertSCHO');
	}
	public function actionUscho()
	{
		$this->render('uscho');
	}
	public function actionProcessUpdateSCHO()
	{
		$this->render('ProcessUpdateSCHO');
	}
	public function actionCrscho()
	{
		$this->render('crscho');
	}
	public function actionRscho()
	{
		$this->render('rscho');
	}
	public function actionNewRefereedPublication()
	{
		$this->render('NewRefereedPublication');
	}
	public function actionProcessInsertRP()
	{
		$this->render('processInsertRP');
	}
	public function actionUpdateRP()
	{
		$this->render('UpdateRP');
	}
	public function actionCrrp()
	{
		$this->render('crrp');
	}
	public function actionRrp()
	{
		$this->render('rrp');
	}
	public function actionProcessUpdateRP()
	{
		$this->render('processUpdateRP');
	}
	public function actionSetEmpID()
	{
		$this->render('SetEmpID');
	}
	public function actionProcessSETEMPID()
	{
		$this->render('processSETEMPID');
	}
	public function actionTempSub()
	{
		$this->render('TempSub');
	}
	public function actionNewTempSub()
	{
		$this->render('NewTempSub');
	}
	public function actionProcessInsertFTS()
	{
		$this->render('processInsertFTS');
	}
	public function actionPersonalDataSheet()
	{
		$this->render('PersonalDataSheet');
	}
	public function actionSaveCoverage()
	{
		$this->render('saveCoverage');
	}
	public function actionScheduling()
	{
		$this->render('Scheduling');
	}
	public function actionFwe()
	{
		$this->render('fwe');
	}
	public function actionSchedulingPage()
	{
		$this->render('SchedulingPage');
	}
	public function actionInternalSchedulingPage()
	{
		$this->render('InternalSchedulingPage');
	}

	public function actionProcessAddInternalSched()
	{
		$this->render('ProcessAddInternalSched');
	}

	public function actionSetSchedule()
	{
		$this->render('SetSchedule');
	}
	public function actionSetInternalSchedule()
	{
		$this->render('SetInternalSchedule');
	}

	public function actionProcessSetSched()
	{
		print_r($_POST);
		$prof = $_GET['prof'];
		$day = $_POST['sday'];
		$roomName = $_POST['roomName'];
		$profName = $_POST['profName'];
		$courseID = $_GET['courseID'];
		$currID = $_GET['currID'];
		$cyear = $_GET['cyear'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$title = $_GET['title'];
		$units = $_GET['units'];
		$lec = $_GET['lec'];
		$lab = $_GET['lab'];

		$timeS1 = $_POST['timeS'];
		$timeE1 = $_POST['timeE'];
		

		$S1 = explode(":",$timeS1);
		$E1 = explode(":",$timeE1);
		

		if($S1[0]<=22 && $S1[0]>6){
			if ($S1[0] == 22) {
				if ($S1[1] >= 1) {
					header("location:index.php?r=administrator/SetSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
					
				}
			}
				if($E1[0]<=22 && $E1[0]>6){
					if ($E1[0] == 22) {
						if ($E1[1] >= 1) {
							header("location:index.php?r=administrator/SetSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
							
						}
					}
					if (isset($_POST['timeS2'])) {
						$timeS2 = $_POST['timeS2'];
						$timeE2 = $_POST['timeE2'];
						$S2 = explode(":",$timeS2);
						$E2 = explode(":",$timeE2);
						if($S2[0]<=22 && $S2[0]>6){
							if ($S2[0] == 22) {
								if ($S2[1] >= 1) {
									header("location:index.php?r=administrator/SetSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
									
								}
							}
							if($E2[0]<=22 && $E2[0]>6){
								if ($E2[0] == 22) {
									if ($E2[1] >= 1) {
										header("location:index.php?r=administrator/SetSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
										
									}
								}
								
								$this->render('processSetSched');
							}
						} else {
							header("location:index.php?r=administrator/SetSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
							
						}
					}
				$this->render('processSetSched');
			} else {
				header("location:index.php?r=administrator/SetSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
				
			}

		// $this->render('processSetSched');
		} else {
			echo "not allowed";
		}
	}
	public function actionProcessSetInternalSched()
	{
		$this->render('processSetInternalSched');
	}
	public function actionHeaderMenu()
	{
		$this->render('headerMenu');
	}
	public function actionCurriculum()
	{
		//getting the previous curriculum ID
		

		$subjects = TblCurriculum::model()->GetAllCurriculum($_GET['year']);
		$course = TblCourse::model()->GetCourse();
		
		$this->render('curriculum', array('PrevCurriculum' => $subjects, 'course' => $course));
	}

	public function actionChoosecurriculum(){
		$years = TblCurriculumref::model()->GetCurrID();
		$sameYear = TblSubjectloadlist::model()->ReturnSpecCurrID($_POST['year']);

		$count = count($sameYear);

		if ($count < 1) {
			$this->render('Choosecurriculum', array('currYear' => $years));
		} else {
			header("location: index.php?r=administrator/CurriculumList&mes=2");
		}
		
	}

	public function actionViewCurriculum()
	{
		$this->render('Viewcurriculum');
	}
	public function actionProcessCurriculum()
	{
		$currID = TblSubjectload::model()->GetCurrID();
		for ($i=0; $i < 1; $i++) { 
			$latestCurr = $currID[$i]['currID'];
		}

		$currYear = $_GET['CurrYear'];
		$year = $_GET['schoolYear'];
		$PreviousYear = $year - 1;
		$yearString = $PreviousYear."-".$year;

		$currID = TblSubjectload::model()->GetCurrID();
		for ($i=0; $i < 1; $i++) { 
			$latestCurr = $currID[$i]['currID'];
		}
		$insertCurrID = $latestCurr + 1;


		$courses = TblCourse::model()->GetCourse();

		$curr = array();
		for ($i=0; $i < count($courses); $i++) { 
			$curr[$i] = array(
				'currID' => $insertCurrID,
				'currDesc' => $year,
				'courseDesc' => $courses[$i]['course_code']
			);
		}

		$builder = Yii::app()->db->schema->commandBuilder;
		$command=$builder->createMultipleInsertCommand('tbl_subjectloadlist', $curr);
		$command->execute();

		$AllCurr = TblCurriculum::model()->GetAllCurriculum($currYear);

		$insertCurr = array();

		$subjectRef = array();

		for ($i=0; $i < count($AllCurr); $i++) { 
			$insertCurr[$i]=array(
				'currID' => $insertCurrID,
				'currYear' => $currYear,
				'courseID' => $AllCurr[$i]['courseID'],
				'csection' => $AllCurr[$i]['csection'],
				'cyear' => $AllCurr[$i]['cyear'],
				'scode' => $AllCurr[$i]['scode'],
				'stitle' => $AllCurr[$i]['stitle'],
				'sunit' => $AllCurr[$i]['sunit'],
				'sem' => $AllCurr[$i]['sem'],
				'schoolYear' => $yearString,
				'hrs_lec' => $AllCurr[$i]['hrs_lec'],
				'hrs_lab' => $AllCurr[$i]['hrs_lab'],
				'prereq' => $AllCurr[$i]['prereq']
			);

			$subjectRef[$i]=array(
				'courseID' => $AllCurr[$i]['courseID'],
				'cyear' => $AllCurr[$i]['cyear'],
				'currID' => $insertCurrID,
				'schoolYear' => $yearString
			);
		}
		/*echo "<pre>";
		print_r($insertCurr);
		echo "</pre>";*/

		$command = $builder->createMultipleInsertCommand('tbl_subjectload', $insertCurr);
		$command->execute();
		$command = $builder->createMultipleInsertCommand('tbl_subjectloadref', $subjectRef);
		$command->execute();
		header("Location: index.php?r=administrator/CurriculumList&mes=0");
			
		
		// $this->render('processCurriculum');
	}
	public function actiondeleteSched()
	{
		$this->render('deleteSched');
	}
	public function actiondeleteInternalSched()
	{
		$this->render('deleteInternalSched');
	}
	public function actionPrintSchedule()
	{
		$this->render('PrintSchedule');
	}
	public function actionAddSubject()
	{
		$this->render('AddSubject');
	}
	public function actionProcessAddSubject()
	{
		$this->render('ProcessAddSubject');
	}

	public function actionProcessUploadFile(){
		$mimes = array('application/vnd.ms.excel','text/plain', 'text/csv','text/tsv','application/csv','text/comma-separated-values','application/excel','application/vnd.ms-excel','application/vnd.msexcel','text/anytext','application/octet-stream','application/txt');
		if (isset($_FILES['filename'])) {
			if (in_array($_FILES['filename']['type'], $mimes)) {
				$Subject = array('currYear','SubjCode','SubjDescription','Category','Units','HoursLab','HoursLec');
				$subjects = array();
				$arrayIndex = 0;
				$fileName = $_FILES["filename"]["tmp_name"];
				

				
				//Passing of cell values from the file
				$file_to_read = fopen($fileName, 'r');
		 
			    while (!feof($file_to_read) ) {
			        $lines[] = fgetcsv($file_to_read, 1000, ',');
			 
			    }

			    fclose($file_to_read);
			    //end of passing values from the file

			    echo "<pre>";
			    print_r($lines);
			    echo "</pre>";
			    //passing array values to another array
			    $last = count($lines) - 1;

			    for ($x=1; $x < $last; $x++) { 
			    	if ($x!=1 || $x!=$last) {
			    		$subjects[$arrayIndex] = array_combine($Subject, $lines[$x]);
			    		$arrayIndex++;
			    	}
			    }

			    //Insert active query
			    $builder = Yii::app()->db->schema->commandBuilder;
				$command=$builder->createMultipleInsertCommand('tbl_subjects', $subjects);
				$command->execute();
			    header("Location: index.php?r=administrator/SubjectManagement&mes=1");
			} else {
				header("Location: index.php?r=administrator/SubjectManagement&mes=4");
			}
		} else {
			header("Location: index.php?r=administrator/SubjectManagement&mes=3");
		}
		
	}

	public function actionSchedulingMenu()
	{
		$requests = TblRequestschedule::model()->countRequests();
		$FRequests = count($requests);

		$this->render('SchedulingMenu');
	}
	public function actionSubjPreferALL()
	{
		$this->render('SubjPreferALL');
	}
	public function actionTimePrefer()
	{
		$this->render('TimePrefer');
	}
	public function actionTagSchedules()
	{
		$this->render('TagSchedules');
	}
	public function actionResetTagged()
	{
		$this->render('ResetTagged');
	}
	public function actionprocessSetTagged()
	{
		$this->render('processSetTagged');
	}
	public function actionDeleteTagged()
	{
		$this->render('DeleteTagged');
	}
	public function actionSetTagged()
	{
		$this->render('SetTagged');
	}
	public function actionSchedulingSystem()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$sySem = TblCurrentsyandsem::model()->AllData();
		$year = $sySem[0]['schoolYear'];
		$sem = $sySem[0]['sem'];

		$requests = TblRequestschedule::model()->countRequests($sem, $year);
		$FRequests = count($requests);

		$this->render('SchedulingSystem',array('sy' => $year, 'sem' => $sem, 'requests' => $FRequests));
	}
	public function actionSubjPrefer()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$sySem = TblCurrentsyandsem::model()->AllData();
		$year = $sySem[0]['schoolYear'];
		$sem = $sySem[0]['sem'];

		$requests = TblRequestschedule::model()->countRequests($sem, $year);
		$FRequests = count($requests);

		$this->render('SubjPrefer' ,array('sy' => $year, 'sem' => $sem, 'requests' => $FRequests));
	}
	public function actionDeletetimePrefer()
	{
		$timeID = $_GET['timeID'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];

		// Delete Active Query in Yii 1.1
		$deleteTimePrefer = TblTimepreferences::model()->findByPk($timeID);
		$deleteTimePrefer->delete();
		header("Location: index.php?r=administrator/AddTimePrefer&mes=5");
		// $this->render('DeletetimePrefer');
	}

	public function actionTimePreferProcess()
	{
		if (isset($_POST['timeS']) || isset($_POST['timeE'])) {
			$start = $_POST['timeS'];
			if (empty($_POST['timeS'])) {
				echo"
				<script>
				window.location.replace('index.php?r=administrator/UpdateTimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&timeID=".$_GET['timeID']."&mes=1');
				</script>";
			} else {
				if (empty($_POST['timeE'])) {
					echo"
					<script>
					window.location.replace('index.php?r=administrator/UpdateTimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&timeID=".$_GET['timeID']."&mes=1');
					</script>";
				} else {
					$this->render('TimePreferProcessUPDATE');
				}
			}
		
		} else {
			$this->render('TimePreferProcessUPDATE');
		}
		
	}
	public function actionAddTimePrefer()
	{
		$semAndSy = TblCurrentsyandsem::model()->AllData();
		foreach ($semAndSy as $row) {
			$sem = $row['sem'];
			$sy = $row['schoolYear'];
		}
		$prof = Yii::app()->session['fcode'];
		$timePref = TblTimepreferences::model()->GetProfSchedPref($sem, $sy, $prof);
		$this->render('AddTimePrefer', array('timePref' => $timePref));
	}
	public function actionUpdateTimePrefer()
	{

		$this->render('UpdateTimePrefer');
	}
	public function actionTimePreferProcessADD()
	{
		// print_r($_POST);
		$this->render('TimePreferProcessADD');
	}
	public function actiontagSubjectspage()
	{
		if(isset($_POST['sem'])){
			$sem = $_POST['sem'];
		}
		if(isset($_POST['sy'])){
			$sy = $_POST['sy'];
		}
		if(isset($_GET['sem'])){
			$sem = $_GET['sem'];
		}
		if(isset($_GET['sy'])){
			$sy = $_GET['sy'];
		}
		$fcode = Yii::app()->session['fcode'];
		$rows = TblSubjectload::model()->SubjCurriculum($sem, $sy);
		$subPref = TblSubjpreferences::model()->CheckProfSubPref($sem, $sy, $fcode);
		$course = TblCourse::model()->GetCourse();
		$profMaxUnit = TblEvaluationfaculty::model()->CheckSpecProf($fcode);

		$v1 = count($rows);
		$v2 = count($subPref);
		// $temp serves as the temporary placement for the subjects that have not been chosen by the faculty
		$temp = array();

		//removing subjects that are chosen by the faculty
		for ($x = 0; $x < $v1; $x++){
			$i = 0;
			for ($y = 0; $y < $v2; $y++){
				if($rows[$x]['scode'] == $subPref[$y]['scode']){
					$i = 1;
					continue;
				}
			}

			if ($i == 1) {
				unset($rows[$x]);
			} else {
				$temp[$x] = $rows[$x];
			}
		}
		//rearranging the element values of the array
		$subject = array_values($rows);

		$reg = $profMaxUnit['Regular_Load'];
		$part = $profMaxUnit['PartTime_Load'];
		$ts = $profMaxUnit['TeachingSub_Load'];

		$tots = $reg + $part + $ts;


		$currentTotalUnits = 0;

		foreach ($subPref as $row) {
			$currentTotalUnits += $row['units'];
		}

		$this->render('tagSubjectspage', array('subjects' => $subject, /*'courses' => $course,*/'currentTotalUnits' => $currentTotalUnits, 'totUnits' => $tots));
	}
	public function actionTagSubjectADD()
	{
		$fcode = Yii::app()->session['fcode'];
		$sem = $_POST['sem'];
		$sy = $_POST['sy'];

		if (!(isset($_POST['subjID1']))) {
			header("Location: index.php?r=administrator/tagSubjectspage&sy=".$sy."&sem=".$sem."&mes=2");
		} else {
			$checked = $_POST['subjID1'];
			foreach($_POST['subjID2'] as $key => $value){
			if(in_array($_POST['subjID2'][$key], $checked)){
				$subjcode = $_POST['subjID2'][$key];
				$subjtitle = $_POST['subjTitle'][$key];
				$lec = $_POST['subjLec'][$key];
				$lab = $_POST['subjLab'][$key];
				$units = $_POST['subjUnit'][$key];
				$SubjPreferences = new TblSubjpreferences();
				
				$SubjPreferences->attributes = [
				  'schedID' => '',
				  'scode' => $subjcode,
				  'stitle' => $subjtitle,
				  'units' => $units,
				  'lec' => $lec,
				  'lab' => $lab,
				  'sprof' => $fcode,
				  'sem' => $sem,
				  'schoolYear' => $sy
				];
				$SubjPreferences->save();
				header("Location: index.php?r=administrator/tagSubjectspage&sy=".$sy."&sem=".$sem."&mes=1");
				
			}
			
		}
		}
		
		
		// $this->render('TagSubjectADD');
	}
	public function actionSubjectManagement()
	{
		$cat = TblCategories::model()->findAll(array('order'=>'category ASC'));
		$currYear = TblCurriculumref::model()->GetCurrID();

		$this->render('SubjectManagement',array('categories'=>$cat, 'curr'=>$currYear));
	}

	public function actionUpdateMyschedule()
	{
		$this->render('UpdateMyschedule');
	}
	public function actionMySchedule()
	{
		$this->render('MySchedule');
	}
	public function actiontagSubjects()
	{
		$sySem = TblCurrentsyandsem::model()->AllData();
		$year = $sySem[0]['schoolYear'];
		$sem = $sySem[0]['sem'];

		// $this->render('tagSubjects');
		header("location: index.php?r=administrator/tagSubjectspage&sem=".$sem."&sy=".$year."");
	}
	public function actionEditSubject()
	{
		$cat = TblCategories::model()->findAll(array('order'=>'category ASC'));
		$this->render('EditSubject',array('categories'=>$cat));
	}
	public function actionProcessUpdateSubject()
	{
		$this->render('ProcessUpdateSubject');
	}
	public function actionProcessDeleteSubject()
	{
		$this->render('processDeleteSubject');
	}
	public function actionRoomManagement()
	{
		$this->render('RoomManagement');
	}
	public function actionProcessAddRoom()
	{
		$this->render('processAddRoom');
	}
	public function actionAddRoom()
	{
		$this->render('AddRoom');
	}
	public function actionEditRoom()
	{
		$this->render('EditRoom');
	}
	public function actionProcessEditRoom()
	{
		$this->render('processEditRoom');
	}
	public function actionProcessDeleteRoom()
	{
		$this->render('processDeleteRoom');
	}
	public function actionCurriculumManagement()
	{
		$this->render('CurriculumManagement');
	}
	public function actionListCurriculum()
	{
		$this->render('ListCurriculum');
	}
	public function actionProcessSetCurriculum()
	{
		$this->render('processSetCurriculum');
	}
	public function actionSetCurriculum()
	{
		// print_r($_GET);
		$cID = $_GET['courseID'];
		$cYear = $_GET['year'];
		$schoolYear = $_GET['sy'];
		$finSchoolYear = $_GET['sy'];
		$YearEff = explode("-", $schoolYear);

		$result = TblSubjectloadlist::model()->ReturnSpecCurrID($YearEff[1]);

		if (!empty($result)) {
			$currID = $result[0]['currID'];
			
			// echo $cID." ".$cYear." ".$finSchoolYear." ".$currID;

			$tblCurriculumref = new TblSubjectloadref();

			$tblCurriculumref->attributes = [
				'courseID' => $cID,
				'cyear' => $cYear,
				'currID' => $currID,
				'schoolYear' => $finSchoolYear
			];

			$tblCurriculumref->save();
			
			//gets the curriculum year used based on the curriculum ID
			$sql = "SELECT DISTINCT currYear FROM tbl_subjectload WHERE currID = :currID";
            $currYear = Yii::app()->db->createCommand($sql)
            ->bindValue(':currID',$currID)
            ->queryRow();
            
            $curriculumYear = $currYear['currYear'];
            
			header("Location: index.php?r=administrator/ViewCurriculum&courseID=".$cID."&sy=".$finSchoolYear."&year=".$cYear."&currID=".$currID."&currYear=".$curriculumYear."");
		} else {
			header("Location: index.php?r=administrator/CurriculumManagement&mes=0&courseID=".$cID."&sy=".$finSchoolYear."&year=".$cYear."");
		}
		
		// $this->render('setCurriculum');
	}
	public function actionAddCurrSubj()
	{
		session_start();
    	$subjects = TblSubjects::model()->GetAllSubject($_GET['currYear']);
    	$curriculum = TblSubjectload::model()->GetCourseCurriculum($_GET['currID'], $_GET['courseID']);
    	$course = TblCourse::model()->SpecificCourse($_GET['courseID']);
    	
    	$courseDesc = $course['course_desc'];

    	for ($s=0; $s < count($subjects); $s++) { 
    		$i = 0;
    		for ($c=0; $c < count($curriculum); $c++) { 
    			if($subjects[$s]['SubjCode'] == $curriculum[$c]['scode']){
    				$i = 1;
    				continue;
    			}
    		}
    		if ($i == 1) {
    			unset($subjects[$s]);
    		}
    		
    	}

    	$subject = array_values($subjects);
    	// echo "<pre>";
    	// print_r($subjects);
    	// echo "</pre>";
		$this->render('AddCurrSubj', array('subjects'=>$subject, 'course' => $courseDesc));
	}
	public function actionProcessAddCurrSubj()
	{
		$schoolYear = $_POST['year'];
		$currID = $_POST['currID'];
    	$cyear = $_POST['cyear'];
    	$courseID = $_POST['courseID'];
    	$currYear = $_POST['currYear'];
    	$sem = $_POST['sem'];
		if (isset($_POST['subjID1'])) {
	    	// $courseName = $_POST['courseName'];
	    	$arrayIndex = 0;

	    	// echo $currYear." ".$cyear." ".$courseID." ".$sem;

	    	$checked = $_POST['subjID1'];
			foreach($_POST['subjID2'] as $key => $value){
				if(in_array($_POST['subjID2'][$key], $checked)){
					$subjcode = $_POST['subjID2'][$key];
					$subjtitle = $_POST['subjTitle'][$key];
					$lec = $_POST['subjLec'][$key];
					$lab = $_POST['subjLab'][$key];
					$units = $_POST['subjUnit'][$key];
					
					
					$Subjects[$arrayIndex] = array(
					  'currID' => $currID,
					  'currYear' => $currYear,
					  'courseID' => $courseID,
					  'csection' => 1,
					  'cyear' => $cyear,
					  'scode' => $subjcode,
					  'stitle' => $subjtitle,
					  'sunit' => $units,
					  'sem' => $sem,
					  'schoolYear' => $schoolYear,
					  'hrs_lec' => $lec,
					  'hrs_lab' => $lab
					);

					$arrayIndex++;
				}
			}
			$builder = Yii::app()->db->schema->commandBuilder;
			$command=$builder->createMultipleInsertCommand('tbl_subjectload', $Subjects);
			$command->execute();
			header("location: index.php?r=administrator/Viewcurriculum&courseID=".$courseID."&year=".$cyear."&currID=".$currID."&sy=".$schoolYear."&mes=0&currYear=".$currYear."");
		} else {
			header("Location: index.php?r=administrator/AddCurrSubj&courseID=".$courseID."&year=".$cyear."&currID=".$currID."&sem=".$sem."&sy=".$schoolYear."&currYear=".$currYear."&mes=2");
		}
		
		
		// $this->render('processAddCurrSubj');
	}
	public function actionCourseManagement()
	{
		$this->render('CourseManagement');
	}
	public function actionProcessDeleteCurrSubj()
	{
		$this->render('processDeleteCurrSubj');
	}
	public function actionEditCourse()
	{
		$this->render('EditCourse');
	}
	public function actionProcessEditCourse()
	{
		$this->render('processEditCourse');
	}
	public function actionAddCourse()
	{
		$this->render('AddCourse');
	}
	public function actionProcessAddCourse()
	{
		$this->render('processAddCourse');
	}
	public function actionProcessDeleteCourse()
	{
		$this->render('processDeleteCourse');
	}
	public function actionCourseReport()
	{
		$this->render('CourseReport');
	}
	public function actionSubjectReport()
	{
		$this->render('SubjectReport');
	}
	public function actionRoomReport()
	{
		$this->render('RoomReport');
	}
	public function actionCurriculumList()
	{
		$this->render('CurriculumList');
	}
	public function actionEditCurriculumList()
	{
		$this->render('EditCurriculumList');
	}
	public function actionPrintCurriculum()
	{
		$this->render('PrintCurriculum');
	}
	public function actionInfoReport()
	{
		$this->render('InfoReport');
	}
	public function actionBranchOfficials()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('BranchOfficials');
	}
	public function actionAdminStaff()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('AdminStaff');
	}
	public function actionNewFaculty()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('NewFaculty');
	}
	public function actionSecurityGuard()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('SecurityGuard');
	}
	public function actionAddBranchOfficial()
	{
		$this->render('AddBranchOfficial');
	}
	public function actionProcessAddBranchOfficial()
	{
		$this->render('processAddBranchOfficial');
	}
	public function actionAddAdminStaff()
	{
		$this->render('AddAdminStaff');
	}
	public function actionProcessAddAdminStaff()
	{
		$this->render('processAddAdminStaff');
	}
	public function actionAddNewFaculty()
	{
		$this->render('AddNewFaculty');
	}
	public function actionProcessAddNewFaculty()
	{
		$this->render('processAddNewFaculty');
	}
	public function actionAddSecurityGuard()
	{
		$this->render('AddSecurityGuard');
	}
	public function actionprocessAddSecurityGuard()
	{
		$this->render('processAddSecurityGuard');
	}
	public function actionFullTime()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('FullTime');
	}
	public function actionAddFullTime()
	{
		$this->render('AddFullTime');
	}
	public function actionProcessAddFullTime()
	{
		$this->render('processAddFullTime');
	}
	public function actionPartTime()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('PartTime');
	}
	public function actionAddPartTime()
	{
		$this->render('AddPartTime');
	}
	public function actionProcessAddPartTime()
	{
		$this->render('processAddPartTime');
	}
	public function actionEditInfoReport()
	{
		$this->render('EditInfoReport');
	}
	public function actionProcessEditInfoReport()
	{
		$this->render('processEditInfoReport');
	}
	public function actionProcessDeleteInfoReport()
	{
		$this->render('processDeleteInfoReport');
	}
	public function actionPrintInfoReport()
	{
		$this->render('PrintInfoReport');
	}
	public function actionSchedulingPref()
	{
		$this->render('SchedulingPref');
	}
	public function actionChecklist()
	{
		$this->render('checklist');
	}
	public function actionPrintChecklist()
	{
		$this->render('printChecklist');
	}
	public function actionCategorizeSubjects()
	{
		$this->render('categorizeSubjects');
	}
	public function actionCategories()
	{
		$this->render('Categories');
	}
	public function actionAddCategories()
	{
		$this->render('addCategories');
	}
	public function actionProcessAddCategories()
	{
		$this->render('processAddCategories');
	}
	public function actionDeleteCategory()
	{
		$this->render('deleteCategory');
	}
	public function actionEditCategory()
	{
		$this->render('editCategory');
	}
	public function actionProcessEditCategory()
	{
		$this->render('processEditCategory');
	}
	public function actionPreScheduling()
	{
		$this->render('PreScheduling');
	}
	public function actionSetPreScheduling()
	{
		$this->render('setPreScheduling');
	}
	public function actionProcessSetPreScheduling()
	{
		$this->render('processSetPreScheduling');
	}
	public function actionDeletePreScheduling()
	{
		$this->render('deletePreScheduling');
	}
	public function actionTeachingLoad()
	{
		$this->render('TeachingLoad');
	}
	public function actionPrintTeachingLoad()
	{
		$this->render('PrintTeachingLoad');
	}
	public function actionPrintAllTL()
	{
		$this->render('PrintAllTL');
	}
	public function actionRoomControl()
	{
		$this->render('RoomControl');
	}
	public function actionPrintPreSched()
	{
		$this->render('PrintPreSched');
	}
	public function actionAddPrereq()
	{
		//temporary data
		$subjects = TblSubjects::model()->GetAllSubject($_GET['currYear']);
		$this->render('AddPrereq',array('subjects' => $subjects));
	}
	public function actionProcessAddPrereq()
	{
		$this->render('processAddPrereq');
	}
	public function actionAddSched()
	{
		$this->render('AddSched');
	}
	public function actionAddInternalSched()
	{
		$this->render('AddInternalSched');
	}
	public function actionProcessAddSched()
	{
		// print_r($_POST);
		$prof = $_GET['prof'];
		$day = $_POST['sday'];
		$roomName = $_POST['roomName'];
		$profName = $_POST['profName'];
		$courseID = $_GET['courseID'];
		$currID = $_GET['currID'];
		$cyear = $_GET['cyear'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$title = $_GET['title'];
		$units = $_GET['units'];
		$lec = $_GET['lec'];
		$lab = $_GET['lab'];

		$timeS = $_POST['timeS'];
		$timeE = $_POST['timeE'];

		$S = explode(":",$timeS);
		$E = explode(":",$timeE);
		// echo $timeS."-".$timeE;

		if($S[0]<=22 && $S[0]>6){
			if ($S[0] == 22) {
				if ($S[1] >= 1) {
					header("location:index.php?r=administrator/AddSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
				}
			}
			if($E[0]<=22 && $E[0]>6){
				if ($E[0] == 22) {
					if ($E[1] >= 1) {
						header("location:index.php?r=administrator/AddSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
					}
				}
				$this->render('processAddSched');
			}
		} else {
			header("location:index.php?r=administrator/AddSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=2");
		}
		
	}
	public function actionProfSched()
	{
		$this->render('profSched');
	}
	public function actioninternalprofSched()
	{
		$this->render('internalprofSched');
	}
	public function actionStudSched()
	{
		$this->render('studSched');
	}
	public function actionPrintSDS()
	{
		$this->render('PrintSDS');
	}
	public function actionPrintFDS()
	{
		$this->render('PrintFDS');
	}
	public function actionPrintFDSinternal()
	{
		$this->render('PrintFDSinternal');
	}
	public function actionprintPerDay()
	{
	    $this->render('printPerDay');
	}
	public function actionDailySched()
	{
		$this->render('DailySched');
	}
	public function actionInternalDailySched()
	{
		$this->render('InternalDailySched');
	}
	public function actionAddPreSched()
	{
		$this->render('AddPreSched');
	}
	public function actionProcessAddPreSched()
	{
		$this->render('ProcessAddPreSched');
	}
	public function actionAddDailySched()
	{
		$this->render('AddDailySched');
	}
	public function actionSetDailySched()
	{
		$this->render('SetDailySched');
	}
	public function actionDeleteDailySched()
	{
		$this->render('DeleteDailySched');
	}
		public function actionProcessSetDailySched()
	{
		$this->render('ProcessSetDailySched');
	}
	public function actionRoomDailySched()
	{
		$rooms = TblRoom::model()->findAll(array('select'=>'roomName'));
		$this->render('RoomDailySched',array('data'=>$rooms));
	}
	public function actionPrintRDS()
	{
		$this->render('PrintRDS');
	}
	public function actionServiceCreditation()
	{
		$this->render('ServiceCreditation');
	}
	public function actionProcessServiceCreditation()
	{
		$this->render('processServiceCreditation');
	}
	public function actionServiceCredit()
	{
		$this->render('ServiceCredit');
	}
	public function actionUpdateServiceCredit()
	{
		$this->render('UpdateServiceCredit');
	}
	public function actionCrsc()
	{
		$this->render('crsc');
	}
	public function actionProcessUpdateServiceCredit()
	{
		$this->render('ProcessUpdateServiceCredit');
	}
	public function actionDeleteServiceCredit()
	{
		$this->render('DeleteServiceCredit');
	}
	public function actionPrintServiceCredit()
	{
		$this->render('PrintServiceCredit');
	}
	public function actionServiceCreditMenu()
	{
		session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
		$this->render('ServiceCreditMenu');
	}
	public function actionSODesc()
	{
		$this->render('SODesc');
	}
	public function actionAddDesc()
	{
		$this->render('AddDesc');
	}
	public function actionProcessAddDesc()
	{
		$this->render('ProcessAddDesc');
	}
	public function actionEditDesc()
	{
		$this->render('EditDesc');
	}
	public function actionProcessDeleteDesc()
	{
		$this->render('ProcessDeleteDesc');
	}
	public function actionProcessEditDesc()
	{
		$this->render('ProcessEditDesc');
	}
	public function actionGetFacultyCode()
	{
		$this->render('GetFacultyCode');
	}
	public function actionIndividualReport()
	{
		$this->render('IndividualReport');
	}
	public function actionEditCurriculum()
	{
		$cID = $_GET['courseID'];
		$cYear = $_GET['year'];
		$schoolYear = $_GET['sy'];
		$currID = $_GET['currID'];
		$currYear = $_GET['currYear'];

		header("Location: index.php?r=administrator/ViewCurriculum&courseID=".$cID."&sy=".$schoolYear."&year=".$cYear."&currID=".$currID."&currYear=".$currYear."");
		// $this->render('EditCurriculum');
	}
	public function actionProcessEditCurriculum()
	{
		$this->render('ProcessEditCurriculum');
	}
	/* ------------------------------ Batch 2016-2017 Module Update ----------------------------- */
	public function actionAdminStaffchecklist()
	{
		$this->render('AdminStaffchecklist');
	}
	public function actionprintAdminStaffchecklist()
	{
		$this->render('printAdminStaffchecklist');
	}
	public function actiongetPItodeactivateandactivate()
	{
		$this->render('getPItodeactivateandactivate');
	}
	public function actionafa()
	{
		$this->render('afa');
	}
	public function actionprocessDeleteSecurityGuard()
	{
		$this->render('processDeleteSecurityGuard');
	}
	public function actionprocessDeleteFT()
	{
		$this->render('processDeleteFT');
	}
	public function actionprocessDeletePT()
	{
		$this->render('processDeletePT');
	}
	public function actionprocessDeleteAS()
	{
		$this->render('processDeleteAS');
	}
	public function actionprocessDeleteBranchOfficials()
	{
		$this->render('processDeleteBranchOfficials');
	}
	public function actionGetTmpFacultyCode()
	{
		$this->render('GetTmpFacultyCode');
	}
	public function actionprocessInsertNFA()
	{
		$this->render('processInsertNFA');
	}
	public function actionEditNewFaculty()
	{
		$this->render('EditNewFaculty');
	}
	public function actionprocessENFS()
	{
		$this->render('processENFS');
	}
	public function actionDeleteBO()
	{
		$id = $_GET['ID'];
		$sql = "DELETE FROM tbl_masterlist WHERE ID = :id";

		Yii::app()->db->createCommand($sql)
		->bindValue(':id',$id)
		->query();

		header('Location: index.php?r=administrator/BranchOfficials&mes=1');
		// $this->render('DeleteBO');
	}
	public function actionprocessChngStat()
	{
		$this->render('processChngStat');
	}
	public function actionEditAS()
	{
		$this->render('EditAS');
	}
	public function actionEditFT()
	{
		$this->render('EditFT');
	}
	public function actionEditPT()
	{
		$this->render('EditPT');
	}
	public function actionEditSG()
	{
		$this->render('EditSG');
	}
	public function actionSendEmail()
	{
	    if (isset($_FILES['filename']) && $_FILES['filename']['name'] != "" && $_FILES['filename']['tmp_name'] != "") {
    		$fname = $_FILES['filename']['name'];
	    	$ftmpname = $_FILES['filename']['tmp_name'];
	    	$subject = $_POST['subject'];
			$message = $_POST['message'];
			$message .= '<br><br><br>Click <a href="http://puptaguigcs.net/FSISCS">http://fsiscs.puptaguigcs.net/</a> to visit our website.<br><br>Please do not reply to this email. This is a system-generated notification.';

			$i = 0;
			$emails = TblEvaluationfaculty::model()->GetActiveFacultyEmail();
			$i = 0;

            $mail = new YiiMailer;
			// $mail->isSMTP();   // Uncomment this line on testing server                                  
			//Uncomment this when testing on the local server such as xampp
			// $mail->SMTPDebug  = 1;                                  
			// $mail->Host = "smtp.gmail.com";  
			// $mail->SMTPAuth = true;                           
			// $mail->Username = 'puptfsis2022@gmail.com';                
			// $mail->Password = '@PUPtaguigfsis2022';   
			// $mail->addAttachment($ftmpname,$fname);                       
			// $mail->SMTPSecure = 'ssl';                            
			// $mail->Port = 465; 

			//Uncomment this following lines when the project is uploaded on the hostinger
			$mail->SMTPDebug  = 1;                                  
			$mail->Host = "smtp.hostinger.com";  
			$mail->SMTPAuth = true;                           
			$mail->Username = 'fls@puptaguigcs.net';                
		    $mail->Password = 'FLSEmail@2022'; 
		    $mail->addAttachment($ftmpname,$fname);
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = 465;
			$mail->setFrom('fls@puptaguigcs.net', 'PUPT FSIS');
			$mail->isHTML(true);                                  
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';

			foreach ($emails as $row) {
				$mail->AddAddress($row['Email'], $row['FName']);     
				$i++;
			}
			
			if(!$mail->send()) {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=2')</script>";
			} else {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=1')</script>";
			}
    	} else {
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			$message .= '<br><br><br>Click <a href="http://puptaguigcs.net/FSISCS">http://fsiscs.puptaguigcs.net/</a> to visit our website.<br><br>Please do not reply to this email. This is a system-generated notification.';

			$i = 0;
			$emails = TblEvaluationfaculty::model()->GetActiveFacultyEmail();
			$i = 0;

            $mail = new YiiMailer;
			// $mail->isSMTP();   // Uncomment this line on testing server                                  
			//Uncomment this when testing on the local server such as xampp
			/*$mail->SMTPDebug  = 1;                                  
			$mail->Host = "smtp.gmail.com";  
			$mail->SMTPAuth = true;                           
			$mail->Username = 'puptfsis2022@gmail.com';                
			$mail->Password = '@PUPtaguigfsis2022';                         
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = 465; */
			
			//Uncomment this following lines when the project is uploaded on the hostinger
			$mail->SMTPDebug  = 1;                                  
			$mail->Host = "smtp.hostinger.com";  
			$mail->SMTPAuth = true;                           
			$mail->Username = 'fls@puptaguigcs.net';                
		    $mail->Password = 'FLSEmail@2022';                          
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = 465;
			$mail->setFrom('fls@puptaguigcs.net', 'PUPT FSIS');
			$mail->isHTML(true);                                  
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';
				
			foreach ($emails as $row) {
				$mail->AddAddress($row['Email'], $row['FName']);     
				$i++;
			}
			
			if(!$mail->send()) {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=2')</script>";
			} else {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=1')</script>";
			}
    	}
		
		
		// $this->render('sendEmail');
	}
	public function actiondeleterequest()
	{
		$this->render('deleterequest');
	}
	public function actionprocessinternalsched()
	{
		$this->render('processinternalsched');
	}

	public function actionprocessinternalschedreject()
	{
		$this->render('processinternalschedreject');
	}
	public function actionRequestsManagement()
	{
		$this->render('RequestsManagement');
	}
	public function actionviewrequests()
	{
		$this->render('viewrequests');
	}

	public function actionInternalRoomDaily()
	{
		$rooms = TblRoom::model()->findAll(array('select'=>'roomName'));
	    $this->render('InternalRoomDaily',array('data'=>$rooms));
	}

    public function actionPrintRDSInternal()
	{
	    $this->render('PrintRDSInternal');
	}

	// February 14, 2018 //
    public function actionOfficialSchedule()
	{
		$this->render('OfficialSched');
	}
	public function actionPrintAllOfficialSchedule()
	{
		$this->render('PrintAllOfficialSchedule');
	}
	public function actionPrintIndividualOfficialSchedule()
	{
		$this->render('PrintIndividualOfficialSchedule');
	}


    public function actionBridgeSchedulingPage()
    {
        $this->render('BridgeSchedulingPage');
    }

    public function actionAddBridgeSubject()
    {
        $this->render('AddBridgeSubject');
    }

    public function actionProcessAddBridgeSubject()
    {
        $this->render('ProcessAddBridgeSubject');
    }

    public function actionAddSecondDayBridgeSubject()
    {
        $this->render('AddSecondDayBridgeSubject');
    }


    public function actionProcessAddSecondDayBridgeSubject()
    {
        $this->render('ProcessAddSecondDayBridgeSubject');
    }

    public function actionUpdateBridgeSubject()
    {
        $this->render('UpdateBridgeSubject');
    }

    public function actionProcessEditBridgeSubject()
    {
        $this->render('ProcessEditBridgeSubject');
    }
    public function actionProcessDeleteBridgeSubject()
    {
        $this->render('processDeleteBridgeSubject');
    }

    public function actionPrintBridgeSchedule()
    {
        $this->render('PrintBridgeSchedule');
    }

    // The main page
    public function actionMakeupClassRequest()
    {
        $this->render('MakeupClassRequest');
    }


    // The adding module
    public function actionAddMakeupClass()
    {
        $this->render('AddMakeupClass');
    }


    public function actionProcessAddMakeupClass()
    {
        $this->render('ProcessAddMakeupClass');
    }


    public function actionApproveMakeupClass()
    {
        $this->render('ApproveMakeupClass');
    }

    public function actionDeclineMakeupClass()
    {
        $this->render('DeclineMakeupClass');
    }


    public function actionMakeupClassRequestPersonal()
    {
        $this->render('MakeupClassRequestPersonal');
    }


    public function actionUpdateMakeupClass()
    {
        $this->render('UpdateMakeupClass');
    }

    public function actionProcessUpdateMakeupClass()
    {
        $this->render('ProcessUpdateMakeupClass');
    }

    public function actionProcessDeleteMakeupClass()
    {
        $this->render('ProcessDeleteMakeupClass');
    }


    public function actionSubjectLoad()
    {
    	$fcode = Yii::app()->session['fcode'];
		if (isset($_POST['sem'])) {
			$sem = $_POST['sem'];
		}
		if (isset($_POST['sy'])) {
			$sy = $_POST['sy'];
		}
		if (isset($_GET['sem'])) {
			$sem = $_GET['sem'];
		}
		if (isset($_GET['sy'])) {
			$sy = $_GET['sy'];
		}
		
		if (isset($_POST['sem']) and isset($_POST['sy'])) {
			$result = TblSchedule::model()->FacultyLoad($sem, $sy, $fcode);
			// echo "<pre>";
			// print_r($result);
			// echo "</pre>";
			$this->render('SubjectLoad', array('load' => $result));
		} else if (isset($_GET['sem']) and isset($_GET['sy'])) {
			$result = TblSchedule::model()->FacultyLoad($sem, $sy, $fcode);
			// $this->render('SubjectLoad', array('load' => $result));
		} else {
			$this->render('SubjectLoad');
		}
        // $this->render('SubjectLoad');
    }

    public function actionSubjectPreference()
    {
        $this->render('SubjectPreference');
    }

    public function actionviewfacultyrequest()
    {
        $this->render('viewfacultyrequest');
    }

    public function actionprocessrequestsched()
    {
        $this->render('processrequestsched');
    }

    public function actionSubjectOfferings()
    {
    	// $this->render('header/header');
    	$this->render('SubjectOffering');
    }

    public function actionSample(){
    	$this->render('sample');
    }

    // Maintenance ng FLS
    public function actionSetSYandSem(){
		$this->render('SetSYandSem');
	}

	public function actionSetSemSY(){
		TblCurrentsyandsem::model()->updateAll(['schoolYear' => $_POST['sy'], 'sem' => $_POST['sem']]);
		header("Location: index.php?r=administrator/SchedulingSystem&mes=1");

	}

	public function actionSetFacultyUnits(){
		$units = TblFacultyunits::model()->GetAllUnits();

		// echo "<pre>";
		// print_r($units);
		// echo "</pre>";

		foreach ($units as $row) {
			$regular = $row['RegUnits'];
			$part = $row['PartTimeUnits'];
			$ts = $row['TempSubUnits'];
			$fd = $row['FacultyDesignee'];
		}
		
		$this->render('SetFacultyUnits', array('regular' => $regular, 'part' => $part, 'ts' => $ts, 'fd' => $fd));
	}

	public function actionProcessSetFacultyUnits(){
		$reg = $_POST['Reg'];
		$part = $_POST['Part'];
		$ts = $_POST['TS'];
		$fd = $_POST['FD'];

		// print_r($_POST);

		//updates the maintenance for tbl_facultyunits
		$sql = "UPDATE tbl_facultyUnits SET RegUnits = :reg, PartTimeUnits = :part, TempSubUnits = :temp, FacultyDesignee = :fd";
		Yii::app()->db->createCommand($sql)
		->bindValue(':reg',$reg)
		->bindValue(':part',$part)
		->bindValue(':temp',$ts)
		->bindValue(':fd',$fd)
		->query();

		//updates the regular load of faculty designee 
		$sql = "UPDATE tbl_evaluationfaculty SET Regular_Load = :fd WHERE evalRoles = :role";
		Yii::app()->db->createCommand($sql)
		->bindValue(':fd', $fd)
		->bindValue(':role', 'Faculty Designee')
		->query();

		//updates the regular load of regular faculty 
		$sqlUpdateRegularFaculty = "UPDATE tbl_evaluationfaculty SET Regular_Load = :reg WHERE Regular_Load != :zero AND evalRoles != :role";
		Yii::app()->db->createCommand($sqlUpdateRegularFaculty)
		->bindValue(':reg',$reg)
		->bindValue(':zero',0)
		->bindValue(':role', 'Faculty Designee')
		->query();

		//updates the part time and ts load of part time faculty 
		$sqlUpdatePartTs = "UPDATE tbl_evaluationfaculty SET PartTime_Load = :part, TeachingSub_Load = :ts";
		Yii::app()->db->createCommand($sqlUpdatePartTs)
		->bindValue(':part',$part)
		->bindValue(':ts',$ts)
		->query();

		header('Location: index.php?r=administrator/SchedulingSystem&mes=0');
	}


	// End of Maintenance ng FLS

    public function actionPrintSubjectOfferings(){		
    	$result = TblSchedule::model()->TakeSubjectsOffer($_POST['sy'],$_POST['sem']);
    	$resultc = TblCourse::model()->GetCourse();
    	$resultp = TblEvaluationfaculty::model()->CheckProf();

    	$this->render('PrintSubjectOfferings',array('data'=>$result,'courses'=>$resultc, 'prof'=>$resultp));
		
    }

    // Function not yet available

    // public function actionFacultyAssignment(){
    // 	$codeProf = Yii::app()->session['fcode'];
    // 	$result = TblEvaluationfaculty::model()->CheckSpecProf($codeProf);
    // 	$resultLoad = TblSchedule::model()->TakeSubjectLoad($codeProf);
    // 	$resultc = TblCourse::model()->GetCourse();
    // 	$this->render('PrintFacultyAssignment',array('data'=>$result, 'subjects'=>$resultLoad, 'courses'=>$resultc));

    // }

    public function actionPrintPersonalFacultyAssign(){
    	$fcode = Yii::app()->session['fcode'];
    	$sem = $_GET['sem'];
    	$sy = $_GET['sy'];
    	$TeachingLoad = TblSchedule::model()->TakeSubjectLoad($fcode, $sem, $sy);
    	$courses = TblCourse::model()->GetCourse();
    	$profInfo = TblEvaluationfaculty::model()->CheckSpecProf($fcode);

    	// echo "<pre>";
    	// print_r($profInfo);
    	// echo "</pre>";
    	$this->render('PrintFacultyAssign',array('TeachingLoad'=>$TeachingLoad, 'profInfo'=>$profInfo, 'courses'=>$courses, 'sem' => $sem, 'sy' => $sy));
    }

    public function actionPrintFacultyAssign(){
    	$fcode = $_GET['prof'];
    	$sem = $_GET['sem'];
    	$sy = $_GET['sy'];
    	$TeachingLoad = TblSchedule::model()->TakeSubjectLoad($fcode, $sem, $sy);
    	$courses = TblCourse::model()->GetCourse();
    	$profInfo = TblEvaluationfaculty::model()->CheckSpecProf($fcode);

    	// echo "<pre>";
    	// print_r($profInfo);
    	// echo "</pre>";
    	$this->render('PrintFacultyAssign',array('TeachingLoad'=>$TeachingLoad, 'profInfo'=>$profInfo, 'courses'=>$courses, 'sem' => $sem, 'sy' => $sy));
    }

    public function actionPrintFacultyPref(){
    	$sem = $_POST['sem'];
		$sy = $_POST['sy'];
		$schedules = TblTimepreferences::model()->findAllByAttributes(['sem' => $sem, 'schoolYear' => $sy]);
		$subjects = TblSubjpreferences::model()->findAllByAttributes(['sem' => $sem, 'schoolYear' => $sy]);
		$prof = TblSubjpreferences::model()->DistinctProf($sem, $sy);
		$profAll = TblEvaluationfaculty::model()->CheckProf();

		// echo "<pre>";
		// print_r($prof);
		// echo "</pre>";

		$this->render('PrintFacultyPref', array('sem' => $sem, 'sy' => $sy, 'schedules' => $schedules, 'subjects' => $subjects, 'prof' => $prof, 'profAll' => $profAll));

    }

    public function actionRealCurriculumManagement(){
    	session_start();
    	$result = TblCurriculumref::model()->GetCurrID();
    	// print_r($result);
    	$this->render('RealCurriculumManagement', array('currID' => $result));
    }

    public function actioncreateCurriculum(){
    	session_start();
    	$this->render('createCurriculum');
    }

    public function actionprocessCreateCurriculum(){
    	$year = $_POST['year'];

    	$reference = new TblCurriculumref();
    	$reference->attributes = [
    		'Year' => $year
    	];

    	$reference->save();
    	header("location: index.php?r=administrator/RealCurriculumManagement&mes=0");
    }

    public function actionViewCurriculumCourses(){
    	session_start();
    	$course = TblCourse::model()->GetCourse();
    	$this->render('ViewCurriculumCourses', array('course'=>$course));
    }

    public function actionDeleteCurriculumCourses(){
    	$year = $_GET['year'];
    	TblCurriculumref::model()->deleteAll('Year = :currYear', [':currYear' => $year]);


    	header("location: index.php?r=administrator/RealCurriculumManagement&mes=1");
    }

    public function actionSetCurriculumCourse(){
    	session_start();
    	$course = TblCourse::model()->SpecificCourse($_GET['courseID']);
    	$curriculum = TblCurriculum::model()->GetCurriculum($_GET['year']);
    	// echo "<pre>";
    	// print_r($curriculum);
    	// echo "</pre>";
    	$this->render('SetCurriculumCourse', array('course'=>$course, 'curriculum'=>$curriculum));
    }

    public function actionAddCurriculumSubj(){
    	session_start();
    	$cat = TblCategories::model()->findAll(array('order'=>'category ASC'));
    	$subjects = TblSubjects::model()->GetAllSubject($_GET['year']);
    	$curriculum = TblCurriculum::model()->GetCourseCurriculum($_GET['year'], $_GET['courseID']);
    	

    	for ($s=0; $s < count($subjects); $s++) { 
    		$i = 0;
    		for ($c=0; $c < count($curriculum); $c++) { 
    			if($subjects[$s]['SubjCode'] == $curriculum[$c]['scode']){
    				$i = 1;
    				continue;
    			}
    		}
    		if ($i == 1) {
    			unset($subjects[$s]);
    		}
    		
    	}

    	$subject = array_values($subjects);
    	//to make sure that there are no duplicate selected subject to the curriculum
    	for ($s=0; $s < count($subject); $s++) { 
    		$i = 0;
    		for ($c=0; $c < count($curriculum); $c++) { 
    			if($subject[$s]['SubjCode'] == $curriculum[$c]['scode']){
    				$i = 1;
    				continue;
    			}
    		}
    		if ($i == 1) {
    			unset($subject[$s]);
    		}
    		
    	}

    	$Fsubject = array_values($subject);
    	// echo "<pre>";
    	// print_r($Fsubject);
    	// echo "</pre>";
    	$this->render('AddCurriculumSubj', array('subjects'=>$Fsubject, 'categories'=>$cat));
    }

    public function actionprocessAddCurriculumSubj(){
    	$currYear = $_POST['year'];
    	$cyear = $_POST['cyear'];
    	$courseID = $_POST['courseID'];
    	$sem = $_POST['sem'];
    	$courseName = $_POST['courseName'];
    	$arrayIndex = 0;
    	
    	if (isset($_POST['subjID1'])){
    	    $checked = $_POST['subjID1'];
    		foreach($_POST['subjID2'] as $key => $value){
    			if(in_array($_POST['subjID2'][$key], $checked)){
    				$subjcode = $_POST['subjID2'][$key];
    				$subjtitle = $_POST['subjTitle'][$key];
    				$lec = $_POST['subjLec'][$key];
    				$lab = $_POST['subjLab'][$key];
    				$units = $_POST['subjUnit'][$key];
    				
    				
    				$Subjects[$arrayIndex] = array(
    				  'currID' => $currYear,
    				  'courseID' => $courseID,
    				  'csection' => 1,
    				  'cyear' => $cyear,
    				  'scode' => $subjcode,
    				  'stitle' => $subjtitle,
    				  'sunit' => $units,
    				  'sem' => $sem,
    				  'hrs_lec' => $lec,
    				  'hrs_lab' => $lab
    				);
    
    				$arrayIndex++;
    			}
    		}
    		$builder = Yii::app()->db->schema->commandBuilder;
    		$command=$builder->createMultipleInsertCommand('tbl_curriculum', $Subjects);
    		$command->execute();
    		header("location: index.php?r=administrator/SetCurriculumCourse&courseID=".$courseID."&year=".$currYear."&courseName=".$courseName."&mes=1");
    	} else {
    	    header("location: index.php?r=administrator/AddCurriculumSubj&courseID=".$courseID."&year=".$currYear."&sem=".$sem."&cyear=".$cyear."&courseName=".$courseName."&mes=3");
    	}

    }

    public function actionprocessAddSingleCurriculumSubj(){
    	$currYear = $_POST['year'];
    	$cyear = $_POST['cyear'];
    	$courseID = $_POST['courseID'];
    	$sem = $_POST['sem'];
    	$courseName = $_POST['courseName'];

    	$scode = $_POST['scode'];
    	$stitle = $_POST['stitle'];
    	$units = $_POST['units'];
    	$lec = $_POST['lec'];
    	$lab = $_POST['lab'];
    	$cat = $_POST['cat'];

    	$subjectCheck = TblCurriculum::model()->SubjectCheck($currYear, $scode);
    	$countSubs1 = count($subjectCheck);
    	// $lec = $lec.".00";
    	// $lab = $lab.".00";

    	echo $countSubs1;

    	if ($countSubs1 < 1) {
    		$tblCurriculum = new TblCurriculum();
			$tblCurriculum->attributes = [
				'currID' => $currYear,
				'courseID' => $courseID,
				'csection' => 1,
				'cyear' => $cyear,
				'scode' => $scode,
				'stitle' => $stitle,
				'sunit' => $units,
				'sem' => $sem,
				'hrs_lec' => $lec,
				'hrs_lab' => $lab,
				'prereq' => ''
			];
			$tblCurriculum->save();

	    	$checksub = TblSubjects::model()->CheckSub($currYear, $scode);
	    	$countSubs2 = count($checksub);
	    	
	    	if ($countSubs2 < 1) {
	    		$tblSubjects = new TblSubjects();
				$tblSubjects->attributes = [
					'SubjCode' => $scode,
					'SubjDescription' => $stitle,
					'Units' => $units,
					'HoursLab' => $lab,
					'HoursLec' => $lec,
					'GroupSubject' => ' ',
					'Dept_ID' => ' ',
					'Category' => $cat,
					'currYear' => $currYear
				];
				$tblSubjects->save();
	    	}
			header("location: index.php?r=administrator/SetCurriculumCourse&courseID=".$courseID."&year=".$currYear."&courseName=".$courseName."&mes=1");
    	} else {
    		header("location: index.php?r=administrator/AddCurriculumSubj&cyear=".$cyear."&sem=".$sem."&courseID=".$courseID."&year=".$currYear."&courseName=".$courseName."&mes=1");
    	}
		
		// // print_r($tblSubjects->errors);

		
    }

    public function actionprocessDeleteCurriculumSubj(){
    	
    	$currYear = $_GET['currYear'];
    	$courseID = $_GET['courseID'];
    	$sem = $_GET['sem'];
    	$cyear = $_GET['cyear'];
    	$scode = $_GET['subjectCode'];

    	TblCurriculum::model()->deleteAll('currID = :currYear AND courseID = :courseID AND sem = :sem AND cyear = :cyear AND scode = :scode', [':currYear' => $currYear, ':courseID' => $courseID, ':sem' => $sem, ':cyear' => $cyear, ':scode' => $scode]);


    	header("location: index.php?r=administrator/SetCurriculumCourse&courseID=".$_GET['courseID']."&year=".$_GET['currYear']."&courseName=".$_GET['courseName']."");
    }

    public function actionPrintSpecificCourseCurr(){
    	$curriculum = TblCurriculum::model()->GetCourseCurriculum($_GET['year'], $_GET['courseID']);
    	$course = TblCourse::model()->SpecificCourse($_GET['courseID']);

    	/*echo "<pre>";
    	print_r($course);
    	echo "</pre>";*/

    	$this->render('PrintSpecificCourse', array('curriculum' => $curriculum, 'course' => $course));
    }

    public function actionPrintCurriculumReport(){						
    	$curriculum = TblCurriculum::model()->GetAllCurriculum($_GET['year']);
    	$course = TblCourse::model()->GetCourse();

    	// echo "<pre>";
    	// print_r($course);
    	// echo "</pre>";
    	$this->render('PrintCurriculumReport', array('curriculum' => $curriculum, 'course' => $course));
    }

    public function actionSendSpecific(){
    	$receipients = array();
    	$i = 0;
    	

    	if (isset($_POST['fcode1'])) {
    		$checked = $_POST['fcode1'];

    		foreach($_POST['fcode2'] as $key => $value){
			if(in_array($_POST['fcode2'][$key], $checked)){
				// $recipients[$i] = $_POST['email2'][$key];
				array_push($receipients, $_POST['fcode2'][$key]);
				$i++;
				}
			}
			$i = 0;
			$emails = array();
			foreach ($receipients as $row) {
				$email[$i] = TblPersonalinformation::model()->GetEmail($receipients[$i]);
				array_push($emails, $email[$i][0]['email']);
				$i++;
			}
			$this->render('messageSpecific',array('receivers'=>$receipients, 'email' => $emails));
    	} else {
    		header("location: index.php?r=administrator/other&mes=4");
    	}

    	
		
		// echo "<pre>";
		// print_r($_POST['fcode1']);
		// echo "<pre>";
    	
    }
    public function actionsendEmailInd(){
        if (isset($_FILES['filename']) && $_FILES['filename']['name'] != "" && $_FILES['filename']['tmp_name'] != "") {
    		$fname = $_FILES['filename']['name'];
	    	$ftmpname = $_FILES['filename']['tmp_name'];
	    	$subject = $_POST['subject'];
			$message = $_POST['message'];
			$message .= '<br><br><br>Click <a href="http://puptaguigcs.net/FSISCS">http://fsiscs.puptaguigcs.net/</a> to visit our website.<br><br>Please do not reply to this email. This is a system-generated notification.';

			$i = 0;
			$emails = array();
			foreach ($_POST['fcode'] as $row => $value) {
				$email[$i] = TblEvaluationfaculty::model()->EmailFacultySpecific($_POST['fcode'][$row]);
				array_push($emails, $email[$i][0]);
				$i++;
			}
			$i = 0;
			
			$mail = new YiiMailer;
			
			// $mail->isSMTP();   // Uncomment this line on testing server                                  
			//Uncomment this when testing on the local server such as xampp
			// $mail->SMTPDebug  = 1;                                  
			// $mail->Host = "smtp.gmail.com";  
			// $mail->SMTPAuth = true;                           
			// $mail->Username = 'puptfsis2022@gmail.com';                
			// $mail->Password = '@PUPtaguigfsis2022';   
			// $mail->addAttachment($ftmpname,$fname);                       
			// $mail->SMTPSecure = 'ssl';                            
			// $mail->Port = 465;
			// $mail->setFrom('puptfsis2022@gmail.com', 'PUPT-FSIS');
            
            
            //Uncomment this following lines when the project is uploaded on the hostinger
			$mail->SMTPDebug  = 1;                                  
			$mail->Host = "smtp.hostinger.com";  
			$mail->SMTPAuth = true;                           
			$mail->Username = 'fls@puptaguigcs.net';                
		    $mail->Password = 'FLSEmail@2022'; 
		    $mail->addAttachment($ftmpname,$fname);
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = 465;
			$mail->setFrom('fls@puptaguigcs.net', 'PUPT FSIS');
            $mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';
			
			foreach ($emails as $row) {
				$mail->AddAddress($row['Email'], $row['FName']);     
				$i++;
			}
			
			if(!$mail->send()) {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=2')</script>";
			} else {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=1')</script>";
			}
    	} else {
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			$message .= '<br><br><br>Click <a href="http://puptaguigcs.net/FSISCS">http://fsiscs.puptaguigcs.net/</a> to visit our website.<br><br>Please do not reply to this email. This is a system-generated notification.';

			$i = 0;
			$emails = array();
			foreach ($_POST['fcode'] as $row => $value) {
				$email[$i] = TblEvaluationfaculty::model()->EmailFacultySpecific($_POST['fcode'][$row]);
				array_push($emails, $email[$i][0]);
				$i++;
			}

			echo "<pre>";
			print_r($emails);
			echo "<pre>";
			$i = 0;
			
			// $mail->isSMTP();   // Uncomment this line on testing server                                  
				//Uncomment this when testing on the local server such as xampp
				/*$mail->SMTPDebug  = 1;                                  
				$mail->Host = "smtp.gmail.com";  
				$mail->SMTPAuth = true;                           
				$mail->Username = 'puptfsis2022@gmail.com';                
				$mail->Password = '@PUPtaguigfsis2022';                         
				$mail->SMTPSecure = 'ssl';                            
				$mail->Port = 465; */

            $mail = new YiiMailer;
        	//Uncomment this following lines when the project is uploaded on the hostinger
			$mail->SMTPDebug  = 1;                                  
			$mail->Host = "smtp.hostinger.com";  
			$mail->SMTPAuth = true;                           
			$mail->Username = 'fls@puptaguigcs.net';                
		    $mail->Password = 'FLSEmail@2022';                          
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = 465;
			
			$mail->setFrom('fls@puptaguigcs.net', 'PUPT FSIS');
			$mail->isHTML(true); 
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';
			
			
			foreach ($emails as $row) {
				$mail->AddAddress($row['Email'], $row['FName']);    
				$i++;
			}
			if(!$mail->send()) {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=2')</script>";
			} else {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=1')</script>";
			}
    	}
    }

    public function actionTeachingAssignment(){
    	session_start();
		$this->CheckEmpID($_SESSION['CEmpID']);
    	$currSemAndSy = TblCurrentsyandsem::model()->AllData();

    	foreach ($currSemAndSy as $row) {
    		$sem = $row['sem'];
    		$sy = $row['schoolYear'];
    	}

    	$proflist = TblEvaluationfaculty::model()->GetFacultyListWithSchedule($sem, $sy);


    	$this->render('TeachingAssignment', array('prof' => $proflist, 'SyAndSem' => $currSemAndSy));
    }

    public function actionShowProfSubject(){
    	$sem = $_GET['sem'];
    	$sy = $_GET['sy'];
    	$prof = $_GET['prof'];

    	$limit = TblEvaluationfaculty::model()->CheckSpecProf($prof);

    	$profSub = TblSchedule::model()->FacultyLoad($sem, $sy, $prof);
    	
    	$this->render('ProfSubs',array('sem' => $sem, 'sy' => $sy, 'prof' => $prof, 'subject' => $profSub, 'limit'=>$limit));
    }

    public function actionSetTeachingAssignment(){
    	// echo "<pre>";
    	// print_r($_GET);
    	// echo "</pre>";
    	$sem = $_GET['sem'];
    	$sy = $_GET['sy'];
    	$prof = $_GET['prof'];
    	$mode = $_GET['mode'];

    	$limit = TblEvaluationfaculty::model()->CheckSpecProf($prof);

    	// echo "<pre>";
    	// print_r($limit);
    	// echo "</pre>";

    	$profSub = TblSchedule::model()->FacultyLoad($sem, $sy, $prof);
    	$Regular = $limit['Regular_Load'];
    	$PartTime = $limit['PartTime_Load'];
    	$TS = $limit['TeachingSub_Load'];

    	$this->render('SetTeachingAssignment', array('subject'=>$profSub, 'sem' => $sem, 'sy' => $sy, 'prof' => $prof, 'load_type' => $mode, 'Regular' => $Regular, 'PartTime' => $PartTime, 'TS' => $TS));
    }

    public function actionSetLoadToNull(){
    	echo "<pre>";
    	print_r($_GET);
    	echo "</pre>";

    	$sem = $_GET['sem'];
    	$sy = $_GET['sy'];
    	$prof = $_GET['prof'];
    	$sched_id = $_GET['sched_id'];

    	Yii::app()->db->createCommand('UPDATE tbl_schedule SET load_type = :load_type WHERE schedID = :sched_id')
    	->bindValue(':load_type', NULL)
    	->bindValue(':sched_id', $sched_id)
    	->query();

    	header("location: index.php?r=administrator/ShowProfSubject&sem=".$sem."&sy=".$sy."&prof=".$prof."&mes=1");
    }

    public function actionProcessSetTeachingAssignment(){
    	// echo "<pre>";
    	// print_r($_POST);
    	// echo "</pre>";

    	$load_type = $_POST['load_type'];
    	$sem = $_POST['sem'];
    	$sy = $_POST['sy'];
    	$prof = $_POST['prof'];
    	$totalUnits = $_POST['totalUnits'];

    	if (isset($_POST['sched_id1'])) {
	    	$checked = $_POST['sched_id1'];
	    	foreach($_POST['sched_id2'] as $key => $value){
	    		if (in_array($_POST['sched_id2'][$key], $checked)) {
	    			// $subjcode = $_POST['subjID2'][$key]."<br>";
	    			$sched_id = $_POST['sched_id2'][$key];
	    			// echo "<br>";

	    			if ($load_type == "Regular") {
	    				Yii::app()->db->createCommand('UPDATE tbl_schedule SET load_type = :load_type WHERE schedID = :sched_id')
	    				->bindValue(':load_type',1)
	    				->bindValue(':sched_id',$sched_id)
	    				->query();
	    			} elseif ($load_type == "PartTime") {
	    				Yii::app()->db->createCommand('UPDATE tbl_schedule SET load_type = :load_type WHERE schedID = :sched_id')
	    				->bindValue(':load_type',0)
	    				->bindValue(':sched_id',$sched_id)
	    				->query();
	    			} elseif ($load_type == "TS"){
	    				Yii::app()->db->createCommand('UPDATE tbl_schedule SET load_type = :load_type WHERE schedID = :sched_id')
	    				->bindValue(':load_type',2)
	    				->bindValue(':sched_id',$sched_id)
	    				->query();
	    			}
	    		}
	    	}

	    	header("Location: index.php?r=administrator/ShowProfSubject&sem=".$sem."&sy=".$sy."&prof=".$prof."&mes=0");
    	} else {
    		header("Location: index.php?r=administrator/SetTeachingAssignment&sem=".$sem."&sy=".$sy."&prof=".$prof."&mode=".$load_type."&mes=2&totalUnits=".$totalUnits."");
    	}

    	

    }

    public function actionEditLoadSubject(){
    	// echo "<pre>";
    	// print_r($_POST);
    	// echo "</pre>";

    	if($lec != "" || !empty($lec) || $lab != "" || !empty($lab)){
    		$sem = $_POST['sem'];
	    	$sy = $_POST['sy'];
	    	$prof = $_POST['prof'];
	    	$scode = $_POST['scode'];
	    	$stitle = $_POST['stitle'];
	    	$units = $_POST['units'];
	    	$lec = $_POST['lec'];
	    	$lab = $_POST['lab'];
	    	$schedID = $_POST['sched_id'];
	    	$load_type = $_POST['load_type'];


	    	// $subject = TblSchedule::model()->findByPk($schedID);
	    	// $subject->scode=$scode;
	    	// $subject->stitle=$stitle;
	    	// $subject->units=$units;
	    	// $subject->lec=$lec;
	    	// $subject->lab=$lab;
	    	// $subject->save();

	    	Yii::app()->db->createCommand('UPDATE tbl_schedule SET scode = :scode, stitle = :stitle, units =:units, lec = :lec, lab = :lab WHERE schedID = :schedID')
	    	->bindValue(':scode', $scode)
	    	->bindValue(':stitle', $stitle)
	    	->bindValue(':units', $units)
	    	->bindValue(':lec', $lec)
	    	->bindValue(':lab', $lab)
	    	->bindValue(':schedID', $schedID)
	    	->query();

	    	// print_r($subject->errors);
	    	header("location: index.php?r=administrator/SetTeachingAssignment&sem=".$sem."&sy=".$sy."&prof=".$prof."&mes=1&mode=".$load_type."&totalUnits=".$_POST['totalUnits']."");
	    } else {
	    	header("location: index.php?r=administrator/SetTeachingAssignment&sem=".$sem."&sy=".$sy."&prof=".$prof."&mes=3&mode=".$load_type."&totalUnits=".$_POST['totalUnits']."");
	    }
    	

    }








    /////////////////////////////////IPCR CONTROLLERS////////////////////////////////////
    public function actionIPCRdeadlineExtend1()
    {
    	$this->render('IPCRdeadlineExtend1');
    }
    public function actionIPCRdeadlineExtend2()
    {
    	$this->render('IPCRdeadlineExtend2');
    }
    public function actionIPCRform2copy()
    {
    	if(isset($_GET['m'],$_GET['y'],$_GET['fcode']))
    	{
        	$m = $_GET['m'];
        	$y = $_GET['y'];
        	$fcode = $_GET['fcode'];
    	}

		$datasp = TblIpcr2::model()->getIPCR2datasp($y,$fcode);
		$datacf = TblIpcr2::model()->getIPCR2datacf($y,$fcode);
		$datasf = TblIpcr2::model()->getIPCR2datasf($y,$fcode);

		// echo "<pre>";
		// print_r($datasp);
		// echo "</pre>"; 

		$this->render('IPCRform2copy', array(
			'infosp' => $datasp,
			'infocf' => $datacf,
			'infosf' => $datasf,
			'm' => $m,
			'ye' => $y,
			'fcode' => $fcode
		));
    }
    public function actionIPCRform1copy()
    {
    	if(isset($_GET['m'],$_GET['y'],$_GET['fcode']))
    	{
        	$m = $_GET['m'];
        	$y = $_GET['y'];
        	$fcode = $_GET['fcode'];
    	}

		$datasp = TblIpcr1::model()->getIPCR1datasp($y,$fcode);
		$datacf = TblIpcr1::model()->getIPCR1datacf($y,$fcode);
		$datasf = TblIpcr1::model()->getIPCR1datasf($y,$fcode);

		// echo "<pre>";
		// print_r($datasp);
		// echo "</pre>"; 

		$this->render('IPCRform1copy', array(
			'infosp' => $datasp,
			'infocf' => $datacf,
			'infosf' => $datasf,
			'm' => $m,
			'ye' => $y,
			'fcode' => $fcode
		));
    }
    public function actionIPCRdeletefromtable()
    {
    	$this->render('IPCRdeletefromtable');
    }
    public function actionIPCRcopyform()
    {
    	$this->render('IPCRcopyform');
    }
    public function actionIPCRemailtemplateunsubmit()
    {
    	$this->render('IPCRemailtemplateunsubmit');
    }
    public function actionIPCRemailreminder()
    {
    	$this->render('IPCRemailreminder');
    }
    public function actionheaderMenuIPCR()
    {
    	$this->render('headerMenuIPCR');
    }
    public function actionIPCRmarkform()
    {
    	$this->render('IPCRmarkform');
    }
    public function actionIPCRemailtemplatePending()
    {
    	$this->render('IPCRemailtemplatePending');
    }
    public function actionIPCRemailtemplateApproved()
    {
    	$this->render('IPCRemailtemplateApproved');
    }
    public function actionIPCRInterpolationSheet2JD()
    {
    	$this->render('IPCRInterpolationSheet2JD');
    }
    public function actionIPCRinterpolview2()
    {
    	$this->render('IPCRinterpolview2');
    }
    public function actionIPCRinterpolview()
    {
    	$this->render('IPCRinterpolview');
    }
    public function actionIPCRInterpolationSheet2()
    {
    	$this->render('IPCRInterpolationSheet2');
    }
    public function actionIPCRInterpolationcomputable()
    {
    	$this->render('IPCRInterpolationcomputable');
    }
    public function actionIPCRInterpolation()
    {
    	$this->render('IPCRInterpolation');
    }
    public function actionIPCRform12()
    {
    	if(isset($_GET['m'],$_GET['ye'],$_GET['fcode']))
    	{
        	$m = $_GET['m'];
        	$ye = $_GET['ye'];
        	$fcode = $_GET['fcode'];
    	}
		$datasp = TblIpcr1::model()->getIPCR1datasp($ye,$fcode);
		$datacf = TblIpcr1::model()->getIPCR1datacf($ye,$fcode);
		$datasf = TblIpcr1::model()->getIPCR1datasf($ye,$fcode);

		// echo "<pre>";
		// print_r($datasp);
		// echo "</pre>"; 

		$this->render('IPCRform12', array(
			'infosp' => $datasp,
			'infocf' => $datacf,
			'infosf' => $datasf,
			'm' => $m,
			'ye' => $ye,
			'fcode' => $fcode
		));
    }
   	public function actionIPCRform1dummy()
   	{
   		if(isset($_GET['m'],$_GET['ye'],$_GET['fcode']))
    	{
        	$m = $_GET['m'];
        	$ye = $_GET['ye'];
        	$fcode = $_GET['fcode'];
    	}
		$datasp = TblIpcr1::model()->getIPCR1datasp($ye,$fcode);
		$datacf = TblIpcr1::model()->getIPCR1datacf($ye,$fcode);
		$datasf = TblIpcr1::model()->getIPCR1datasf($ye,$fcode);

		// echo "<pre>";
		// print_r($datasp);
		// echo "</pre>"; 

		$this->render('IPCRform1dummy', array(
			'infosp' => $datasp,
			'infocf' => $datacf,
			'infosf' => $datasf,
			'm' => $m,
			'ye' => $ye,
			'fcode' => $fcode
		));
   		//$this->render('IPCRform1dummy');
   	}
   	public function actionprocessRating()
   	{
   		$this->render('processRating');
   	}
   	public function actionprocessfeedback()
   	{
   		$this->render('processfeedback');
   	}
    public function actionprocessIPCRapproval()
	{
		$this->render('processIPCRapproval');
	}
    public function actionprocessAddRemarks()
	{
		$this->render('processAddRemarks');
	}
	/////////////////////////////////////////
	public function actionIPCRemailtemplate()
	{
		$this->render('IPCRemailtemplate');
	}
	public function actionIPCRreport3()
	{
		$this->render('IPCRreport3');
	}
	public function actionIPCRreport2()
	{
		$this->render('IPCRreport2');
	}
	public function actionIPCRreport1()
	{
		$this->render('IPCRreport1');
	}
	public function actionIPCRapproval()
	{
		$this->render('IPCRapproval');
	}
	public function actionprocessCleardeadline()
	{
		$this->render('processCleardeadline');
	}
	public function actionprocessSetdeadline()
	{
		$this->render('processSetdeadline');
	}
	public function actionIPCRsetdeadline()
	{
		$this->render('IPCRsetdeadline');
	}
	public function actionIPCRtagvisible()
	{
		$this->render('IPCRtagvisible');
	}
	public function actionIPCRgetlist()
	{
		$this->render('IPCRgetlist');
	}
	public function actionIPCRviewprocess()
	{
		$this->render('IPCRviewprocess');
	}
	public function actionIPCRevaluation()
	{
		$this->render('IPCRevaluation');
	}
	public function actionIPCRview()
	{
		if(isset($_GET['m'],$_GET['y'],$_GET['fcode']))
    	{
        	$m = $_GET['m'];
        	$y = $_GET['y'];
        	$fcode = $_GET['fcode'];
    	}
		$datasp = TblIpcr1::model()->getIPCR1datasp($y,$fcode);
		$datacf = TblIpcr1::model()->getIPCR1datacf($y,$fcode);
		$datasf = TblIpcr1::model()->getIPCR1datasf($y,$fcode);
		$data2sp = TblIpcr2::model()->getIPCR2datasp($y,$fcode);
		$data2cf = TblIpcr2::model()->getIPCR2datacf($y,$fcode);
		$data2sf = TblIpcr2::model()->getIPCR2datasf($y,$fcode);

		// echo "<pre>";
		// print_r($datasp);
		// echo "</pre>";
		$this->render('IPCRview', array(
			'variablecf' => $datacf, 
			'variablesf' => $datasf ,
			'variablesp' => $datasp, 
			'variable2sp' => $data2sp,
			'variable2cf' => $data2cf,
			'variable2sf' => $data2sf,
			'fcode' => $fcode, 
			'm' => $m, 
			'y' => $y
		));
	}
	public function actionIPCRlist()
	{
		$this->render('IPCRlist');
	}
	public function actionfaculty_search()
	{
		$this->render('faculty_search');
	}
	public function actionIPCRratingsremarks()
	{
		$this->render('IPCRratingsremarks');
	}
	public function actionEditIPCRrow2()
	{
		$this->render('EditIPCRrow2');
	}
	public function actionprocessDeleteIPCRinfo2()
	{
		$this->render('processDeleteIPCRinfo2');
	}
	public function actionprocessEditIPCR2()
	{
		$this->render('processEditIPCR2');
	}
	public function actionProcessIPCRinfo2()
	{
		$this->render('ProcessIPCRinfo2');
	}
	public function actionIPCRaddrow2()
	{
		$this->render('IPCRaddrow2');
	}
	public function actionIPCRgenerate()
	{
		$this->render('IPCRgenerate');
	}
	public function actionIPCRsendEmail()
	{
		$this->render('IPCRsendEmail');
	}
	public function actionIPCRemailnotif()
	{
		$this->render('IPCRemailnotif');
	}
	public function actionprocessEditIPCR()
	{
		$this->render('processEditIPCR');
	}
	public function actionEditIPCRrow()
	{
		$this->render('EditIPCRrow');
	}
	public function actionprocessDeleteIPCRinfo()
	{
		$this->render('processDeleteIPCRinfo');
	}
	public function actionProcessIPCRinfo()
	{
		$this->render('ProcessIPCRinfo');
	}
	public function actionIPCRcreatejultodec()
	{
		$this->render('IPCRcreatejultodec');
	}
	public function actionIPCRcreatejantojune()
	{
		$this->render('IPCRcreatejantojune');
	}
	public function actionIPCRaddrow()
	{
		$this->render('IPCRaddrow');
	}
	public function actionIPCRform2()
	{
		if(isset($_GET['m'],$_GET['ye'],$_GET['fcode']))
    	{
        	$m = $_GET['m'];
        	$ye = $_GET['ye'];
        	$fcode = $_GET['fcode'];
    	}
		$datasp = TblIpcr2::model()->getIPCR2datasp($ye,$fcode);
		$datacf = TblIpcr2::model()->getIPCR2datacf($ye,$fcode);
		$datasf = TblIpcr2::model()->getIPCR2datasf($ye,$fcode);

		$this->render('IPCRform2', array(
			'infosp' => $datasp,
			'infocf' => $datacf,
			'infosf' => $datasf,
			'm' => $m,
			'ye' => $ye,
			'fcode' => $fcode
		));
	
		//$this->render('IPCRform2');
	}
	public function actionIPCRform1()
	{
		if(isset($_GET['m'],$_GET['ye'],$_GET['fcode']))
    	{
        	$m = $_GET['m'];
        	$ye = $_GET['ye'];
        	$fcode = $_GET['fcode'];
    	}
		$datasp = TblIpcr1::model()->getIPCR1datasp($ye,$fcode);
		$datacf = TblIpcr1::model()->getIPCR1datacf($ye,$fcode);
		$datasf = TblIpcr1::model()->getIPCR1datasf($ye,$fcode);

		// echo "<pre>";
		// print_r($datasp);
		// echo "</pre>"; 

		$this->render('IPCRform1', array(
			'infosp' => $datasp,
			'infocf' => $datacf,
			'infosf' => $datasf,
			'm' => $m,
			'ye' => $ye,
			'fcode' => $fcode
		));
		//$this->render('IPCRform1');
	}
	public function actionIPCRmenu()
	{
		$this->render('IPCRmenu');
	}
	public function actionIPCRcreate()
	{
		$this->render('IPCRcreate');
	}
	public function actionIPCR()
	{
		$this->render('IPCR');
	}

	//////////////////////////////	END  IPCR CONTROLLER/////////////////////////////











	//////////////////////////////////  DTR!!! ///////////////////

	public function actiondtr_months() // dtr
	{
		$this->render('dtr_sample');
	}


	public function actionPreview_dtr() // dtr
	{
		$var = Yii::app()->session['fetch_use_id'];
		$preview_value = 0;
		$this->render('daily_time_record',array('preview_value' => $preview_value));
	}

	public function actiondaily_time_record() // dtr
	{
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	        $this->CheckEmpID($_SESSION['CEmpID']);
	    } 
		$var = Yii::app()->session['fetch_use_id'];
		$preview_value = 0;
		$this->render('daily_time_record',array('preview_value' => $preview_value));
	}


	public function actionDtrTable() // dtr
	{
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	        $this->CheckEmpID($_SESSION['CEmpID']);
	    } 
		$var = Yii::app()->session['fetch_use_id'];
		$preview_value = 1;
		$this->render('daily_time_record',array('preview_value' => $preview_value));
	}


	public function actionFetchDtrSched() // dtr
	{
		$val1 = $_POST['val1'];
		$val3 = $_POST['val3'];
		$val4 = $_POST['val4'];
		$result = TblSchedule::model()->fetch_loadtype($val1,$val3,$val4);
		$count = 0;
		//$this->render('daily_time_record',array('data' => $result, 'timeproff' => $timeprof));
		foreach($result as $rows) {
			$sy[] = $rows['schoolYear'];
			$sprof[] = $rows['sprof'];
			$sday[] = $rows['sday'];
			$stitle[] = $rows['stitle'];
			$stimeS[] = $rows['stimeS'];
			$stimeE[] = $rows['stimeE'];
			$sday2[] = $rows['sday2'];
			$stimeS2[] = $rows['stimeS2'];
			$stimeE2[] = $rows['load_type'];
			$count++;
		}
		echo json_encode(array('sy' => $sy, 'sprof' => $sprof,'sday' => $sday,'stitle' => $stitle,'stimeS' => $stimeS,'stimeE' => $stimeE,'sday2' => $sday2,'stimeS2' => $stimeS2,'stimeE2' => $stimeE2,'count' => $count)); 
		
	}


	public function actionRegular_DTR() // dtr
	{
		
		$val1 = $_POST['val1'];
		$val2 = $_POST['val2'];
		$val3= $_POST['val3'];
		$val4 = $_POST['val4'];
		$val5= $_POST['val5'];
		$val6= $_POST['val6'];
		$val7= $_POST['val7'];
		$val8= $_POST['val8'];
		$val9 = $_POST['val9'];
		$val10 = $_POST['val10'];
		echo json_encode(array('firstid' => $val1,'firstreg' => $val2,'firstmon' => $val3,'firstyear' => $val4,'firstfcode' => $val5,'secondid' => $val6,'secondreg' => $val7,'secondmon' => $val8,'secondyear' => $val9,'secondfcode'=>$val10));
		// $result = TblSchedule::model()->fetch_sched($val1,$val2,$val3,$val4,$val5);
		// echo json_encode(array('result' => $result)); 
		
	}


	public function actionRegular_DTRgoto($val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10) // dtr
	{
		$this->render('Regular_DTR',array('firstid' => $val1,'firstreg' => $val2,'firstmon' => $val3,'firstyear' => $val4,'firstfcode' => $val5,'secondid' => $val6,'secondreg' => $val7,'secondmon' => $val8,'secondyear' => $val9,'secondfcode'=>$val10));
		
	}

	public function actionHap_checkDtr($val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8) // dtr
	{
		$this->render('regular_DTR_single',array('firstid' => $val1,'firstreg' => $val2,'firstmon' => $val3,'firstyear' => $val4,'firstfcode' => $val5,'firstsurname' => $val6,'firstfirstname' => $val7,'firstmiddlename' => $val8));
	}

	public function actionHap_generate_rd() // dtr
	{
		$val1 = $_GET['val1'];
		$val2 = $_GET['val2'];
		$val3 = $_GET['val3'];
		$val4 = $_GET['val4'];
		$val5 = $_GET['val5'];
		$val6 = $_GET['val6'];
		$val7 = $_GET['val7'];
		$val8 = $_GET['val8'];
		$val9 = $_GET['val9'];
		$val10 = $_GET['val10'];
		$val11 = $_GET['val11'];
		$val12 = $_GET['val12'];

		$this->render('receiving_document',array('month_input' => $val1,'name_of_sender' => $val2,'position_of_sender' => $val3,'department_name' => $val4,'dear' => $val5,'paragraph_text' => $val6,'paragraph_text2' => $val7,'paragraph_text3' => $val8,'paragraph_text4' => $val9,'paragraph_text_reg' => $val10,'paragraph_text_pt' => $val11,'paragraph_text_ts' => $val12));
	}
 

	public function Update_status()
	{
		$fcode = $_POST['val1'];
		$result = TblSchedule::model()->Update_status($fcode);
	}

	public function actionHap_post()  // dtr
	{
		$id = $_POST['val1'];
		$approval = $_POST['val2'];
		$comments = $_POST['val3'];
		$result = TblSchedule::model()->update_by_hap($id,$approval,$comments);
		
	}



	public function actionResubmit() // dtr
	{
		$id_array = $_POST['val1'];
		$result = TblSchedule::model()->update_by_resubmit($id_array);
		
	}
	
	public function actionDelete_dtr() // dtr
	{
		include('config.php');
		$id_array = $_POST['val2'];
		$result = TblSchedule::model()->soft_delete($id_array);
		
	}

	public function actionRestore_dtr() // dtr
	{
		$id_array = $_POST['val1'];
		$result = TblSchedule::model()->restore_deleted($id_array);
		
	}

	public function actionHAP_Secretary_table() // dtr
	{
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	        $this->CheckEmpID($_SESSION['CEmpID']);
	    } 
		$var = Yii::app()->session['fetch_use_id'];
		$preview_value = 3; // 3 for maam tess receiving list of approved DTRs
		$this->render('daily_time_record',array('preview_value' => $preview_value));
		// $this->render('docusample');
	}

	public function actionDtr_Email()
	{
		// if(!isset($_SESSION)) 
	 //    { 
	 //        session_start(); 
	 //        $this->CheckEmpID($_SESSION['CEmpID']);
	 //    } 

	    $preview_value = 4; // 3 for maam tess receiving list of approved DTRs
		$this->render('dtr_email',array('preview_value' => $preview_value));

	}

	public function actionListOfFac()
	{
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	        $this->CheckEmpID($_SESSION['CEmpID']);
	    } 
		$var = Yii::app()->session['fetch_use_id'];
		$preview_value = 4; // 2 for checking DTRs
		$this->render('daily_time_record',array('preview_value' => $preview_value));


	}

	public function actionDtr_send_email()
	{
		$this->render("dtr_send_email");
	}

	public function actiondtr_email_template()
	{
		$this->render("dtr_email_template");
	}

	public function actionDtr_Form()
	{
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	        $this->CheckEmpID($_SESSION['CEmpID']);
	    } 

	    $preview_value = 3; // 3 for maam tess receiving list of approved DTRs
		$this->render('dtr_form');

	}



	public function actionHAPDtrTable() // dtr
	{
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	        $this->CheckEmpID($_SESSION['CEmpID']);
	    } 
		$var = Yii::app()->session['fetch_use_id'];
		$preview_value = 2; // 2 for checking DTRs
		$this->render('daily_time_record',array('preview_value' => $preview_value));
	}
	
	public function actionPart_Time_DTR() // dtr
	{
		$this->render('Part_Time_DTR');
	}

	public function actionDtrSendEmail()
	{
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$message .= '<br><br><br>Click <a href="http://puptaguig.org/FSISCS">http://fsiscs.puptaguigcs.net/</a> to visit our website.';

		$receipients = TblEvaltest::model()->findAll();	//Uncomment this for testing the email
		// $recipients = TblEvaluationfaculty::model()->EmailFaculty(); //Uncomment this for production
		if(!empty($receipients)) {
			foreach ($receipients as $row) {
				$mail = new YiiMailer;

				// $mail->isSMTP();   // Uncomment this line on testing server                                  
				//Uncomment this when testing on the local server such as xampp
				$mail->SMTPDebug  = 1;                                  
				$mail->Host = "smtp.gmail.com";  
				$mail->SMTPAuth = true;                           
				$mail->Username = 'puptfsis2022@gmail.com';                
				$mail->Password = '@PUPTfsis2022';                          
				$mail->SMTPSecure = 'ssl';                            
				$mail->Port = 465; 

				//Uncomment this following lines when the project is uploaded on the hostinger
				/*$mail->SMTPDebug  = 1;                                  
				$mail->Host = "smtp.hostinger.com";  
    			$mail->SMTPAuth = true;                           
    			$mail->Username = 'fsiscs@puptaguigcs.net';                
    			$mail->Password = 'FsiscsEmail@2022';                          
    			$mail->SMTPSecure = 'ssl';                            
    			$mail->Port = 465;

    			$mail->setFrom('fsiscs@puptaguigcs.net', 'PUPT FSIS');*/                                 

				$mail->setFrom('puptfsis2022@gmail.com', 'PUPT-FSIS');

				
				$mail->AddAddress($row['email'], $row['firstname']);  
				// $mail->AddAddress("fernannagrampa@gmmail.com", "fernan");     

				

				$mail->isHTML(true);                                  

				$mail->Subject = $subject;
				$mail->Body    = $message;
				$mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';

				if(!$mail->send()) {
					echo "<script>window.location.assign('index.php?r=administrator/other&mes=2')</script>";
				} else {
					echo "<script>window.location.assign('index.php?r=administrator/other&mes=1')</script>";
				}
			}
		} else {
				echo "<script>window.location.assign('index.php?r=administrator/other&mes=2')</script>";
		}
		
		
		// $this->render('sendEmail');
	}

	public function actionTemporary_Substitution_DTR() // dtr
	{
		$this->render('Temporary_Substitution_DTR');
	}


	public function actionPhpword()
	{
		$this->render('PhpWord');

	}

	public function actionTransmittal_form()
	{
		$this->render('transmittal_form');

	}

	public function actionApprove_all()
	{
		$approve = TblSchedule::model()->approve_all();
		header("location: index.php?r=administrator/HAPDtrTable&sort=pending");
	}

	public function actionPending_all()
	{
		$pending = TblSchedule::model()->pending_all();
		header("location: index.php?r=administrator/HAPDtrTable&sort=pending");
		
		
		// return $pending;

	}
	










	//////////////////////////////////  DTR!!! ///////////////////


	// End of February 14, 2018 //
	public function action()
	{
		$this->render('');

	}
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
