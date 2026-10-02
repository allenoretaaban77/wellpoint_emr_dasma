<?php

/**
 * This is the model class for table "diag_hematology_new".
 *
 * The followings are the available columns in table 'diag_hematology_new':
 * @property string $id
 * @property string $name
 * @property string $create_date
 * @property integer $age
 * @property string $sex
 * @property string $requestingphysician
 * @property string $spno
 * @property string $rbc
 * @property string $hemoglobin
 * @property string $hematocrit
 * @property string $wbc
 * @property string $neutrophils
 * @property string $lymphocytes
 * @property string $monocytes
 * @property string $eosinophils
 * @property string $basophils
 * @property string $platelet
 * @property string $mcv
 * @property string $mch
 * @property string $mchc
 * @property string $rdw
 * @property string $rdw_sd
 * @property string $datecreated
 * @property string $medicaltechnologist
 * @property string $licenseno
 * @property string $pathologist
 * @property string $pathologist_licenseno
 * @property string $datereceived
 * @property string $datereleased
 * @property string $patient_id
 */
class DiagHematologyNew extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiagHematologyNew the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'diag_hematology_new';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, age, sex, requestingphysician, medicaltechnologist, licenseno, pathologist, pathologist_licenseno, datereceived, datereleased, patient_id', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('name, sex, requestingphysician, spno, rbc, hemoglobin, hematocrit, wbc, neutrophils, lymphocytes, monocytes, eosinophils, basophils, platelet, mcv, mch, mchc, rdw, rdw_sd, medicaltechnologist, pathologist, pathologist_licenseno', 'length', 'max'=>200),
			array('licenseno, patient_id', 'length', 'max'=>20),
			array('datecreated, datereleased', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, create_date, age, sex, requestingphysician, spno, rbc, hemoglobin, hematocrit, wbc, neutrophils, lymphocytes, monocytes, eosinophils, basophils, platelet, mcv, mch, mchc, rdw, rdw_sd, datecreated, medicaltechnologist, licenseno, pathologist, pathologist_licenseno, datereceived, datereleased, patient_id', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'create_date' => 'Create Date',
			'age' => 'Age',
			'sex' => 'Sex',
			'requestingphysician' => 'Requesting Physician',
			'spno' => 'Sp No',
			'rbc' => 'RBC',
			'hemoglobin' => 'Hemoglobin',
			'hematocrit' => 'Hematocrit',
			'wbc' => 'WBC',
			'neutrophils' => 'Neutrophils',
			'lymphocytes' => 'Lymphocytes',
			'monocytes' => 'Monocytes',
			'eosinophils' => 'Eosinophils',
			'basophils' => 'Basophils',
			'platelet' => 'Platelet',
			'mcv' => 'MCV',
			'mch' => 'MCH',
			'mchc' => 'MCHC',
			'rdw' => 'RDW',
			'rdw_sd' => 'RDW-SD',
			'datecreated' => 'Date Created',
			'medicaltechnologist' => 'Medical Technologist',
			'licenseno' => 'Medical Technologist License No.',
			'pathologist' => 'Pathologist',
			'pathologist_licenseno' => 'Pathologist License No.',
			'datereceived' => 'Date Received',
			'datereleased' => 'Date Released',
			'patient_id' => 'Patient',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('requestingphysician',$this->requestingphysician,true);
		$criteria->compare('spno',$this->spno,true);
		$criteria->compare('rbc',$this->rbc,true);
		$criteria->compare('hemoglobin',$this->hemoglobin,true);
		$criteria->compare('hematocrit',$this->hematocrit,true);
		$criteria->compare('wbc',$this->wbc,true);
		$criteria->compare('neutrophils',$this->neutrophils,true);
		$criteria->compare('lymphocytes',$this->lymphocytes,true);
		$criteria->compare('monocytes',$this->monocytes,true);
		$criteria->compare('eosinophils',$this->eosinophils,true);
		$criteria->compare('basophils',$this->basophils,true);
		$criteria->compare('platelet',$this->platelet,true);
		$criteria->compare('mcv',$this->mcv,true);
		$criteria->compare('mch',$this->mch,true);
		$criteria->compare('mchc',$this->mchc,true);
		$criteria->compare('rdw',$this->rdw,true);
		$criteria->compare('rdw_sd',$this->rdw_sd,true);
		$criteria->compare('datecreated',$this->datecreated,true);
		$criteria->compare('medicaltechnologist',$this->medicaltechnologist,true);
		$criteria->compare('licenseno',$this->licenseno,true);
		$criteria->compare('pathologist',$this->pathologist,true);
		$criteria->compare('pathologist_licenseno',$this->pathologist_licenseno,true);
		$criteria->compare('datereceived',$this->datereceived,true);
		$criteria->compare('datereleased',$this->datereleased,true);
		$criteria->compare('patient_id',$this->patient_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}