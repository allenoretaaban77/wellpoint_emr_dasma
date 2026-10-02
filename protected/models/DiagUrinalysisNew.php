<?php

/**
 * This is the model class for table "diag_urinalysis_new".
 *
 * The followings are the available columns in table 'diag_urinalysis_new':
 * @property string $id
 * @property string $result_no
 * @property string $name
 * @property integer $age
 * @property string $sex
 * @property string $requesting_physician
 * @property string $sp_no
 * @property string $pc_color
 * @property string $pc_tranparency
 * @property string $pc_specific_gravity
 * @property string $cc_leukocyte_esterase
 * @property string $cc_nitrite
 * @property string $cc_urobilinogen
 * @property string $cc_protein
 * @property string $cc_ph
 * @property string $cc_blood
 * @property string $cc_ketones
 * @property string $cc_bilirubin
 * @property string $cc_glucose
 * @property string $m_puscell
 * @property string $m_rbc
 * @property string $m_epitelial_cells
 * @property string $m_mucus_threads
 * @property string $c_amorph_urates
 * @property string $c_amorph_phosphates
 * @property string $c_triple_phospate
 * @property string $c_calcium_oxalate
 * @property string $c_uric_acid
 * @property string $bacteria
 * @property string $casts
 * @property string $pregnancy_test
 * @property string $others
 * @property string $datecreated
 * @property string $daterequested
 * @property string $datereceived
 * @property string $datereleased
 * @property string $med_tech
 * @property string $licenseno
 * @property string $pathologist
 * @property string $pathologist_licenseno
 * @property string $patient_id
 */
