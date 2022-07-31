<?php

namespace App\Models;

use CodeIgniter\Model;

class TblSignSympDetails extends Model{

protected $table = 'tbl_signsymp_details';
protected $primaryKey = 'signsympdetails_id';
protected $allowedfields = ['signsympdetails_name','visit_id','patient_id','signsymp_id','is_deleted'];

public function fetchSignSympDetails($pid,$vid){

    $sign_symp_details = $this->asArray()
                      ->where('patient_id',$pid)
                      ->where('visit_id',$vid)
                      ->findAll();                 
    for($i=0; $i<count($sign_symp_details); $i++){
        $sign_symp_details[$i] = $sign_symp_details[$i]['signsympdetails_name']; 
    }
    return $sign_symp_details;
}
}