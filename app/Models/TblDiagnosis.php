<?php

namespace App\Models;

use CodeIgniter\Model;

class TblDiagnosis extends Model
{
  
	protected $table='tbl_diagnosis';
	protected $primaryKey='diagnosis_id';
	protected $allowedFields=['diagnosis','doctor_id','patient_id','visit_id','date', 'is_deleted'];

	public function fetchDiagnosis($pid,$vid){

		$diagnosis = $this->asArray()
						  ->where('patient_id',$pid)
						  ->where('visit_id',$vid)
						  ->first();                 
		return $diagnosis['diagnosis'];
	}

}