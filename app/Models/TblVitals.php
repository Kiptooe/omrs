<?php

namespace App\Models;

use CodeIgniter\Model;

class TblVitals extends Model{
    
protected $table = 'tbl_vitals';
protected $primaryKey = 'vital_id';
protected $allowedfields = ['patient_id','visit_id','date','systolic_pressure','diastolic_pressure','temperature','weight','role_id','pulse_rate','is_deleted'];

public function fetchVitals($id){

    $vitals=$this->asArray()
                 ->where('patient_id',$id)
                 ->orderBy('visit_id','DESC')
                 ->first();

    if($vitals['systolic_pressure']<90 && $vitals['diastolic_pressure']<60){
        $vitals['systolic_pressure'] = 'Low';
    }elseif ($vitals['systolic_pressure']>=140 && $vitals['diastolic_pressure']<90) {
        $vitals['systolic_pressure'] = 'Isolated systolic hypertension';
    }elseif ($vitals['systolic_pressure']>90 && $vitals['systolic_pressure']<120 && $vitals['diastolic_pressure']>60 && $vitals['diastolic_pressure']<80){
        $vitals['systolic_pressure'] = 'Optimal';
    }elseif ($vitals['systolic_pressure']>=120 && $vitals['systolic_pressure']<140 && $vitals['diastolic_pressure']>=80 && $vitals['diastolic_pressure']<90){
        $vitals['systolic_pressure'] = 'Normal';
    }elseif ($vitals['systolic_pressure']>=140 && $vitals['diastolic_pressure']>=90) {
        $vitals['systolic_pressure'] = 'Hypertensive';
    }

    $vitals = array('Blood Pressure'=>$vitals['systolic_pressure'],
                    'Temperature'=>$vitals['temperature'],
                    'Weight'=>$vitals['weight'],
                    'Pulse Rate'=>$vitals['pulse_rate']
                    );

                 return $vitals;
}

}