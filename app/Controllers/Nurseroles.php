<?php

namespace App\Controllers;
use App\Models\TblVitals;
use App\Models\TblSignSympDetails;
use App\Models\TblPrescribedTestDetails;
use App\Models\TblDiagnosis;
use App\Models\TblPrescribedMedicineDetails;
use App\Models\TblPatientVisit;
use App\Models\TblPatient;

// $validation = \Config\Services::validation();
// $session = session();
date_default_timezone_set('Africa/Nairobi');

class Nurseroles extends BaseController
{
   
   public function postsearchPatient(){

    $error = $this->validate([
        'national_id' => 'min_length[8]|max_length[8]'

    ]);

    if(!$error){
        echo view('Templete/head');
        echo view('Nurse/Dashboard/search',['error' => $this->validator]);
        echo view('Templete/foot');
    }else{

        $nid = $_POST['national_id'];

        $tp = new TblPatient();
        $patient['patient']['pid'] = $tp->searchpatient($nid);

        if ($patient['patient']['pid']==false){
        // $session->setFlashdata('iderror','incorrect Id, please try again');
        echo view('Templete/head');
        echo view('Nurse/Dashboard/search');
        echo view('Templete/foot');            
        }else{

         $tv = new TblPatientVisit();
         $patient['patient']['vid'] = $tv->fetchVisit($patient['patient']['pid']);    
         
         echo view('Templete/head');
         echo view('Nurse/Dashboard/addvitals',$patient);
         echo view('Templete/foot');
        

        }


    }

   }
   
    public function getshow($page)
    {
     echo view('Templete/head');
     echo view('Nurse\Dashboard/'.$page);
     echo view('Templete/foot');
    }
    public function getSummary($pid)
    {

        
        echo view('Templete/head');
        echo view('Patient\Dashboard/VisitSummary',$summary);
        echo view('Templete/foot');
    }

    public function postVitals(){

        $vitals = array(
            'systolic_pressure'=>$_POST['systolic_pressure'],
            'diastolic_pressure'=>$_POST['diastolic_pressure'],
            'temperature'=>$_POST['temperature'],
            'weight'=>$_POST['weight'],
            'pulse_rate'=>$_POST['pulse_rate'],
            'visit_id'=>$_POST['visit_id'],
            'patient_id'=>$_POST['patient_id'],
        );

        $vitals['date'] = date(DATE_ATOM,time());

        $rv = new TblVitals();
        $rv->recordVitals($vitals);

    }
}
