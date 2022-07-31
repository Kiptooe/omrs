<?php

namespace App\Controllers;
use App\Models\TblVitals;
use App\Models\TblSignSympDetails;
use App\Models\TblPrescribedTestDetails;
use App\Models\TblDiagnosis;
use App\Models\TblPrescribedMedicineDetails;



class Patientroles extends BaseController
{
    public function getPage($page)
    {
        echo view('/Templete/head.php');        
        echo view($page);
        echo view('/Templete/foot.php');
    }
    public function getSummary($page,$pid,$vid)
    {
        $tv = new TblVitals();
        $summary['vitals'] = $tv->fetchVitals($pid);

        $ts = new TblSignSympDetails();
        $summary['sign_symp_details'] = $ts->fetchSignSympDetails($pid,$vid);
        
        $tt = new TblPrescribedTestDetails();
        $summary['prescribed_test_details'] = $tt->fetchTestDetails($pid,$vid);
        
        $td = new Diagnosis();
        $summary['diagnosis'] = $td->fetchDiagnosis($pid,$vid);

        $tp = new TblPrescribedMedicineDetails();
        $summary['medicine'] = $tp->fetchMedicine($pid,$vid);
       
        print_r($summary);exit;

        echo view($page,$summary);

    }
}
