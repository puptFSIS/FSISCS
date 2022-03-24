<?php

class AdministratorController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionLogout()
	{
		$this->render('logout');
	}
	public function actionProfile()
	{
		$this->render('profile');
	}
	public function actionAccount()
	{
		$this->render('account');
	}
	public function actionSubject()
	{
		$this->render('subject');
	}
	public function actionOther()
	{
		$this->render('other');
	}
	public function actionFaculty()
	{
		$this->render('faculty');
	}
	public function actionReports()
	{
		$this->render('reports');
	}
	public function actionForms()
	{
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
		$this->render('lfa');
	}
	public function actionProcessInsertFA()
	{
		$this->render('processInsertFA');
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
		$this->render('view');
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
		$this->render('processSetSched');
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
		$this->render('curriculum');
	}
	public function actionViewCurriculum()
	{
		$this->render('Viewcurriculum');
	}
	public function actionProcessCurriculum()
	{
		$this->render('processCurriculum');
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
	public function actionSchedulingMenu()
	{
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
		$this->render('SchedulingSystem');
	}	
	public function actionSubjPrefer()
	{
		$this->render('SubjPrefer');
	}		
	public function actionDeletetimePrefer()
	{
		$this->render('DeletetimePrefer');
	}		
	public function actionTimePreferProcessUPDATE()
	{
		$this->render('TimePreferProcessUPDATE');
	}
	public function actionAddTimePrefer()
	{
		$this->render('AddTimePrefer');
	}		
	public function actionUpdateTimePrefer()
	{
		$this->render('UpdateTimePrefer');
	}		
	public function actionTimePreferProcessADD()
	{
		$this->render('TimePreferProcessADD');
	}	
	public function actiontagSubjectspage()
	{
		$this->render('tagSubjectspage');
	}	
	public function actionTagSubjectADD()
	{
		$this->render('TagSubjectADD');
	}
	public function actionSubjectManagement()
	{
		$this->render('SubjectManagement');
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
		$this->render('tagSubjects');
	}
	public function actionEditSubject()
	{
		$this->render('EditSubject');
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
		$this->render('setCurriculum');
	}
	public function actionAddCurrSubj()
	{
		$this->render('AddCurrSubj');
	}
	public function actionProcessAddCurrSubj()
	{
		$this->render('processAddCurrSubj');
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
		$this->render('BranchOfficials');
	}
	public function actionAdminStaff()
	{
		$this->render('AdminStaff');
	}
	public function actionNewFaculty()
	{
		$this->render('NewFaculty');
	}
	public function actionSecurityGuard()
	{
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
		$this->render('AddPrereq');
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
		$this->render('processAddSched');
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
		$this->render('RoomDailySched');
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
		$this->render('EditCurriculum');
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
	public function actionEditBO()
	{
		$this->render('EditBO');
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
		$this->render('sendEmail');
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
	    $this->render('InternalRoomDaily');
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


    // public function actionSubjectLoad()
    // {
    //     $this->render('SubjectLoad');
    // }
    
    // public function actionSubjectPreference()
    // {
    //     $this->render('SubjectPreference');
    // }
    
    // public function actionviewfacultyrequest()
    // {
    //     $this->render('viewfacultyrequest');
    // }

    // public function actionprocessrequestsched()
    // {
    //     $this->render('processrequestsched');
    // }







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
