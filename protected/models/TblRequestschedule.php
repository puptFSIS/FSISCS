<?php

/**
 * This is the model class for table "tbl_requestschedule".
 *
 * The followings are the available columns in table 'tbl_requestschedule':
 * @property integer $request_id
 * @property integer $schedID
 * @property integer $currID
 * @property string $courseID
 * @property string $csection
 * @property string $cyear
 * @property string $scode
 * @property string $stitle
 * @property integer $units
 * @property string $lec
 * @property string $lab
 * @property string $sday
 * @property integer $stimeS
 * @property integer $stimeE
 * @property string $sroom
 * @property string $sprof
 * @property integer $sem
 * @property string $schoolYear
 * @property string $status
 * @property string $datemodified
 * @property string $daterequested
 * @property string $reason
 * @property string $sday2
 * @property string $stimeS2
 * @property string $stimeE2
 * @property string $sroom2
 * @property string $uploaded_file
 * @property integer $load_type
 */
class TblRequestschedule extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_requestschedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schedID, currID, courseID, csection, cyear, scode, stitle, units, lec, lab, sday, stimeS, stimeE, sroom, sprof, sem, schoolYear, status, datemodified, daterequested, reason, sday2, stimeS2, stimeE2, sroom2, load_type', 'required'),
			array('schedID, currID, units, stimeS, stimeE, sem, load_type', 'numerical', 'integerOnly'=>true),
			array('courseID, lec, lab', 'length', 'max'=>10),
			array('csection, cyear, sday, sday2', 'length', 'max'=>5),
			array('scode, sroom, schoolYear, sroom2', 'length', 'max'=>50),
			array('stitle, sprof', 'length', 'max'=>100),
			array('status, reason', 'length', 'max'=>255),
			array('stimeS2, stimeE2', 'length', 'max'=>11),
			array('uploaded_file', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('request_id, schedID, currID, courseID, csection, cyear, scode, stitle, units, lec, lab, sday, stimeS, stimeE, sroom, sprof, sem, schoolYear, status, datemodified, daterequested, reason, sday2, stimeS2, stimeE2, sroom2, uploaded_file, load_type', 'safe', 'on'=>'search'),
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
			'request_id' => 'Request',
			'schedID' => 'Sched',
			'currID' => 'Curr',
			'courseID' => 'Course',
			'csection' => 'Csection',
			'cyear' => 'Cyear',
			'scode' => 'Scode',
			'stitle' => 'Stitle',
			'units' => 'Units',
			'lec' => 'Lec',
			'lab' => 'Lab',
			'sday' => 'Sday',
			'stimeS' => 'Stime S',
			'stimeE' => 'Stime E',
			'sroom' => 'Sroom',
			'sprof' => 'Sprof',
			'sem' => 'Sem',
			'schoolYear' => 'School Year',
			'status' => 'Status',
			'datemodified' => 'Datemodified',
			'daterequested' => 'Daterequested',
			'reason' => 'Reason',
			'sday2' => 'Sday2',
			'stimeS2' => 'Stime S2',
			'stimeE2' => 'Stime E2',
			'sroom2' => 'Sroom2',
			'uploaded_file' => 'Uploaded File',
			'load_type' => 'Load Type',
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

		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('schedID',$this->schedID);
		$criteria->compare('currID',$this->currID);
		$criteria->compare('courseID',$this->courseID,true);
		$criteria->compare('csection',$this->csection,true);
		$criteria->compare('cyear',$this->cyear,true);
		$criteria->compare('scode',$this->scode,true);
		$criteria->compare('stitle',$this->stitle,true);
		$criteria->compare('units',$this->units);
		$criteria->compare('lec',$this->lec,true);
		$criteria->compare('lab',$this->lab,true);
		$criteria->compare('sday',$this->sday,true);
		$criteria->compare('stimeS',$this->stimeS);
		$criteria->compare('stimeE',$this->stimeE);
		$criteria->compare('sroom',$this->sroom,true);
		$criteria->compare('sprof',$this->sprof,true);
		$criteria->compare('sem',$this->sem);
		$criteria->compare('schoolYear',$this->schoolYear,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('datemodified',$this->datemodified,true);
		$criteria->compare('daterequested',$this->daterequested,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('sday2',$this->sday2,true);
		$criteria->compare('stimeS2',$this->stimeS2,true);
		$criteria->compare('stimeE2',$this->stimeE2,true);
		$criteria->compare('sroom2',$this->sroom2,true);
		$criteria->compare('uploaded_file',$this->uploaded_file,true);
		$criteria->compare('load_type',$this->load_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblRequestschedule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function countRequests($sem, $sy){
		$sql = "SELECT * FROM tbl_requestschedule WHERE status = :status AND sem = :sem AND schoolYear = :sy";

		$result = Yii::app()->db->createCommand($sql)
		->bindValue(":status", "Pending")
		->bindValue(":sem",$sem)
		->bindValue(":sy", $sy)
		->queryAll();

		return $result;
	}
}
