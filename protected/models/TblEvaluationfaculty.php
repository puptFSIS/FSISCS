<?php

/**
 * This is the model class for table "tbl_evaluationfaculty".
 *
 * The followings are the available columns in table 'tbl_evaluationfaculty':
 * @property string $FCode
 * @property string $password
 * @property string $enu_employmentStat
 * @property string $LName
 * @property string $FName
 * @property string $MName
 * @property string $Mobile
 * @property string $Email
 * @property integer $int_courseGroup
 * @property string $evalRoles
 * @property integer $SecQuestion
 * @property string $SecAnswer
 * @property string $Title
 * @property integer $InventoryUser
 * @property string $EmpID
 * @property integer $isAdmin
 * @property string $status
 * @property string $userlevelid
 * @property string $userimage
 * @property integer $FAdmin
 * @property integer $FacultyID
 * @property string $yearAdded
 * @property integer $latestCount
 * @property string $empNumber
 * @property integer $branch_id
 * @property integer $fpes_id
 * @property integer $standings
 * @property string $category
 */
class TblEvaluationfaculty extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_evaluationfaculty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FCode, password, enu_employmentStat, LName, FName, MName, Mobile, Email, int_courseGroup, SecQuestion, InventoryUser, EmpID, isAdmin, status, userlevelid, userimage, FAdmin, FacultyID, yearAdded, latestCount, empNumber, branch_id, fpes_id, standings', 'required'),
			array('int_courseGroup, SecQuestion, InventoryUser, isAdmin, FAdmin, FacultyID, latestCount, branch_id, fpes_id, standings', 'numerical', 'integerOnly'=>true),
			array('FCode, enu_employmentStat, LName, FName, MName, Email, evalRoles', 'length', 'max'=>50),
			array('password, EmpID, status', 'length', 'max'=>100),
			array('Mobile, empNumber', 'length', 'max'=>20),
			array('SecAnswer', 'length', 'max'=>200),
			array('Title', 'length', 'max'=>10),
			array('userlevelid, yearAdded', 'length', 'max'=>11),
			array('userimage', 'length', 'max'=>30),
			array('category', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('FCode, password, enu_employmentStat, LName, FName, MName, Mobile, Email, int_courseGroup, evalRoles, SecQuestion, SecAnswer, Title, InventoryUser, EmpID, isAdmin, status, userlevelid, userimage, FAdmin, FacultyID, yearAdded, latestCount, empNumber, branch_id, fpes_id, standings, category', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'FCode' => 'Fcode',
			'password' => 'Password',
			'enu_employmentStat' => 'Enu Employment Stat',
			'LName' => 'Lname',
			'FName' => 'Fname',
			'MName' => 'Mname',
			'Mobile' => 'Mobile',
			'Email' => 'Email',
			'int_courseGroup' => 'Int Course Group',
			'evalRoles' => 'Eval Roles',
			'SecQuestion' => 'Sec Question',
			'SecAnswer' => 'Sec Answer',
			'Title' => 'Title',
			'InventoryUser' => 'Inventory User',
			'EmpID' => 'Emp',
			'isAdmin' => 'Is Admin',
			'status' => 'Status',
			'userlevelid' => 'Userlevelid',
			'userimage' => 'Userimage',
			'FAdmin' => 'Fadmin',
			'FacultyID' => 'Faculty',
			'yearAdded' => 'Year Added',
			'latestCount' => 'Latest Count',
			'empNumber' => 'Emp Number',
			'branch_id' => 'Branch',
			'fpes_id' => 'Fpes',
			'standings' => 'Standings',
			'category' => 'Category',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('FCode',$this->FCode,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('enu_employmentStat',$this->enu_employmentStat,true);
		$criteria->compare('LName',$this->LName,true);
		$criteria->compare('FName',$this->FName,true);
		$criteria->compare('MName',$this->MName,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('int_courseGroup',$this->int_courseGroup);
		$criteria->compare('evalRoles',$this->evalRoles,true);
		$criteria->compare('SecQuestion',$this->SecQuestion);
		$criteria->compare('SecAnswer',$this->SecAnswer,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('InventoryUser',$this->InventoryUser);
		$criteria->compare('EmpID',$this->EmpID,true);
		$criteria->compare('isAdmin',$this->isAdmin);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('userlevelid',$this->userlevelid,true);
		$criteria->compare('userimage',$this->userimage,true);
		$criteria->compare('FAdmin',$this->FAdmin);
		$criteria->compare('FacultyID',$this->FacultyID);
		$criteria->compare('yearAdded',$this->yearAdded,true);
		$criteria->compare('latestCount',$this->latestCount);
		$criteria->compare('empNumber',$this->empNumber,true);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('fpes_id',$this->fpes_id);
		$criteria->compare('standings',$this->standings);
		$criteria->compare('category',$this->category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblEvaluationfaculty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function CheckProf(){
		$sql = "select FCODE, LName, FName, MName from tbl_evaluationfaculty";
		$row = Yii::app()->db->createCommand($sql)
		->queryAll();

		return $row;
	}

	public static function CheckSpecProf($fcode){
		$sql = "Select * from tbl_evaluationfaculty where FCODE = :fcode";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':fcode',$fcode)
		->queryRow();

		return $row;
	}

	public static function EmailFacultySpecific($proflist){
		$sql = "SELECT b.Email, a.LName, a.FName, a.MName from tbl_evaluationfaculty AS a inner join tbl_personalinformation AS b on a.FCode = b.FCode OR a.FCode = b.EmpID WHERE a.FCode = :fcode";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':fcode',$proflist)
		->queryAll();

		return $row;
	}

	public static function GetFcodeWithEmail(){
		$sql = "SELECT DISTINCT a.FCode, a.LName, a.FName from tbl_evaluationfaculty AS a inner join tbl_personalinformation AS b where a.status = :status AND b.email != '' AND a.FCode = b.FCode ORDER BY a.LName ASC";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':status','Active')
		->queryAll();

		return $row;
	}

	public static function GetFcode(){
		$sql = "Select FCode, LName, FName from tbl_evaluationfaculty where status = :status ORDER BY LName ASC";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':status','Active')
		->queryAll();

		return $row;
	}

	public static function GetActiveFacultyEmail(){
	    $sql = "SELECT b.Email, a.LName, a.FName, a.MName from tbl_evaluationfaculty AS a inner join tbl_personalinformation AS b on a.FCode = b.FCode OR a.FCode = b.EmpID WHERE a.status = :status AND b.Email != ''";
	    
	    $row = Yii::app()->db->createCommand($sql)
		->bindValue(':status','Active')
		->queryAll();

		return $row;
	}

	public function GetAllProf(){
		$sql = "SELECT * FROM tbl_evaluationfaculty ORDER BY LName AND status";

		$row = Yii::app()->db->createCommand($sql)
		->queryAll();

		return $row;
	}

	public function GetFacultyListWithSchedule($sem, $sy){
		$sql = "SELECT DISTINCT FCode, LName, FName, MName FROM tbl_evaluationfaculty as a INNER JOIN tbl_schedule as b on b.sprof = a.FCode WHERE b.sprof = a.FCode and b.sem = :sem and b.schoolYear = :sy and b.Sched_type = :st";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':sem', $sem)
		->bindValue(':sy', $sy)
		->bindValue(':st', 'OFFICIAL')
		->queryAll();

		return $row;
	}

}
