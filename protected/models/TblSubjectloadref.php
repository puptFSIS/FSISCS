<?php

/**
 * This is the model class for table "tbl_subjectloadref".
 *
 * The followings are the available columns in table 'tbl_subjectloadref':
 * @property string $courseID
 * @property string $cyear
 * @property string $currID
 * @property string $schoolYear
 */
class TblSubjectloadref extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subjectloadref';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseID, cyear, currID, schoolYear', 'required'),
			array('courseID, cyear, currID, schoolYear', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('courseID, cyear, currID, schoolYear', 'safe', 'on'=>'search'),
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
			'courseID' => 'Course',
			'cyear' => 'Cyear',
			'currID' => 'Curr',
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

		$criteria->compare('courseID',$this->courseID,true);
		$criteria->compare('cyear',$this->cyear,true);
		$criteria->compare('currID',$this->currID,true);
		$criteria->compare('schoolYear',$this->schoolYear,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblSubjectloadref the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
