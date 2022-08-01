<?php

namespace App\Controllers;
use App\Models\TblVitals;
use App\Models\TblSignSympDetails;
use App\Models\TblPrescribedTestDetails;
use App\Models\TblDiagnosis;
use App\Models\TblPrescribedMedicineDetails;
use App\Models\TblPatientVisit;



class Patientroles extends BaseController
{
    public function getVisits($pid)
    {
    $tv = new TblPatientVisit();
    $visits['visits'] = $tv->fetchVisits($pid);
    
    echo view('Templete/head');
    echo view('Patient\Dashboard/PastVisit',$visits);
    echo view('Templete/foot');    
    }
    public function getSummary($pid)
    {

        $tv = new TblPatientVisit();
        $vid = $tv->fetchVisit($pid);

        $tv = new TblVitals();
        $summary['vitals'] = $tv->fetchVitals($pid);

        $ts = new TblSignSympDetails();
        $summary['signs_symptoms'] = $ts->fetchSignSympDetails($pid,$vid);
        
        $tt = new TblPrescribedTestDetails();
        $summary['prescribed_tests'] = $tt->fetchTestDetails($pid,$vid);
        
        $td = new TblDiagnosis();
        $summary['diagnosis'] = $td->fetchDiagnosis($pid,$vid);

        $tp = new TblPrescribedMedicineDetails();
        $summary['prescriptions'] = $tp->fetchMedicine($pid,$vid);

        // $session = session();
        // $user = $session->get('login_data');

        echo view('Templete/head');
        echo view('Patient\Dashboard/VisitSummary',$summary);
        echo view('Templete/foot');
    }
}
