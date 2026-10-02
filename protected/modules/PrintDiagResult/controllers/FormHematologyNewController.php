<?php

class FormHematologyNewController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionPrint()
    {
        $resultid = $_GET["resultid"];
        $model = DiagHematologyNew::model()->findByPk((int)$resultid); 
        $url = Yii::app()->getBasePath();
        
        $print = implode("", file(Yii::app()->getBasePath() . '/modules/PrintDiagResult/includes/PrintFormHematologyNew.html'));
        $logo = 'http://' . $_SERVER["HTTP_HOST"] . '/images/printdiagresult/wpprintlogo.png';

        $settings = Settings::model()->findByPk(1);   
        $print = str_replace("[bacoor_address_html]", $settings->bacoor_address_html, $print);
        $print = str_replace("[dasma_address_html]", $settings->dasma_address_html, $print);
        $print = str_replace("[address]", $settings->address, $print);
        
        $print = str_replace("[logopath]", $logo, $print);
        $print = str_replace("[name]", strtoupper($model->name), $print);  
        $print = str_replace("[age]", strtoupper($model->age), $print);  
        $print = str_replace("[sex]", strtoupper($model->sex), $print); 
        $print = str_replace("[requesting_physician]", strtoupper($model->requestingphysician), $print); 
        $print = str_replace("[spno]", strtoupper($model->spno), $print); 
        
        // Hematology Results
        $print = str_replace("[rbc]", strtoupper($model->rbc), $print); 
        $print = str_replace("[hemoglobin]", strtoupper($model->hemoglobin), $print); 
        $print = str_replace("[hematocrit]", strtoupper($model->hematocrit), $print); 
        $print = str_replace("[wbc]", strtoupper($model->wbc), $print); 
        $print = str_replace("[neutrophils]", strtoupper($model->neutrophils), $print); 
        $print = str_replace("[lymphocytes]", strtoupper($model->lymphocytes), $print); 
        $print = str_replace("[monocytes]", strtoupper($model->monocytes), $print); 
        $print = str_replace("[eosinophils]", strtoupper($model->eosinophils), $print); 
        $print = str_replace("[basophils]", strtoupper($model->basophils), $print); 
        $print = str_replace("[platelet]", strtoupper($model->platelet), $print); 
        $print = str_replace("[mcv]", strtoupper($model->mcv), $print); 
        $print = str_replace("[mch]", strtoupper($model->mch), $print); 
        $print = str_replace("[mchc]", strtoupper($model->mchc), $print); 
        $print = str_replace("[rdw]", strtoupper($model->rdw), $print); 
        $print = str_replace("[rdw_sd]", strtoupper($model->rdw_sd), $print); 
        
        // Dates
        $datereceived = (empty($model->datereceived) || $model->datereceived == '0000-00-00') ? "" : date('m/d/Y', strtotime($model->datereceived));
        $print = str_replace("[datereceived]", $datereceived, $print); 
        
        $datereleased = (empty($model->datereleased) || $model->datereleased == '0000-00-00') ? "" : date('m/d/Y', strtotime($model->datereleased));
        $print = str_replace("[datereleased]", $datereleased, $print);
        
        // Staff & Signatures
        $print = str_replace("[medicaltechnologist]", strtoupper($model->medicaltechnologist), $print); 
        $print = str_replace("[licenseno]", strtoupper($model->licenseno), $print); 
        $print = str_replace("[pathologist]", strtoupper($model->pathologist), $print); 
        $print = str_replace("[pathologist_licenseno]", strtoupper($model->pathologist_licenseno), $print);  
        $print = str_replace("[patientid]", $model->patient_id, $print);   
        
        echo $print;
        exit;
    }
}