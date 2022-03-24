<?php

/**
 * This is the model class for table "tbl_timepreferences".
 *
 * The followings are the available columns in table 'tbl_timepreferences':
 * @property integer $timeID
 * @property string $sday
 * @property integer $stimeS
 * @property integer $stimeE
 * @property string $sprof
 * @property integer $sem
 * @property string $schoolYear
 */
class TblTimepreferences extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_timepreferences';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sday, stimeS, stimeE, sprof, sem, schoolYear', 'required'),
			array('stimeS, stimeE, sem', 'numerical', 'integerOnly'=>true),
			array('sday', 'length', 'max'=>5),
			array('sprof', 'length', 'max'=>100),
			array('schoolYear', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('timeID, sday, stimeS, stimeE, sprof, sem, schoolYear', 'safe', 'on'=>'search'),
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
			'timeID' => 'Time',
			'sday' => 'Sday',
			'stimeS' => 'Stime S',
			'stimeE' => 'Stime E',
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

		$criteria->compare('timeID',$this->timeID);
		$criteria->compare('sday',$this->sday,true);
		$criteria->compare('stimeS',$this->stimeS);
		$criteria->compare('stimeE',$this->stimeE);
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
	 * @return TblTimepreferences the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
