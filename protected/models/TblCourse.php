<?php

/**
 * This is the model class for table "tbl_course".
 *
 * The followings are the available columns in table 'tbl_course':
 * @property string $course_code
 * @property integer $course
 * @property string $course_desc
 * @property string $CourseInfo
 * @property string $Career
 * @property string $OrgId
 * @property string $Status
 * @property integer $NoOfYears
 */
class TblCourse extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_code, course, course_desc, CourseInfo, Career, OrgId, Status, NoOfYears', 'required'),
			array('course, NoOfYears', 'numerical', 'integerOnly'=>true),
			array('course_code', 'length', 'max'=>50),
			array('course_desc', 'length', 'max'=>100),
			array('CourseInfo, Career', 'length', 'max'=>1000),
			array('OrgId', 'length', 'max'=>10),
			array('Status', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('course_code, course, course_desc, CourseInfo, Career, OrgId, Status, NoOfYears', 'safe', 'on'=>'search'),
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
			'course_code' => 'Course Code',
			'course' => 'Course',
			'course_desc' => 'Course Desc',
			'CourseInfo' => 'Course Info',
			'Career' => 'Career',
			'OrgId' => 'Org',
			'Status' => 'Status',
			'NoOfYears' => 'No Of Years',
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

		$criteria->compare('course_code',$this->course_code,true);
		$criteria->compare('course',$this->course);
		$criteria->compare('course_desc',$this->course_desc,true);
		$criteria->compare('CourseInfo',$this->CourseInfo,true);
		$criteria->compare('Career',$this->Career,true);
		$criteria->compare('OrgId',$this->OrgId,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('NoOfYears',$this->NoOfYears);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblCourse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function GetCourse(){
		$sql = "select `course_code`, `course`, `NoOfYears`, `course_desc` from `tbl_course`";
		$rows = Yii::app()->db->createCommand($sql)->queryAll();

		return $rows;
	}

	public static function TryCourse(){
		$sql = "SELECT * FROM tbl_course WHERE course = 19";
		$rows = Yii::app()->db->createCommand($sql)->queryAll();

		return $rows;
	}

	public static function SpecificCourse($courseID){
		$sql = "SELECT * FROM tbl_course WHERE course = :courseID";
		$rows = Yii::app()->db->createCommand($sql)
		->bindValue(':courseID', $courseID)
		->queryRow();

		return $rows;
	}

}
