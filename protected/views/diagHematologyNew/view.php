<?php
$this->breadcrumbs=array(
	'HematologyNew'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),'View '.$model->id
);

$this->menu=array(
    array('label'=>'Manage Records List', 'url'=>array('admin')),
    array('label'=>'Edit This Record', 'url'=>array('diaghematologynew/update/'.$model->id)),
    array('label'=>'Delete This Record', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2>View Patient's Diagnostics for Hematology New</h2>
<div style="float:left;margin:0px 0px 5px 0px;">
<?php echo CHtml::link('[Edit This Result]',array('diaghematologynew/update/'.$model->id)); ?>
&nbsp;&nbsp;
<a target="_blank" href="<?= Yii::app()->createUrl("PrintDiagResult/FormHematologyNew/Print/?resultid=".$model->id, array()) ?>">[Print This Result]</a>
&nbsp;&nbsp;
<a id="yt0" href="#">[Delete This Record]</a>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'patient_id',
		'name',
		'age',
		'sex',
		'requestingphysician',
		'spno',
		
		// Hematology Results
		'rbc',
		'hemoglobin',
		'hematocrit',
		'wbc',
		'neutrophils',
		'lymphocytes',
		'monocytes',
		'eosinophils',
		'basophils',
		'platelet',
		'mcv',
		'mch',
		'mchc',
		'rdw',
		'rdw_sd',
		
		// Dates & Personnel Details
		'create_date',
		'datereceived',
		'datereleased',
		'datecreated',
		'medicaltechnologist',
		'licenseno',
		'pathologist',
		'pathologist_licenseno',
	),
)); ?>
<div style="float:left;width:100%;margin:10px 0px 0px 0px;"></div>