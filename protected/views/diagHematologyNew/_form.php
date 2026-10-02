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
        $patientid = $_POST["DiagHematologyNew"]['patient_id'];
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
        'id' => 'diag-hematology-new-form',
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
                <?php echo $form->labelEx($model, 'datereceived'); ?>
                <?php echo $this->widget('zii.widgets.jui.CJuiDatePicker',
                    array(
                        'model' => $model,
                        'attribute' => 'datereceived',
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
                <?php echo $form->error($model, 'datereceived'); ?>
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
                <?php echo $form->labelEx($model, 'requestingphysician'); ?>
                <?php echo $form->textField($model, 'requestingphysician', array('size' => 50, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'requestingphysician'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'spno'); ?>
                <?php echo $form->textField($model, 'spno', array('size' => 20, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'spno'); ?>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'rbc'); ?>
                <?php echo $form->textField($model, 'rbc', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'rbc'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'hemoglobin'); ?>
                <?php echo $form->textField($model, 'hemoglobin', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'hemoglobin'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'hematocrit'); ?>
                <?php echo $form->textField($model, 'hematocrit', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'hematocrit'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'wbc'); ?>
                <?php echo $form->textField($model, 'wbc', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'wbc'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'neutrophils'); ?>
                <?php echo $form->textField($model, 'neutrophils', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'neutrophils'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'lymphocytes'); ?>
                <?php echo $form->textField($model, 'lymphocytes', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'lymphocytes'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'monocytes'); ?>
                <?php echo $form->textField($model, 'monocytes', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'monocytes'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'eosinophils'); ?>
                <?php echo $form->textField($model, 'eosinophils', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'eosinophils'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'basophils'); ?>
                <?php echo $form->textField($model, 'basophils', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'basophils'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'platelet'); ?>
                <?php echo $form->textField($model, 'platelet', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'platelet'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'mcv'); ?>
                <?php echo $form->textField($model, 'mcv', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'mcv'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'mch'); ?>
                <?php echo $form->textField($model, 'mch', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'mch'); ?>
            </div>
        </div>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'mchc'); ?>
                <?php echo $form->textField($model, 'mchc', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'mchc'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'rdw'); ?>
                <?php echo $form->textField($model, 'rdw', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'rdw'); ?>
            </div>
            <div class="row line">
                <?php echo $form->labelEx($model, 'rdw_sd'); ?>
                <?php echo $form->textField($model, 'rdw_sd', array('size' => 30, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'rdw_sd'); ?>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Personnel Information</legend>
        <div class="newline">
            <div class="row line">
                <?php echo $form->labelEx($model, 'medicaltechnologist'); ?>
                <?php echo $form->textField($model, 'medicaltechnologist', array('size' => 30, 'maxlength' => 200, 'readonly' => 'readonly')); ?>
                <?php echo $form->error($model, 'medicaltechnologist'); ?>
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
                <?php echo $form->textField($model, 'pathologist_licenseno', array('size' => 30, 'maxlength' => 200, 'readonly' => 'readonly', 'value'=> $diagSettings->pathologist_licenseno)); ?>
                <?php echo $form->error($model, 'pathologist_licenseno'); ?>
            </div>
        </div>
    </fieldset>

    <div class="row" style="display:none;">
        <?php echo $form->labelEx($model, 'patient_id'); ?>
        <input type="hidden" name="DiagHematologyNew[patient_id]" value="<?= $patientid ?>">
        <?php echo $form->textField($model, 'patient_id', array('size' => 20, 'maxlength' => 20, 'value' => $patientid)); ?>
        <?php echo $form->error($model, 'patient_id'); ?>
    </div>
    
    <div class="row" style="display:none;">
        <input type="hidden" name="DiagHematologyNew[datecreated]" value="<?= date("Y-m-d H:i:s") ?>">        
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('onclick' => 'return submitThis();')); ?>
        <?php echo CHtml::link(CHtml::button('Cancel'), array('diaghematologynew/admin'), array('style' => 'text-decoration:none;')); ?>
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