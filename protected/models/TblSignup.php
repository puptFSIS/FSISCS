<?php

/**
 * This is the model class for table "tbl_signup".
 *
 * The followings are the available columns in table 'tbl_signup':
 * @property integer $id
 * @property string $FCode
 * @property string $Employment_type
 * @property string $Position
 * @property string $FName
 * @property string $MidInit
 * @property string $LName
 * @property string $Email
 * @property string $Password
 * @property string $id_pic
 */
class TblSignup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_signup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FCode, Employment_type, Position, FName, MidInit, LName, Email, Password, id_pic', 'required'),
			array('FCode, Employment_type, Position, FName, LName, Email, Password, id_pic', 'length', 'max'=>100),
			array('MidInit', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, FCode, Employment_type, Position, FName, MidInit, LName, Email, Password, id_pic', 'safe', 'on'=>'search'),
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
			'Employment_type' => 'Employment Type',
			'Position' => 'Position',
			'FName' => 'Fname',
			'MidInit' => 'Mid Init',
			'LName' => 'Lname',
			'Email' => 'Email',
			'Password' => 'Password',
			'id_pic' => 'Id Pic',
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
		$criteria->compare('Employment_type',$this->Employment_type,true);
		$criteria->compare('Position',$this->Position,true);
		$criteria->compare('FName',$this->FName,true);
		$criteria->compare('MidInit',$this->MidInit,true);
		$criteria->compare('LName',$this->LName,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('id_pic',$this->id_pic,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblSignup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function GetAllApplying(){
		$sql = "SELECT * FROM tbl_signup";

		$row = Yii::app()->db->createCommand($sql)
		->queryAll();

		return $row;
	}
}
