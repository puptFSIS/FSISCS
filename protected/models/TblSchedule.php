<?php

/**
 * This is the model class for table "tbl_schedule".
 *
 * The followings are the available columns in table 'tbl_schedule':
 * @property integer $schedID
 * @property integer $currID
 * @property integer $courseID
 * @property string $csection
 * @property string $cyear
 * @property string $scode
 * @property string $stitle
 * @property integer $units
 * @property string $lec
 * @property string $lab
 * @property string $sday
 * @property string $stimeS
 * @property string $stimeE
 * @property string $sroom
 * @property string $sprof
 * @property integer $sem
 * @property string $schoolYear
 * @property string $sday2
 * @property string $stimeS2
 * @property string $stimeE2
 * @property string $sroom2
 * @property integer $load_type
 * @property string $Sched_type
 */
class TblSchedule extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currID, courseID, csection, cyear, scode, stitle, units, lec, lab, sday, stimeS, stimeE, sroom, sprof, sem, schoolYear, sday2, stimeS2, stimeE2, sroom2, Sched_type', 'required'),
			array('currID, courseID, units, sem, load_type', 'numerical', 'integerOnly'=>true),
			array('csection, cyear, sday, sday2', 'length', 'max'=>5),
			array('scode, stimeS, stimeE, sroom, schoolYear, sroom2', 'length', 'max'=>50),
			array('stitle, sprof', 'length', 'max'=>100),
			array('lec, lab', 'length', 'max'=>10),
			array('stimeS2, stimeE2', 'length', 'max'=>11),
			array('Sched_type', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('schedID, currID, courseID, csection, cyear, scode, stitle, units, lec, lab, sday, stimeS, stimeE, sroom, sprof, sem, schoolYear, sday2, stimeS2, stimeE2, sroom2, load_type, Sched_type', 'safe', 'on'=>'search'),
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
			'sday2' => 'Sday2',
			'stimeS2' => 'Stime S2',
			'stimeE2' => 'Stime E2',
			'sroom2' => 'Sroom2',
			'load_type' => 'Load Type',
			'Sched_type' => 'Sched Type',
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
		$criteria->compare('currID',$this->currID);
		$criteria->compare('courseID',$this->courseID);
		$criteria->compare('csection',$this->csection,true);
		$criteria->compare('cyear',$this->cyear,true);
		$criteria->compare('scode',$this->scode,true);
		$criteria->compare('stitle',$this->stitle,true);
		$criteria->compare('units',$this->units);
		$criteria->compare('lec',$this->lec,true);
		$criteria->compare('lab',$this->lab,true);
		$criteria->compare('sday',$this->sday,true);
		$criteria->compare('stimeS',$this->stimeS,true);
		$criteria->compare('stimeE',$this->stimeE,true);
		$criteria->compare('sroom',$this->sroom,true);
		$criteria->compare('sprof',$this->sprof,true);
		$criteria->compare('sem',$this->sem);
		$criteria->compare('schoolYear',$this->schoolYear,true);
		$criteria->compare('sday2',$this->sday2,true);
		$criteria->compare('stimeS2',$this->stimeS2,true);
		$criteria->compare('stimeE2',$this->stimeE2,true);
		$criteria->compare('sroom2',$this->sroom2,true);
		$criteria->compare('load_type',$this->load_type);
		$criteria->compare('Sched_type',$this->Sched_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblSchedule the static model class
	 */

	public static function TakeSubjectsOffer($sy,$sem){
		$sql = "select * from tbl_schedule where sem = :sem and schoolYear = :schoolYear and Sched_type = :sched order by courseID";
		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':schoolYear',$sy)
		->bindValue(':sem', $sem)
		->bindValue(':sched', 'OFFICIAL')
		->queryAll();

		return $row;
	}

	public static function TakeSubjectLoad($fcode, $sem, $sy){
		$sql = "select * from tbl_schedule where sem = :sem and schoolYear = :schoolYear and sprof = :fcode and Sched_type = :schedType";
		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':sem',$sem)
		->bindValue(':schoolYear',$sy)
		->bindValue(':fcode',$fcode)
		->bindValue(':schedType','OFFICIAL')
		->queryAll();

		return $row;
	}

	public static function CheckSched($day, $sem, $sy){
		$sql = "SELECT * FROM tbl_schedule WHERE sday= :day and sem= :sem and schoolYear= :sy";
		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':day',$day)
		->bindValue(':sem',$sem)
		->bindValue(':sy',$sy)
		->queryAll();

		return $row;
	}

	public static function FacultyLoad($sem, $sy, $fcode){
		$sql = "SELECT * FROM tbl_schedule WHERE sem=:sem AND schoolYear=:sy AND sprof=:fcode AND Sched_type=:schedType";
		$row = Yii::app()->db->createCommand($sql)
		->bindValue(':sem', $sem)
		->bindValue(':sy', $sy)
		->bindValue(':fcode',$fcode)
		->bindValue(':schedType', 'OFFICIAL')
		->queryAll();

		return $row;
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}




	///////// DTR!! ///////

	public static function fetch_sched($var,$var2,$var3,$var4,$var5) // dtr
	{ 
		$new_var[] = implode(',', $var);
		$new_var2[] = implode(',', $var2);
		$new_var3[] = implode(',', $var3);
		$new_var4[] = implode(',', $var4);
		$new_var5 = $var5;

		$sql = "SELECT * FROM `tbl_dtr` WHERE `id` = '".$new_var[$l]."' AND `regpartime` = '".$new_var2[$l]."' AND `month` = '".$new_var3[$l]."' AND `year` = '".$new_var4[$l]."'";
		
		$row = Yii::app()->db->createCommand($sql)
		->queryAll();
		return $row;
	}

	public static function fetch_loadtype($var,$var3,$var4) // dtr
	{ 
		$new_var = $var;
		$new_var3 = $var3;
		$new_var4 = $var4;
		$sql = "SELECT * FROM `tbl_schedule` WHERE `load_type`='$new_var'  AND `sprof` ='$new_var4' AND `schoolYear` LIKE '%$new_var3%'";
		$row = Yii::app()->db->createCommand($sql)
		->queryAll();
		return $row;
	}

	public static function update_by_hap($val1,$val2,$val3) // dtr
	{
		$date = date('Y-m-d H:i:s');
		$update = "UPDATE `tbl_dtr` SET `hap_approval_status` = '$val2', `hap_comments` = '$val3',`modified_date`='$date'  WHERE id = '$val1'";
		 Yii::app()->db->createCommand($update)->execute();
		
	}

	public static function update_by_resubmit($val1) // dtr
	{
		$date = date('Y-m-d H:i:s');
		foreach ($val1 as $id) {
			$update = "UPDATE `tbl_dtr` SET `hap_approval_status` = null,`modified_date`='$date'  WHERE id = '$id'";
		 	Yii::app()->db->createCommand($update)->execute();
		}
			
		
	}



	public static function soft_delete($val2) // dtr
	{
		$date = date('Y-m-d H:i:s');
		foreach ($val2 as $id) {
			$update = "UPDATE `tbl_dtr` SET `status` = 1,`modified_date`='$date'  WHERE id = '$id'";
		 	Yii::app()->db->createCommand($update)->execute();
		}
			
		
	}

	public static function restore_deleted($val2) // dtr
	{
		$date = date('Y-m-d H:i:s');
		foreach ($val2 as $id) {
			$update = "UPDATE `tbl_dtr` SET `status` = null,`modified_date`='$date'  WHERE id = '$id'";
		 	Yii::app()->db->createCommand($update)->execute();
		}
			
		
	}

	



	//////////DTR!!///////////
}