class DiagUrinalysisNew extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiagUrinalysisNew the static model class
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
		return 'diag_urinalysis_new';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('requesting_physician, med_tech, licenseno, pathologist, pathologist_licenseno, datereleased, daterequested, result_no', 'required'),
			array('patient_id', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('result_no', 'length', 'max'=>100),
			array('name, sex, requesting_physician, sp_no, pc_color, pc_tranparency, pc_specific_gravity, cc_leukocyte_esterase, cc_nitrite, cc_urobilinogen, cc_protein, cc_ph, cc_blood, cc_ketones, cc_bilirubin, cc_glucose, m_puscell, m_rbc, m_epitelial_cells, m_mucus_threads, c_amorph_urates, c_amorph_phosphates, c_triple_phospate, c_calcium_oxalate, c_uric_acid, bacteria, casts, pregnancy_test', 'length', 'max'=>250),
			array('others', 'length', 'max'=>150),
			array('med_tech, pathologist', 'length', 'max'=>200),
			array('licenseno, pathologist_licenseno, patient_id', 'length', 'max'=>20),
			array('datecreated, daterequested, datereceived, datereleased', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, result_no, name, age, sex, requesting_physician, sp_no, pc_color, pc_tranparency, pc_specific_gravity, cc_leukocyte_esterase, cc_nitrite, cc_urobilinogen, cc_protein, cc_ph, cc_blood, cc_ketones, cc_bilirubin, cc_glucose, m_puscell, m_rbc, m_epitelial_cells, m_mucus_threads, c_amorph_urates, c_amorph_phosphates, c_triple_phospate, c_calcium_oxalate, c_uric_acid, bacteria, casts, pregnancy_test, others, datecreated, daterequested, datereceived, datereleased, med_tech, licenseno, pathologist, pathologist_licenseno, patient_id', 'safe', 'on'=>'search'),
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
			'result_no' => 'Result No',
			'name' => 'Name',
			'age' => 'Age',
			'sex' => 'Sex',
			'requesting_physician' => 'Requesting Physician',
			'sp_no' => 'Sp No',
			'pc_color' => 'Color',
			'pc_tranparency' => 'Tranparency',
			'pc_specific_gravity' => 'Specific Gravity',
			'cc_leukocyte_esterase' => 'Leukocyte Esterase',
			'cc_nitrite' => 'Nitrite',
			'cc_urobilinogen' => 'Urobilinogen',
			'cc_protein' => 'Protein',
			'cc_ph' => 'pH',
			'cc_blood' => 'Blood',
			'cc_ketones' => 'Ketones',
			'cc_bilirubin' => 'Bilirubin',
			'cc_glucose' => 'Glucose',
			'm_puscell' => 'Pus Cell',
			'm_rbc' => 'RBC',
			'm_epitelial_cells' => 'Epitelial Cells',
			'm_mucus_threads' => 'Mucus Threads',
			'c_amorph_urates' => 'Amorph Urates',
			'c_amorph_phosphates' => 'Amorph Phosphates',
			'c_triple_phospate' => 'Triple Phospate',
			'c_calcium_oxalate' => 'Calcium Oxalate',
			'c_uric_acid' => 'Uric Acid',
			'bacteria' => 'Bacteria',
			'casts' => 'Casts',
			'pregnancy_test' => 'Pregnancy Test',
			'others' => 'Others',
			'datecreated' => 'Date Created',
			'daterequested' => 'Date Requested',
			'datereceived' => 'Date Received',
			'datereleased' => 'Date Released',
			'med_tech' => 'Medical Technologist',
			'licenseno' => 'Medical Technologist License No.',
			'pathologist' => 'Pathologist',
			'pathologist_licenseno' => 'Pathologist Licenseno',
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
		$criteria->compare('result_no',$this->result_no,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('requesting_physician',$this->requesting_physician,true);
		$criteria->compare('sp_no',$this->sp_no,true);
		$criteria->compare('pc_color',$this->pc_color,true);
		$criteria->compare('pc_tranparency',$this->pc_tranparency,true);
		$criteria->compare('pc_specific_gravity',$this->pc_specific_gravity,true);
		$criteria->compare('cc_leukocyte_esterase',$this->cc_leukocyte_esterase,true);
		$criteria->compare('cc_nitrite',$this->cc_nitrite,true);
		$criteria->compare('cc_urobilinogen',$this->cc_urobilinogen,true);
		$criteria->compare('cc_protein',$this->cc_protein,true);
		$criteria->compare('cc_ph',$this->cc_ph,true);
		$criteria->compare('cc_blood',$this->cc_blood,true);
		$criteria->compare('cc_ketones',$this->cc_ketones,true);
		$criteria->compare('cc_bilirubin',$this->cc_bilirubin,true);
		$criteria->compare('cc_glucose',$this->cc_glucose,true);
		$criteria->compare('m_puscell',$this->m_puscell,true);
		$criteria->compare('m_rbc',$this->m_rbc,true);
		$criteria->compare('m_epitelial_cells',$this->m_epitelial_cells,true);
		$criteria->compare('m_mucus_threads',$this->m_mucus_threads,true);
		$criteria->compare('c_amorph_urates',$this->c_amorph_urates,true);
		$criteria->compare('c_amorph_phosphates',$this->c_amorph_phosphates,true);
		$criteria->compare('c_triple_phospate',$this->c_triple_phospate,true);
		$criteria->compare('c_calcium_oxalate',$this->c_calcium_oxalate,true);
		$criteria->compare('c_uric_acid',$this->c_uric_acid,true);
		$criteria->compare('bacteria',$this->bacteria,true);
		$criteria->compare('casts',$this->casts,true);
		$criteria->compare('pregnancy_test',$this->pregnancy_test,true);
		$criteria->compare('others',$this->others,true);
		$criteria->compare('datecreated',$this->datecreated,true);
		$criteria->compare('daterequested',$this->daterequested,true);
		$criteria->compare('datereceived',$this->datereceived,true);
		$criteria->compare('datereleased',$this->datereleased,true);
		$criteria->compare('med_tech',$this->med_tech,true);
		$criteria->compare('licenseno',$this->licenseno,true);
		$criteria->compare('pathologist',$this->pathologist,true);
		$criteria->compare('pathologist_licenseno',$this->pathologist_licenseno,true);
		$criteria->compare('patient_id',$this->patient_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}