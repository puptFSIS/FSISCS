<?php

/**
 * This is the model class for table "tbl_ipcr2".
 *
 * The followings are the available columns in table 'tbl_ipcr2':
 * @property integer $id
 * @property string $if_required
 * @property string $output
 * @property string $indicators
 * @property string $part
 * @property string $month
 * @property integer $year
 * @property string $deleted_on
 * @property string $visible
 */
class TblIpcr2 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ipcr2';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('if_required, output, indicators, part, month, year', 'required'),
			array('year', 'numerical', 'integerOnly'=>true),
			array('if_required, visible', 'length', 'max'=>30),
			array('output, indicators', 'length', 'max'=>255),
			array('part, month', 'length', 'max'=>11),
			array('deleted_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, if_required, output, indicators, part, month, year, deleted_on, visible', 'safe', 'on'=>'search'),
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
			'if_required' => 'If Required',
			'output' => 'Output',
			'indicators' => 'Indicators',
			'part' => 'Part',
			'month' => 'Month',
			'year' => 'Year',
			'deleted_on' => 'Deleted On',
			'visible' => 'Visible',
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
		$criteria->compare('if_required',$this->if_required,true);
		$criteria->compare('output',$this->output,true);
		$criteria->compare('indicators',$this->indicators,true);
		$criteria->compare('part',$this->part,true);
		$criteria->compare('month',$this->month,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('deleted_on',$this->deleted_on,true);
		$criteria->compare('visible',$this->visible,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblIpcr2 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getIPCR2datasp($y,$fcode)
	{
		$sql= "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = :fcode WHERE tbl_ipcr2.part = :sp AND tbl_ipcr2.year = :year AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':fcode', $fcode)
		->bindValue(':sp', 'sp')
		->bindValue(':year', $y)
		->queryAll();

		return $row;
	}

	public function getIPCR2datacf($y,$fcode)
	{
		$sql= "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = :fcode WHERE tbl_ipcr2.part = :cf AND tbl_ipcr2.year = :year AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':fcode', $fcode)
		->bindValue(':cf', 'cf')
		->bindValue(':year', $y)
		->queryAll();

		return $row;
	}

	public function getIPCR2datasf($y,$fcode)
	{
		$sql= "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = :fcode WHERE tbl_ipcr2.part = :sf AND tbl_ipcr2.year = :year AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':fcode', $fcode)
		->bindValue(':sf', 'sf')
		->bindValue(':year', $y)
		->queryAll();

		return $row;
	}

}






