<?php



class FacultyController extends Controller

{

	public function actionIndex()

	{

		$this->render('index');

	}

	public function actionEb()

	{

		$this->render('eb');

	}

	public function actionFb()

	{

		$this->render('fb');

	}

	public function actionLogout()

	{

		$this->render('logout');

	}

	public function actionPi()

	{

		$this->render('pi');

	}

	public function actionProcessUpdateEB()

	{

		$this->render('processUpdateEB');

	}

	public function actionProcessUpdateFB()

	{

		$this->render('processUpdateFB');

	}

	public function actionProcessUpdatePI()

	{

		$this->render('processUpdatePI');

	}

	public function actionProcessUpdateWE()

	{

		$this->render('processUpdateWE');

	}

	public function actionUeb()

	{

		$this->render('ueb');

	}

	public function actionUfa()

	{

		$this->render('ufa');

	}

	public function actionUfb()

	{

		$this->render('ufb');

	}

	public function actionWe()

	{

		$this->render('we');

	}

	public function actionWorks()

	{

		$this->render('works');

	}

	public function actionUpi()

	{

		$this->render('Upi');

	}

	public function actionUebl()

	{

		$this->render('uebl');

	}

	public function actionAebl()

	{

		$this->render('aebl');

	}

	public function actionProcessInsertEBL()

	{

		$this->render('processInsertEBL');

	}

	public function actionCreb()

	{

		$this->render('creb');

	}

	public function actionReb()

	{

		$this->render('reb');

	}

