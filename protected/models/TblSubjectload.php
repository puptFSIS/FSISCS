<?php

/**
 * This is the model class for table "tbl_subjectload".
 *
 * The followings are the available columns in table 'tbl_subjectload':
 * @property string $currID
 * @property integer $currYear
 * @property string $courseID
 * @property string $csection
 * @property string $cyear
 * @property string $scode
 * @property string $stitle
 * @property string $sunit
 * @property integer $sem
 * @property string $schoolYear
 * @property string $hrs_lec
 * @property string $hrs_lab
 * @property string $prereq
 */
class TblSubjectload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subjectload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currID, currYear, courseID, csection, cyear, scode, stitle, sunit, sem, schoolYear, hrs_lec, hrs_lab, prereq', 'required'),
			array('currYear, sem', 'numerical', 'integerOnly'=>true),
			array('currID, csection, cyear, sunit', 'length', 'max'=>5),
			array('courseID, hrs_lec, hrs_lab', 'length', 'max'=>10),
			array('scode, schoolYear, prereq', 'length', 'max'=>50),
			array('stitle', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('currID, currYear, courseID, csection, cyear, scode, stitle, sunit, sem, schoolYear, hrs_lec, hrs_lab, prereq', 'safe', 'on'=>'search'),
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
			'currYear' => 'Curr Year',
			'courseID' => 'Course',
			'csection' => 'Csection',
			'cyear' => 'Cyear',
			'scode' => 'Scode',
			'stitle' => 'Stitle',
			'sunit' => 'Sunit',
			'sem' => 'Sem',
			'schoolYear' => 'School Year',
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

		$criteria->compare('currID',$this->currID,true);
		$criteria->compare('currYear',$this->currYear);
		$criteria->compare('courseID',$this->courseID,true);
		$criteria->compare('csection',$this->csection,true);
		$criteria->compare('cyear',$this->cyear,true);
		$criteria->compare('scode',$this->scode,true);
		$criteria->compare('stitle',$this->stitle,true);
		$criteria->compare('sunit',$this->sunit,true);
		$criteria->compare('sem',$this->sem);
		$criteria->compare('schoolYear',$this->schoolYear,true);
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
	 * @return TblSubjectload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function SubjCurriculum($sem, $sy){
		$sql = "SELECT DISTINCT b.scode, b.stitle, b.hrs_lec, b.hrs_lab, b.sunit FROM tbl_subjects as a inner join tbl_subjectload as b on a.SubjCode = b.scode where b.schoolYear = :sy AND b.sem = :sem ORDER BY b.scode ASC";

		$result = Yii::app()->db->createCommand($sql)
	    ->bindValue(':sy', $sy)
	    ->bindValue(':sem', $sem)
	    ->queryAll();

	    return $result;
	}

	public static function GetCurrID(){
		$sql = "SELECT DISTINCT currID  FROM `tbl_subjectload` ORDER BY currID DESC";

		$result = Yii::app()->db->createCommand($sql)
		->queryAll();

		return $result;
	}

	public static function GetPrevCurriculum($currID){
		$sql = "SELECT DISTINCT * FROM `tbl_subjectload` WHERE currID = :currID";

		$result = Yii::app()->db->createCommand($sql)
		->bindValue(':currID', $currID)
		->queryAll();

		return $result;
	}

	public static function AllPrevCurriculum($currID){
		$sql = "SELECT * FROM `tbl_subjectload` WHERE currID = :currID";

		$result = Yii::app()->db->createCommand($sql)
		->bindValue(':currID', $currID)
		->queryAll();

		return $result;
	}

	public static function GetCurrentYear(){
		$sql = "SELECT DISTINCT schoolYear FROM `tbl_subjectload` ORDER BY schoolYear DESC LIMIT 1";

		$result = Yii::app()->db->createCommand($sql)
		->queryAll();

		return $result;
	}

	public static function GetCourseCurriculum($currID, $courseID){
		$sql = "SELECT * FROM tbl_subjectload WHERE currID = :currID AND courseID = :courseID";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':currID', $currID)
		->bindValue(':courseID', $courseID)
		->queryAll();

		return $row;
	}
}
