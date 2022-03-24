<?php

/**
 * This is the model class for table "tbl_personalinformation".
 *
 * The followings are the available columns in table 'tbl_personalinformation':
 * @property integer $id
 * @property string $FCode
 * @property string $surname
 * @property string $firstname
 * @property string $middlename
 * @property string $nameExtension
 * @property string $birthdate
 * @property string $bmonth
 * @property string $bday
 * @property string $byear
 * @property string $birthplace
 * @property string $sex
 * @property string $civilStatus
 * @property string $citizenship
 * @property string $height
 * @property string $weight
 * @property string $bloodType
 * @property string $GSIS_ID_NO
 * @property string $PAGIBIG_ID_NO
 * @property string $PHILHEALTH_NO
 * @property string $SSS_NO
 * @property string $TIN_NO
 * @property string $zipCode
 * @property string $telNo
 * @property string $cellNo
 * @property string $email
 * @property string $residentialAddress
 * @property string $EmpID
 * @property string $permanentAddress
 * @property string $pzipCode
 * @property string $ptelNo
 * @property string $userID
 * @property string $password
 * @property integer $isAdmin
 * @property string $status
 */
class TblPersonalinformation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_personalinformation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FCode, surname, firstname, middlename, nameExtension, birthdate, bmonth, bday, byear, birthplace, sex, civilStatus, citizenship, height, weight, bloodType, GSIS_ID_NO, PAGIBIG_ID_NO, PHILHEALTH_NO, SSS_NO, TIN_NO, zipCode, telNo, cellNo, email, residentialAddress, EmpID, permanentAddress, pzipCode, ptelNo, userID, password, isAdmin, status', 'required'),
			array('isAdmin', 'numerical', 'integerOnly'=>true),
			array('FCode, byear, citizenship, ptelNo, userID, password, status', 'length', 'max'=>50),
			array('surname, firstname, middlename, GSIS_ID_NO, PAGIBIG_ID_NO, PHILHEALTH_NO, SSS_NO, TIN_NO, telNo, cellNo', 'length', 'max'=>30),
			array('nameExtension, bloodType', 'length', 'max'=>5),
			array('bmonth, bday, civilStatus, height, weight, pzipCode', 'length', 'max'=>20),
			array('birthplace, email, EmpID, permanentAddress', 'length', 'max'=>100),
			array('sex', 'length', 'max'=>6),
			array('zipCode', 'length', 'max'=>10),
			array('residentialAddress', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, FCode, surname, firstname, middlename, nameExtension, birthdate, bmonth, bday, byear, birthplace, sex, civilStatus, citizenship, height, weight, bloodType, GSIS_ID_NO, PAGIBIG_ID_NO, PHILHEALTH_NO, SSS_NO, TIN_NO, zipCode, telNo, cellNo, email, residentialAddress, EmpID, permanentAddress, pzipCode, ptelNo, userID, password, isAdmin, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'FCode' => 'Fcode',
			'surname' => 'Surname',
			'firstname' => 'Firstname',
			'middlename' => 'Middlename',
			'nameExtension' => 'Name Extension',
			'birthdate' => 'Birthdate',
			'bmonth' => 'Bmonth',
			'bday' => 'Bday',
			'byear' => 'Byear',
			'birthplace' => 'Birthplace',
			'sex' => 'Sex',
			'civilStatus' => 'Civil Status',
			'citizenship' => 'Citizenship',
			'height' => 'Height',
			'weight' => 'Weight',
			'bloodType' => 'Blood Type',
			'GSIS_ID_NO' => 'Gsis Id No',
			'PAGIBIG_ID_NO' => 'Pagibig Id No',
			'PHILHEALTH_NO' => 'Philhealth No',
			'SSS_NO' => 'Sss No',
			'TIN_NO' => 'Tin No',
			'zipCode' => 'Zip Code',
			'telNo' => 'Tel No',
			'cellNo' => 'Cell No',
			'email' => 'Email',
			'residentialAddress' => 'Residential Address',
			'EmpID' => 'Emp',
			'permanentAddress' => 'Permanent Address',
			'pzipCode' => 'Pzip Code',
			'ptelNo' => 'Ptel No',
			'userID' => 'User',
			'password' => 'Password',
			'isAdmin' => 'Is Admin',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('FCode',$this->FCode,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('middlename',$this->middlename,true);
		$criteria->compare('nameExtension',$this->nameExtension,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('bmonth',$this->bmonth,true);
		$criteria->compare('bday',$this->bday,true);
		$criteria->compare('byear',$this->byear,true);
		$criteria->compare('birthplace',$this->birthplace,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('civilStatus',$this->civilStatus,true);
		$criteria->compare('citizenship',$this->citizenship,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('bloodType',$this->bloodType,true);
		$criteria->compare('GSIS_ID_NO',$this->GSIS_ID_NO,true);
		$criteria->compare('PAGIBIG_ID_NO',$this->PAGIBIG_ID_NO,true);
		$criteria->compare('PHILHEALTH_NO',$this->PHILHEALTH_NO,true);
		$criteria->compare('SSS_NO',$this->SSS_NO,true);
		$criteria->compare('TIN_NO',$this->TIN_NO,true);
		$criteria->compare('zipCode',$this->zipCode,true);
		$criteria->compare('telNo',$this->telNo,true);
		$criteria->compare('cellNo',$this->cellNo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('residentialAddress',$this->residentialAddress,true);
		$criteria->compare('EmpID',$this->EmpID,true);
		$criteria->compare('permanentAddress',$this->permanentAddress,true);
		$criteria->compare('pzipCode',$this->pzipCode,true);
		$criteria->compare('ptelNo',$this->ptelNo,true);
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('isAdmin',$this->isAdmin);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblPersonalinformation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function GetEmail($proflist){
		$sql = "SELECT email, firstname, surname FROM `tbl_personalinformation` WHERE (EmpID = :empID OR FCode = :fcode) AND status = 'active'";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':empID', $proflist)
		->bindValue(':fcode', $proflist)
		->queryAll();

		return $row;
	}

	public static function GetFacultyInfo($empID){
		$sql = "SELECT * FROM `tbl_personalinformation` WHERE EmpID = :empID";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':empID', $empID)
		->queryRow();

		return $row;
	}
}
