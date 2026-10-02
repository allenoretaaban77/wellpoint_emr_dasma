<?php
$this->breadcrumbs=array(
	'UrinalysisNew'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),'View '.$model->id
);

$this->menu=array(
    array('label'=>'Manage Records List', 'url'=>array('admin')),
    array('label'=>'Edit This Record', 'url'=>array('diagurinalysisnew/update/'.$model->id)),
    array('label'=>'Delete This Record', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2>View Patient's Diagnostics for Urinalysis New</h2>
<div style="float:left;margin:0px 0px 5px 0px;">
<?php echo CHtml::link('[Edit This Result]',array('diagurinalysisnew/update/'.$model->id)); ?>
&nbsp;&nbsp;
<a target="_blank" href="<?= Yii::app()->createUrl("PrintDiagResult/FormUrinalysisNew/Print/?resultid=".$model->id, array()) ?>">[Print This Result]</a>
&nbsp;&nbsp;
<a id="yt0" href="#">[Delete This Record]</a>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'result_no',
		'patient_id',
		'daterequested',
		'datereleased',
		'name',
		'age',
		'sex',
		'requesting_physician',
		'sp_no',
		
		// Physical Characteristics
		'pc_color',
		'pc_tranparency',
		'pc_specific_gravity',
		
		// Chemical Characteristics
		'cc_leukocyte_esterase',
		'cc_nitrite',
		'cc_urobilinogen',
		'cc_protein',
		'cc_ph',
		'cc_blood',
		'cc_ketones',
		'cc_bilirubin',
		'cc_glucose',
		
		// Microscopic
		'm_puscell',
		'm_rbc',
		'm_epitelial_cells',
		'm_mucus_threads',
		
		// Crystals
		'c_amorph_urates',
		'c_amorph_phosphates',
		'c_triple_phospate',
		'c_calcium_oxalate',
		'c_uric_acid',
		
		// Microscopic Others & Additional Tests
		'bacteria',
		'casts',
		'others',
		
		// Audit & Personnel Details
		'datecreated',
		'med_tech',
		'licenseno',
		'pathologist',
		'pathologist_licenseno',
	),
)); ?>
<div style="float:left;width:100%;margin:10px 0px 0px 0px;"></div>