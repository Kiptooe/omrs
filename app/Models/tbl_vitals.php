<?php

namespace App\Models;

use CodeIgniter\Model;

class tbl_vitals extends Model{
    
protected $table = 'tbl_vitals';
protected $primaryKey = 'vital_id';
protected $allowedfields = ['patient_id','visit_id','date','blood_pressure','temperature','weight','role_id','pulse_rate','is_deleted'];

public function fetchVitals($id){

    $vitals=$this->asArray()
                 ->where('patient_id',$id)
                 ->orderBy('visit_id','DESC')
                 ->first();

    $vitals = array('Blood Pressure'=>$vitals['blood_pressure'],
                    'Temperature'=>$vitals['temperature'],
                    'Weight'=>$vitals['weight'],
                    'Pulse Rate'=>$vitals['pulse_rate']
                    );

                 return $vitals;
}

}