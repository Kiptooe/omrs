<?php

namespace App\Models;

use CodeIgniter\Model;

class Tblsignsymp extends Model{

protected $table = 'tbl_signsymp';
protected $primaryKey = 'signsymp_id';
protected $allowedfields = ['signsymp_name','visit_id','patient_id','added_by','is_deleted'];

public function fetchSignSymp($id){

    $sign_symp = $this->asArray()
                      ->where('patient_id',$id)
                      ->orderBy('visit_id','desc')
                      ->first();  
    $sign_symp = array('Signs and Symptoms'=>$sign_symp['signsymp_name']);
    
    return $sign_symp;
}

}