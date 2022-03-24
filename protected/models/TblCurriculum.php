<?php

/**
 * This is the model class for table "tbl_curriculum".
 *
 * The followings are the available columns in table 'tbl_curriculum':
 * @property integer $currID
 * @property integer $courseID
 * @property integer $csection
 * @property integer $cyear
 * @property string $scode
 * @property string $stitle
 * @property integer $sunit
 * @property integer $sem
 * @property string $hrs_lec
 * @property string $hrs_lab
 * @property string $prereq
 */
class TblCurriculum extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_curriculum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currID, courseID, csection, cyear, scode, stitle, sunit, sem, hrs_lec, hrs_lab', 'required'),
			array('currID, courseID, csection, cyear, sunit, sem', 'numerical', 'integerOnly'=>true),
			array('scode, prereq', 'length', 'max'=>50),
			array('stitle', 'length', 'max'=>100),
			array('hrs_lec, hrs_lab', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('currID, courseID, csection, cyear, scode, stitle, sunit, sem, hrs_lec, hrs_lab, prereq', 'safe', 'on'=>'search'),
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
			'currID' => 'Curr',
			'courseID' => 'Course',
			'csection' => 'Csection',
			'cyear' => 'Cyear',
			'scode' => 'Scode',
			'stitle' => 'Stitle',
			'sunit' => 'Sunit',
			'sem' => 'Sem',
			'hrs_lec' => 'Hrs Lec',
			'hrs_lab' => 'Hrs Lab',
			'prereq' => 'Prereq',
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

		$criteria->compare('currID',$this->currID);
		$criteria->compare('courseID',$this->courseID);
		$criteria->compare('csection',$this->csection);
		$criteria->compare('cyear',$this->cyear);
		$criteria->compare('scode',$this->scode,true);
		$criteria->compare('stitle',$this->stitle,true);
		$criteria->compare('sunit',$this->sunit);
		$criteria->compare('sem',$this->sem);
		$criteria->compare('hrs_lec',$this->hrs_lec,true);
		$criteria->compare('hrs_lab',$this->hrs_lab,true);
		$criteria->compare('prereq',$this->prereq,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblCurriculum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function GetCurriculum($currID){
		$sql = "SELECT * FROM tbl_curriculum WHERE currID = :currID";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':currID', $currID)
		->queryAll();

		return $row;
	}

	public static function GetCourseCurriculum($currID, $courseID){
		$sql = "SELECT * FROM tbl_curriculum WHERE currID = :currID AND courseID = :courseID";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':currID', $currID)
		->bindValue(':courseID', $courseID)
		->queryAll();

		return $row;
	}

	public static function GetAllCurriculum($currID){
		$sql = "SELECT * FROM `tbl_curriculum` WHERE currID = :currID ORDER BY courseID, cyear ASC";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(":currID", $currID)
		->queryAll();

		return $row;
	}

	public static function DistinctCurriculum(){
		$sql = "SELECT DISTINCT currID FROM tbl_curriculum";

		$row = Yii::app()->db->createCommand($sql)
		->queryAll();

		return $row;
	}

	public static function SubjectCheck($currID, $scode){
		$sql = "SELECT * FROM tbl_curriculum WHERE currID = :currID AND scode = :scode";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':currID', $currID)
		->bindValue(':scode', $scode)
		->queryAll();

		return $row;
	}
}
