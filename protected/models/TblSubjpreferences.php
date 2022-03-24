<?php

/**
 * This is the model class for table "tbl_subjpreferences".
 *
 * The followings are the available columns in table 'tbl_subjpreferences':
 * @property integer $schedID
 * @property string $scode
 * @property string $stitle
 * @property integer $units
 * @property string $lec
 * @property string $lab
 * @property string $sprof
 * @property integer $sem
 * @property string $schoolYear
 */
class TblSubjpreferences extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subjpreferences';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('scode, stitle, units, lec, lab, sprof, sem, schoolYear', 'required'),
			array('units, sem', 'numerical', 'integerOnly'=>true),
			array('scode, schoolYear', 'length', 'max'=>50),
			array('stitle, sprof', 'length', 'max'=>100),
			array('lec, lab', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('schedID, scode, stitle, units, lec, lab, sprof, sem, schoolYear', 'safe', 'on'=>'search'),
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
			'schedID' => 'Sched',
			'scode' => 'Scode',
			'stitle' => 'Stitle',
			'units' => 'Units',
			'lec' => 'Lec',
			'lab' => 'Lab',
			'sprof' => 'Sprof',
			'sem' => 'Sem',
			'schoolYear' => 'School Year',
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

		$criteria->compare('schedID',$this->schedID);
		$criteria->compare('scode',$this->scode,true);
		$criteria->compare('stitle',$this->stitle,true);
		$criteria->compare('units',$this->units);
		$criteria->compare('lec',$this->lec,true);
		$criteria->compare('lab',$this->lab,true);
		$criteria->compare('sprof',$this->sprof,true);
		$criteria->compare('sem',$this->sem);
		$criteria->compare('schoolYear',$this->schoolYear,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblSubjpreferences the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function SelectProfSubPref($fcode, $sem, $sy, $subjcode){
		$sql = "SELECT * FROM tbl_subjpreferences WHERE sprof = :fcode AND sem = :sem AND schoolYear = :sy AND scode = :subjcode";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':fcode',$fcode)
		->bindValue(':sem',$sem)
		->bindValue(':sy',$sy)
		->bindValue(':subjcode',$subjcode)
		->queryAll();

		return $row;
	}

	public static function DistinctProf($sem, $sy){
		$sql = "SELECT DISTINCT sprof FROM tbl_subjpreferences WHERE sem = :sem AND schoolYear = :sy";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':sem', $sem)
		->bindValue(':sy', $sy)
		->queryAll();

		return $row;
	}

	public static function CheckProfSubPref($sem, $sy, $fcode){
		$sql = "SELECT * from tbl_subjpreferences WHERE sem = :sem AND schoolYear = :sy AND sprof = :fcode";

		$result = Yii::app()->db->createCommand($sql)
		->bindValue(':sem', $sem)
		->bindValue(':sy', $sy)
		->bindValue(':fcode', $fcode)
		->queryAll();

		return $result;
	}
}








/*

tbl_subjects

should not be shown
if the faculty has chosen the subject, it should not be shown

*/