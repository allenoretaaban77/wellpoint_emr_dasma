<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'patient_id'); ?>
		<?php echo $form->textField($model,'patient_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requestingphysician'); ?>
		<?php echo $form->textField($model,'requestingphysician',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spno'); ?>
		<?php echo $form->textField($model,'spno',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<!-- Hematology Test Results -->
	<div class="row">
		<?php echo $form->label($model,'rbc'); ?>
		<?php echo $form->textField($model,'rbc',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hemoglobin'); ?>
		<?php echo $form->textField($model,'hemoglobin',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hematocrit'); ?>
		<?php echo $form->textField($model,'hematocrit',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wbc'); ?>
		<?php echo $form->textField($model,'wbc',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'neutrophils'); ?>
		<?php echo $form->textField($model,'neutrophils',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lymphocytes'); ?>
		<?php echo $form->textField($model,'lymphocytes',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monocytes'); ?>
		<?php echo $form->textField($model,'monocytes',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eosinophils'); ?>
		<?php echo $form->textField($model,'eosinophils',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'basophils'); ?>
		<?php echo $form->textField($model,'basophils',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'platelet'); ?>
		<?php echo $form->textField($model,'platelet',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mcv'); ?>
		<?php echo $form->textField($model,'mcv',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mch'); ?>
		<?php echo $form->textField($model,'mch',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mchc'); ?>
		<?php echo $form->textField($model,'mchc',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rdw'); ?>
		<?php echo $form->textField($model,'rdw',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rdw_sd'); ?>
		<?php echo $form->textField($model,'rdw_sd',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<!-- Dates & Personnel -->
	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datereceived'); ?>
		<?php echo $form->textField($model,'datereceived'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datereleased'); ?>
		<?php echo $form->textField($model,'datereleased'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datecreated'); ?>
		<?php echo $form->textField($model,'datecreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medicaltechnologist'); ?>
		<?php echo $form->textField($model,'medicaltechnologist',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'licenseno'); ?>
		<?php echo $form->textField($model,'licenseno',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pathologist'); ?>
		<?php echo $form->textField($model,'pathologist',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pathologist_licenseno'); ?>
		<?php echo $form->textField($model,'pathologist_licenseno',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->