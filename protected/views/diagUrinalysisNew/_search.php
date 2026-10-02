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
		<?php echo $form->label($model,'result_no'); ?>
		<?php echo $form->textField($model,'result_no',array('size'=>60,'maxlength'=>100)); ?>
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
		<?php echo $form->label($model,'requesting_physician'); ?>
		<?php echo $form->textField($model,'requesting_physician',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sp_no'); ?>
		<?php echo $form->textField($model,'sp_no',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<!-- Physical Characteristics -->
	<div class="row">
		<?php echo $form->label($model,'pc_color'); ?>
		<?php echo $form->textField($model,'pc_color',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pc_tranparency'); ?>
		<?php echo $form->textField($model,'pc_tranparency',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pc_specific_gravity'); ?>
		<?php echo $form->textField($model,'pc_specific_gravity',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<!-- Chemical Characteristics -->
	<div class="row">
		<?php echo $form->label($model,'cc_leukocyte_esterase'); ?>
		<?php echo $form->textField($model,'cc_leukocyte_esterase',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_nitrite'); ?>
		<?php echo $form->textField($model,'cc_nitrite',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_urobilinogen'); ?>
		<?php echo $form->textField($model,'cc_urobilinogen',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_protein'); ?>
		<?php echo $form->textField($model,'cc_protein',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_ph'); ?>
		<?php echo $form->textField($model,'cc_ph',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_blood'); ?>
		<?php echo $form->textField($model,'cc_blood',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_ketones'); ?>
		<?php echo $form->textField($model,'cc_ketones',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_bilirubin'); ?>
		<?php echo $form->textField($model,'cc_bilirubin',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_glucose'); ?>
		<?php echo $form->textField($model,'cc_glucose',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<!-- Microscopic -->
	<div class="row">
		<?php echo $form->label($model,'m_puscell'); ?>
		<?php echo $form->textField($model,'m_puscell',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_rbc'); ?>
		<?php echo $form->textField($model,'m_rbc',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_epitelial_cells'); ?>
		<?php echo $form->textField($model,'m_epitelial_cells',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_mucus_threads'); ?>
		<?php echo $form->textField($model,'m_mucus_threads',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<!-- Crystals -->
	<div class="row">
		<?php echo $form->label($model,'c_amorph_urates'); ?>
		<?php echo $form->textField($model,'c_amorph_urates',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_amorph_phosphates'); ?>
		<?php echo $form->textField($model,'c_amorph_phosphates',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_triple_phospate'); ?>
		<?php echo $form->textField($model,'c_triple_phospate',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_calcium_oxalate'); ?>
		<?php echo $form->textField($model,'c_calcium_oxalate',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_uric_acid'); ?>
		<?php echo $form->textField($model,'c_uric_acid',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<!-- Additional Microscopic & Tests -->
	<div class="row">
		<?php echo $form->label($model,'bacteria'); ?>
		<?php echo $form->textField($model,'bacteria',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'casts'); ?>
		<?php echo $form->textField($model,'casts',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pregnancy_test'); ?>
		<?php echo $form->textField($model,'pregnancy_test',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'others'); ?>
		<?php echo $form->textField($model,'others',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<!-- Dates & Personnel -->
	<div class="row">
		<?php echo $form->label($model,'daterequested'); ?>
		<?php echo $form->textField($model,'daterequested'); ?>
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
		<?php echo $form->label($model,'med_tech'); ?>
		<?php echo $form->textField($model,'med_tech',array('size'=>60,'maxlength'=>200)); ?>
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