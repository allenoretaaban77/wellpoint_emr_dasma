<style>
h3 {
    color: #008000;
}
legend {
    color: #008000;
    font-size: 1.17em;
    font-weight: bold;
}
input[type="text"]:read-only,
input[type="number"]:read-only,
input[type="email"]:read-only,
textarea:read-only {
    background-color: #e6f8d1;
}
</style>
<div class="form">

<?php 
    $diagTemp = "";
    $patientid = "";

    if (!isset($_POST["patientval"])) {           
        $patientid = $_POST["DiagUrinalysisNew"]['patient_id'];
    } else {
        list($patientname, $patientno) = explode("|", $_POST["patientval"]);
        list($dum, $patientid) = explode(":", $patientno);
    }
        
    $diagTemp = Yii::app()->db->createCommand()
        ->select('*')
        ->from('patient')    
        ->where('id=:id', array(':id' => $patientid))
        ->queryRow();
    
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'diag-urinalysis-new-form',
        'enableAjaxValidation' => false,
    ));
    
    // full patient name
    $fullpatientname = $diagTemp['lastname'] . ',';
    $fullpatientname .= ' ' . trim($diagTemp['firstname']);
    if (trim($diagTemp['middleinitial']) != '') {
        $fullpatientname .= ' ' . trim($diagTemp['middleinitial']);
    }
    
    $birthday_timestamp = strtotime($diagTemp["birthdate"]);  
    $age = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);
    $sex = trim($diagTemp['gender']);

    $diagSettings = (object) Yii::app()->db->createCommand()
        ->select('*')
        ->from('diag_settings')    
        ->where('id=:id', array(':id' => 1))
        ->queryRow();
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php echo $form->errorSummary($model); ?>

    <fieldset>
	    <div class="newline">
	    	<div class="row line">
		        <?php echo $form->labelEx($model, 'result_no'); ?>
		        <?php echo $form->textField($model, 'result_no', array('size' => 30, 'maxlength' => 100)); ?>
		        <?php echo $form->error($model, 'result_no'); ?>
	       	</div>
	    	<div class="row line">
		        <?php echo $form->labelEx($model, 'daterequested'); ?>
		        <?php echo $this->widget('zii.widgets.jui.CJuiDatePicker',
		            array(
		                'model' => $model,
		                'attribute' => 'daterequested',
		                'options' => array(
		                    'dateFormat' => 'yy-mm-dd',
		                    'showButtonPanel' => false,
		                    'changeYear' => true,
		                    'changeMonth' => true,
		                    'yearRange' => '1900'
		                ),
                        'htmlOptions' => array(
                            'size' => '30',
                        ),
		            ),
		            true
		        ); ?>
		        <?php echo $form->error($model, 'daterequested'); ?>
	       	</div>

	    	<div class="row line">
		        <?php echo $form->labelEx($model, 'datereleased'); ?>
		        <?php echo $this->widget('zii.widgets.jui.CJuiDatePicker',
		            array(
		                'model' => $model,
		                'attribute' => 'datereleased',
		                'options' => array(
		                    'dateFormat' => 'yy-mm-dd',
		                    'showButtonPanel' => false,
		                    'changeYear' => true,
		                    'changeMonth' => true,
		                    'yearRange' => '1900'
		                ),
                        'htmlOptions' => array(
                            'size' => '30',
                        ),
		            ),
		            true
		        ); ?>
		        <?php echo $form->error($model, 'datereleased'); ?>
	       </div>
	    </div>
	</fieldset>

    <fieldset>
	    <div class="newline">
	    	<div class="row line">
        		<?php echo $form->labelEx($model, 'name'); ?>
        		<?php echo $form->textField($model, 'name', array('size' => 50, 'maxlength' => 250, 'value' => strtoupper($fullpatientname), 'readonly' => 'readonly')); ?>
	    	</div>
	    	<div class="row line">
		        <?php echo $form->labelEx($model, 'age'); ?>
		        <?php echo $form->textField($model, 'age', array('value' => $age, 'readonly' => 'readonly')); ?>
		        <?php echo $form->error($model, 'age'); ?>
	    	</div>
	    	<div class="row line">
		        <?php echo $form->labelEx($model, 'sex'); ?>
		        <?php echo $form->textField($model, 'sex', array('size' => 20, 'maxlength' => 50, 'value' => $sex, 'readonly' => 'readonly')); ?>
		        <?php echo $form->error($model, 'sex'); ?>
	    	</div>
	    </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'requesting_physician'); ?>
                <?php echo $form->textField($model, 'requesting_physician', array('size' => 50, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'requesting_physician'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'sp_no'); ?>
                <?php echo $form->textField($model, 'sp_no', array('size' => 20, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'sp_no'); ?>
            </div>
        </div>
	</fieldset>

    <fieldset>
        <legend>Physical Characteristics</legend>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'pc_color'); ?>
                <?php echo $form->textField($model, 'pc_color', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'pc_color'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'pc_tranparency'); ?>
                <?php echo $form->textField($model, 'pc_tranparency', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'pc_tranparency'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'pc_specific_gravity'); ?>
                <?php echo $form->textField($model, 'pc_specific_gravity', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'pc_specific_gravity'); ?>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Chemical Characteristics</legend>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_leukocyte_esterase'); ?>
                <?php echo $form->textField($model, 'cc_leukocyte_esterase', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_leukocyte_esterase'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_nitrite'); ?>
                <?php echo $form->textField($model, 'cc_nitrite', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_nitrite'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_urobilinogen'); ?>
                <?php echo $form->textField($model, 'cc_urobilinogen', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_urobilinogen'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_protein'); ?>
                <?php echo $form->textField($model, 'cc_protein', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_protein'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_ph'); ?>
                <?php echo $form->textField($model, 'cc_ph', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_ph'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_blood'); ?>
                <?php echo $form->textField($model, 'cc_blood', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_blood'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_ketones'); ?>
                <?php echo $form->textField($model, 'cc_ketones', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_ketones'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_bilirubin'); ?>
                <?php echo $form->textField($model, 'cc_bilirubin', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_bilirubin'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'cc_glucose'); ?>
                <?php echo $form->textField($model, 'cc_glucose', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'cc_glucose'); ?>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Microscopic</legend>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'm_puscell'); ?>
                <?php echo $form->textField($model, 'm_puscell', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'm_puscell'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'm_rbc'); ?>
                <?php echo $form->textField($model, 'm_rbc', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'm_rbc'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'm_epitelial_cells'); ?>
                <?php echo $form->textField($model, 'm_epitelial_cells', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'm_epitelial_cells'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'm_mucus_threads'); ?>
                <?php echo $form->textField($model, 'm_mucus_threads', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'm_mucus_threads'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <fieldset>
                    <legend>Crystals</legend>
                    <div class="newline">
                        <div class="row line">
                            <?php echo $form->labelEx($model, 'c_amorph_urates'); ?>
                            <?php echo $form->textField($model, 'c_amorph_urates', array('size' => 30, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'c_amorph_urates'); ?>
                        </div>
                    </div>  
                    <div class="newline">
                        <div class="row line">
                            <?php echo $form->labelEx($model, 'c_amorph_phosphates'); ?>
                            <?php echo $form->textField($model, 'c_amorph_phosphates', array('size' => 30, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'c_amorph_phosphates'); ?>
                        </div>
                    </div>  
                    <div class="newline">
                        <div class="row line">
                            <?php echo $form->labelEx($model, 'c_triple_phospate'); ?>
                            <?php echo $form->textField($model, 'c_triple_phospate', array('size' => 30, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'c_triple_phospate'); ?>
                        </div>
                    </div>
                    <div class="newline">
                        <div class="row line">
                            <?php echo $form->labelEx($model, 'c_calcium_oxalate'); ?>
                            <?php echo $form->textField($model, 'c_calcium_oxalate', array('size' => 30, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'c_calcium_oxalate'); ?>
                        </div>
                    </div>  
                    <div class="newline">
                        <div class="row line">
                            <?php echo $form->labelEx($model, 'c_uric_acid'); ?>
                            <?php echo $form->textField($model, 'c_uric_acid', array('size' => 30, 'maxlength' => 250)); ?>
                            <?php echo $form->error($model, 'c_uric_acid'); ?>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'bacteria'); ?>
                <?php echo $form->textField($model, 'bacteria', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'bacteria'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'casts'); ?>
                <?php echo $form->textField($model, 'casts', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'casts'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'others'); ?>
                <?php echo $form->textArea($model, 'others', array('cols' => 30, 'rows' => 3, 'maxlength' => 150)); ?>
                <?php echo $form->error($model, 'others'); ?>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Personnel Information</legend>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'med_tech'); ?>
                <?php echo $form->textField($model, 'med_tech', array('size' => 30, 'maxlength' => 200, 'readonly' => 'readonly')); ?>
                <?php echo $form->error($model, 'med_tech'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'licenseno'); ?>
                <?php echo $form->textField($model, 'licenseno', array('size' => 30, 'maxlength' => 200, 'readonly' => 'readonly')); ?>
                <?php echo $form->error($model, 'licenseno'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'pathologist'); ?>
                <?php echo $form->textField($model, 'pathologist', array('size' => 30, 'maxlength' => 200, 'readonly' => 'readonly', 'value'=> $diagSettings->pathologist_name)); ?>
                <?php echo $form->error($model, 'pathologist'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'pathologist_licenseno'); ?>
                <?php echo $form->textField($model, 'pathologist_licenseno', array('size' => 30, 'maxlength' => 200, 'readonly' => 'readonly', 'value'=> $diagSettings->pathologist_license_no)); ?>
                <?php echo $form->error($model, 'pathologist_licenseno'); ?>
            </div>
        </div>
    </fieldset>

    <div class="row" style="display:none;">
        <?php echo $form->labelEx($model, 'patient_id'); ?>
        <input type="hidden" name="DiagUrinalysisNew[patient_id]" value="<?= $patientid ?>">
        <?php echo $form->textField($model, 'patient_id', array('size' => 20, 'maxlength' => 20, 'value' => $patientid)); ?>
        <?php echo $form->error($model, 'patient_id'); ?>
    </div>
    
    <div class="row" style="display:none;">
        <input type="hidden" name="DiagUrinalysisNew[datecreated]" value="<?= date("Y-m-d H:i:s") ?>">        
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('onclick' => 'return submitThis();')); ?>
        <?php echo CHtml::link(CHtml::button('Cancel'), array('diagurinalysisnew/admin'), array('style' => 'text-decoration:none;')); ?>
    </div>

<?php $this->endWidget(); ?>

</div>

<script>
submitThis = function() {
    if (confirm("Are you sure you want to save this result? \r\nYou will need an Administrator to edit this once saved.")) {            
        return true;
    } else {
        return false;
    }    
}
</script>