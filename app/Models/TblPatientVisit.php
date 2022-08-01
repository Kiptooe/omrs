<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPatientVisit extends Model{
    
protected $table = 'tbl_patient_visit';
protected $primaryKey = 'visit_id';
protected $allowedFields = ['patient_id','visit_date','visit_time','is_deleted'];








public function fetchVisit($pid){

    $visit = $this->asArray()
                  ->where('patient_id',$pid)
                  ->orderBy('visit_id','desc')
                  ->first();
    return $visit['visit_id'];                
}
public function fetchVisits($pid)
{
    $visits = $this->asArray()
                   ->where('patient_id',$pid)
                   ->orderBy('visit_date','desc') 
                   ->findAll();
          
    if(count($visits)>1) {
    for($i=0; $i<count($visits) ;$i++){
     $visits[$i] = $visits[$i]['visit_date'];   
    }

    return $visits;
    }else {
    return $visits;
    }
                              
}



}