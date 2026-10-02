<?php
$this->breadcrumbs=array(
	'HematologyNew'=>array('admin'),
	'Manage',
);

$this->menu=array(
    array('label'=>'Add New', 'url'=>array('index'))
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('diag-hematology-new-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Hematology New Diagnostic Results</h2>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array( 'template'=>"{summary}\n{pager}\n{items}\n{pager}\n{summary}",
	'id'=>'diag-hematology-new-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        'spno',
		'name',
		'age',
		'sex',	
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