	public function actionPrintAllCertificates()
	{
		$this->render('PrintAllCertificates');
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

	public function actionAwe()

	{

		$this->render('awe');

	}

	public function actionAfb()

	{

		$this->render('afb');

	}

	public function actionAccSettings()

	{

		$this->render('AccSettings');

	}

	public function actionCas()

	{

		$this->render('cas');

	}

	public function actionProcessUpdateAccSettings()

	{

		$this->render('processUpdateAccSettings');

	}

	public function actionCommunitySE()

	{

		$this->render('communitySE');

	}

	public function actionNewCSE()

	{

		$this->render('NewCSE');

	}

	public function actionProcessInsertSA()

	{

		$this->render('ProcessInsertSA');

	}

	// public function actionProcessInsertPROpuptaguig.puptaguig.org()

    public function actionProcessInsertPROORG()
    {
		// $this->render('ProcessInsertPROpuptaguig.puptaguig.org');

		$this->render('ProcessInsertPROORG');
    }



	public function actionProcessInsertSCHO()

	{

		$this->render('ProcessInsertSCHO');

	}

	public function actionProcessInsertRP()

	{

		$this->render('ProcessInsertRP');

	}

	public function actionCrwe()

	{

		$this->render('crwe');

	}

	public function actionRwe()

	{

		$this->render('rwe');

	}

	public function actionAnnouncements()

	{

		$this->render('Announcements');

	}

	public function actionEvents()

	{

		$this->render('events');

	}

	public function actionMessages()

	{

		$this->render('messages');

	}

	public function actionGetAnnouncements()

	{

		$this->render('GetAnnouncements');

	}

	public function actionProcessInsertCSE()

	{

		$this->render('processInsertCSE');

	}

	public function actionUpdateCSE()

	{

		$this->render('updateCSE');

	}



	// VOLUNTARY WORK

	public function actionVoluntaryWork()

	{

		$this->render('VoluntaryWork');

	}

	public function actionRvw()

	{

		$this->render('rvw');

	}

	public function actionProcessInsertVWork()

	{

		$this->render('ProcessInsertVWork');

	}

	public function actionProcessUpdateVWork()

	{

		$this->render('ProcessUpdateVWork');

	}

	public function actionVworks()

	{

		$this->render('vworks');

	}

	public function actionCrvw()

	{

		$this->render('crvw');

	}

	public function actionVoluntaryWorkNew()

	{

		$this->render('VoluntaryWorkNew');

	}

	public function actionVwInfo()

	{

		$this->render('vwinfo');

	}

	public function actionRtp()

	{

		$this->render('rtp');

	}

	public function actionProcessUpdateTP()

	{

		$this->render('ProcessUpdateTP');

	}



	// TRAINING PROGRAMS

	public function actionTrainingPrograms()

	{

		$this->render('TrainingPrograms');

	}

	public function actionTrainingProgramNew()

	{

		$this->render('TrainingProgramNew');

	}

	public function actionProcessInsertTP()

	{

		$this->render('ProcessInsertTP');

	}

	public function actionTprograms()

	{

		$this->render('tprograms');

	}

	public function actionTpinfo()

	{

		$this->render('tpinfo');

	}

	public function actionCrtp()

	{

		$this->render('crtp');

	}



	// OTHER INFORMATION

	public function actionOtherInformation()

	{

		$this->render('OtherInformation');

	}

		// SPECIAL SKILLS AND HOBBIES

	public function actionGskh()

	{

		$this->render('Gskh');

	}

	public function actionProcessUpdateSKH()

	{

		$this->render('ProcessUpdateSKH');

	}

	public function actionCrskh()

	{

		$this->render('Crskh');

	}

	public function actionRskh()

	{

		$this->render('Rskh');

	}

	public function actionNewSKH()

	{

		$this->render('NewSKH');

	}

		// NON-ACADEMIC DISTINCTIONS OR RECOGNITION

	public function actionGnadr()

	{

		$this->render('Gnadr');

	}

	public function actionProcessUpdateNADR()

	{

		$this->render('ProcessUpdateNADR');

	}

	public function actionCrNADR()

	{

		$this->render('Crnadr');

	}

	public function actionRnadr()

	{

		$this->render('Rnadr');

	}

	public function actionNewNADR()

	{

		$this->render('NewNADR');

	}

		// MEMBERSHIP IN ASSOCIATION OR puptaguig.puptaguig.orgANIZATION

	public function actionGmiao()

	{

		$this->render('Gmiao');

	}

	public function actionProcessUpdateMIAO()

	{

		$this->render('ProcessUpdateMIAO');

	}

	public function actionCrMIAO()

	{

		$this->render('Crmiao');

	}

	public function actionRmiao()

	{

		$this->render('Rmiao');

	}

	public function actionNewMIAO()

	{

		$this->render('NewMIAO');

	}



	// REFERENCES

	public function actionReferences()

	{

		$this->render('References');

	}

	public function actionReferenceList()

	{

		$this->render('ReferenceList');

	}

	public function actionReferencesNew()

	{

		$this->render('ReferencesNew');

	}

	public function actionProcessInsertREF()

	{

		$this->render('ProcessInsertREF');

	}

	public function actionProcessUpdateREF()

	{

		$this->render('ProcessUpdateREF');

	}

	public function actionRefinfo()

	{

		$this->render('Refinfo');

	}

	public function actionCrref()

	{

		$this->render('crref');

	}

	public function actionRref()

	{

		$this->render('rref');

	}



	// TAX CERTIFICATE

	public function actionTaxCertificate()

	{

		$this->render('TaxCertificate');

	}

	public function actionTaxCertificateUpdate()

	{

		$this->render('TaxCertificateUpdate');

	}

	public function actionTaxinfo()

	{

		$this->render('taxinfo');

	}

	public function actionCrtc()

	{

		$this->render('crtc');

	}

	public function actionRtc()

	{

		$this->render('rtc');

	}

	public function actionProcessUpdateTC()

	{

		$this->render('ProcessUpdateTC');

	}



	// PERSONAL DATA SHEET

	public function actionPDS()

	{

		$this->render('PDS');

	}

	public function actionMyPDS()

	{

		$this->render('MyPDS');

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

	public function actionChildInfo()

	{

		$this->render('childInfo');

	}

	public function actionCrch()

	{

		$this->render('crch');

	}

	public function actionProcessUpdateCI()

	{

		$this->render('processUpdateCI');

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

	public function actionNewTC()

	{

		$this->render('newTC');

	}

	public function actionProcessInsertTC()

	{

		$this->render('processInsertTC');

	}

	public function actionQuestions()

	{

		$this->render('Questions');

	}

	public function actionProcessSaveAnswers()

	{

		$this->render('processSaveAnswers');

	}

	public function actionFAQs()

	{

		$this->render('FAQs');

	}

	public function actionQuickGuide()

	{

		$this->render('QuickGuide');

	}

	public function actionUwe()

	{

		$this->render('uwe');

	}

	public function actionUpdateWE()

	{

		$this->render('UpdateWE');

	}

	public function actionProcessSaveSchedPref()

	{

		$this->render('processSaveSchedPref');

	}

	public function actionSchedulePreference()

	{

		$this->render('SchedulePreference');

	}

	public function actionSchedPrefList()

	{

		$this->render('SchedPrefList');

	}

	public function actionPrintSchedPref()

	{

		$this->render('PrintSchedPref');

	}

	public function actionEditSchedPref()

	{

		$this->render('EditSchedPref');

	}

	public function actionProcessEditSchedPref()

	{

		$this->render('processEditSchedPref');

	}

	public function actionDeleteSchedPref()

	{

		$this->render('DeleteSchedPref');

	}

	public function actionProcessDeleteSchedPref()

	{

		$this->render('processDeleteSchedPref');

	}

	public function actionServiceCredit()

	{

		$this->render('ServiceCredit');

	}

	public function actionPrintServiceCredit()

	{

		$this->render('PrintServiceCredit');

	}

	public function actionTeachingLoad()

	{

		$this->render('TeachingLoad');

	}

	public function actionSubjectLoad()

	{

		$this->render('SubjectLoad');

	}

	public function actionSubjectPreference()

	{

		$this->render('SubjectPreference');

	}



	public function actionSubjPrefer()

	{

		$this->render('SubjPrefer');

	}



	public function actionSubjectMenu()

	{

		$this->render('SubjectMenu');

	}



	public function actionSubjPreferALL()

	{

		$this->render('SubjPreferALL');

	}



	public function actiontagSubjects()

	{

		$this->render('tagSubjects');

	}



	public function actionTagSchedules()

	{

		$this->render('TagSchedules');

	}



	public function actionAddTimePrefer()

	{

		$this->render('AddTimePrefer');

	}



	public function actionTimePrefer()

	{

		$this->render('TimePrefer');

	}



	public function actiontagSubjectspage()

	{

		$this->render('tagSubjectspage');

	}



	public function actionTagSubjectADD()

	{

		$this->render('TagSubjectADD');

	}



	public function actionDeleteTagged()

	{

		$this->render('DeleteTagged');

	}



	public function actionTimePreferProcessADD()

	{

		$this->render('TimePreferProcessADD');

	}



	public function actionDeletetimePrefer()

	{

		$this->render('DeletetimePrefer');

	}



	public function actionUpdateTimePrefer()

	{

		$this->render('UpdateTimePrefer');

	}



	public function actionTimePreferProcessUPDATE()

	{

		$this->render('TimePreferProcessUPDATE');

	}


	public function actionfacultyrequest()
	{
		$this->render('facultyrequest');
	}
		public function actionviewfacultyrequest()
	{
		$this->render('viewfacultyrequest');
	}
	public function actionprocessrequestsched()
	{
		$this->render('processrequestsched');
	}

	public function actionprocessrequestscheddelete()
	{
		$this->render('processrequestscheddelete');
	}

	public function actionfacultyview()
	{
		$this->render('facultyview');
	}





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
