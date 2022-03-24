<?php

/**
 * This is the model class for table "tbl_subjects".
 *
 * The followings are the available columns in table 'tbl_subjects':
 * @property string $SubjCode
 * @property string $SubjDescription
 * @property string $Units
 * @property double $HoursLab
 * @property double $HoursLec
 * @property string $GroupSubject
 * @property string $Dept_ID
 * @property string $Category
 * @property integer $currYear
 */
class TblSubjects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subjects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SubjCode, SubjDescription, HoursLab, HoursLec, Category, currYear', 'required'),
			array('currYear', 'numerical', 'integerOnly'=>true),
			array('HoursLab, HoursLec', 'numerical'),
			array('SubjCode, GroupSubject', 'length', 'max'=>50),
			array('SubjDescription', 'length', 'max'=>200),
			array('Units, Dept_ID', 'length', 'max'=>5),
			array('Category', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SubjCode, SubjDescription, Units, HoursLab, HoursLec, GroupSubject, Dept_ID, Category, currYear', 'safe', 'on'=>'search'),
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
			'SubjCode' => 'Subj Code',
			'SubjDescription' => 'Subj Description',
			'Units' => 'Units',
			'HoursLab' => 'Hours Lab',
			'HoursLec' => 'Hours Lec',
			'GroupSubject' => 'Group Subject',
			'Dept_ID' => 'Dept',
			'Category' => 'Category',
			'currYear' => 'Curr Year',
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

		$criteria->compare('SubjCode',$this->SubjCode,true);
		$criteria->compare('SubjDescription',$this->SubjDescription,true);
		$criteria->compare('Units',$this->Units,true);
		$criteria->compare('HoursLab',$this->HoursLab);
		$criteria->compare('HoursLec',$this->HoursLec);
		$criteria->compare('GroupSubject',$this->GroupSubject,true);
		$criteria->compare('Dept_ID',$this->Dept_ID,true);
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('currYear',$this->currYear);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblSubjects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function GetAllSubject($currYear){
		$sql = "SELECT * FROM tbl_subjects WHERE currYear = :currYear";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':currYear',$currYear)
		->queryAll();

		return $row;
	}

	public static function CheckSub($currID, $scode){
		$sql = "SELECT * FROM tbl_subjects WHERE currYear = :currID AND SubjCode = :scode";

		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':currID', $currID)
		->bindValue(':scode', $scode)
		->queryAll();

		return $row;
	}
}
