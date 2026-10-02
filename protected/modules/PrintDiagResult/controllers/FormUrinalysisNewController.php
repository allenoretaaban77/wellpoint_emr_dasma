<?php

class FormUrinalysisNewController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionPrint()
    {
        $resultid = $_GET["resultid"];
        $model = DiagUrinalysisNew::model()->findByPk((int)$resultid); 
        $url = Yii::app()->getBasePath();
        
        $print = implode("", file(Yii::app()->getBasePath() . '/modules/PrintDiagResult/includes/PrintFormUrinalysisNew.html'));
        $logo = 'http://' . $_SERVER["HTTP_HOST"] . '/images/printdiagresult/wpprintlogo.png';

        $settings = Settings::model()->findByPk(1);   
        $print = str_replace("[bacoor_address_html]", $settings->bacoor_address_html, $print);
        $print = str_replace("[dasma_address_html]", $settings->dasma_address_html, $print);
        $print = str_replace("[address]", $settings->address, $print);
        
        $print = str_replace("[logopath]", $logo, $print);
        $print = str_replace("[resultno]", strtoupper($model->result_no), $print);
        $print = str_replace("[name]", strtoupper($model->name), $print);  
        $print = str_replace("[age]", strtoupper($model->age), $print);  
        $print = str_replace("[sex]", strtoupper($model->sex), $print); 
        $print = str_replace("[requesting_physician]", strtoupper($model->requesting_physician), $print); 
        $print = str_replace("[spno]", strtoupper($model->sp_no), $print); 
        
        // Physical Characteristics
        $print = str_replace("[pccolor]", strtoupper($model->pc_color), $print); 
        $print = str_replace("[pctranparency]", strtoupper($model->pc_tranparency), $print); 
        $print = str_replace("[pcspecificgravity]", strtoupper($model->pc_specific_gravity), $print); 
        
        // Chemical Characteristics
        $print = str_replace("[ccleukocyteesterase]", strtoupper($model->cc_leukocyte_esterase), $print);
        $print = str_replace("[ccnitrite]", strtoupper($model->cc_nitrite), $print);
        $print = str_replace("[ccurobilinogen]", strtoupper($model->cc_urobilinogen), $print);
        $print = str_replace("[ccprotein]", strtoupper($model->cc_protein), $print); 
        $print = str_replace("[ccph]", strtoupper($model->cc_ph), $print); 
        $print = str_replace("[ccblood]", strtoupper($model->cc_blood), $print);
        $print = str_replace("[ccketones]", strtoupper($model->cc_ketones), $print);
        $print = str_replace("[ccbilirubin]", strtoupper($model->cc_bilirubin), $print);
        $print = str_replace("[ccglucose]", strtoupper($model->cc_glucose), $print); 
        
        // Microscopic
        $print = str_replace("[mpuscell]", strtoupper($model->m_puscell), $print); 
        $print = str_replace("[mrbc]", strtoupper($model->m_rbc), $print); 
        $print = str_replace("[mepitelialcells]", strtoupper($model->m_epitelial_cells), $print); 
        $print = str_replace("[mmucusthreads]", strtoupper($model->m_mucus_threads), $print); 
        
        // Crystals
        $print = str_replace("[camorphurates]", strtoupper($model->c_amorph_urates), $print); 
        $print = str_replace("[camorphphosphates]", strtoupper($model->c_amorph_phosphates), $print); 
        $print = str_replace("[ctriplephospate]", strtoupper($model->c_triple_phospate), $print); 
        $print = str_replace("[calciumoxalate]", strtoupper($model->c_calcium_oxalate), $print);
        $print = str_replace("[curicacid]", strtoupper($model->c_uric_acid), $print); 
        
        // Others
        $print = str_replace("[bacteria]", strtoupper($model->bacteria), $print); 
        $print = str_replace("[casts]", strtoupper($model->casts), $print); 
        $print = str_replace("[pregnancy]", strtoupper($model->pregnancy_test), $print); 
        $print = str_replace("[others]", strtoupper($model->others), $print); 
        
        // Dates
        $daterequested = (empty($model->daterequested) || $model->daterequested == '0000-00-00') ? "" : date('m/d/Y', strtotime($model->daterequested));
        $print = str_replace("[daterequested]", $daterequested, $print); 
        
        $datereleased = (empty($model->datereleased) || $model->datereleased == '0000-00-00') ? "" : date('m/d/Y', strtotime($model->datereleased));
        $print = str_replace("[datereleased]", $datereleased, $print);
        
        // Staff & Signatures
        $print = str_replace("[medtech]", strtoupper($model->med_tech), $print); 
        $print = str_replace("[licenseno]", strtoupper($model->licenseno), $print); 
        $print = str_replace("[pathologist]", strtoupper($model->pathologist), $print); 
        $print = str_replace("[patlicenseno]", strtoupper($model->pathologist_licenseno), $print);  
        $print = str_replace("[patientid]", $model->patient_id, $print);   
        
        echo $print;
        exit;
    }
}