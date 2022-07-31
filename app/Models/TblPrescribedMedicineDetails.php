<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPrescribedMedicineDetails extends Model
{
	
	protected $table='tbl_medicine_prescription_details';
	protected $primaryKey='prescribed_id';
	protected $allowedFields=['prescription_id','is_deleted','quantity','medicine_id','visit_id','patient_id'];

	public function fetchMedicine($pid,$vid){

		$medicine_details = $this->asArray()
						  ->where('patient_id',$pid)
						  ->where('visit_id',$vid)
						  ->findAll();                 
		for($i=0; $i<count($medicine_details); $i++){
			$medicine_details[$i] = $medicine_details[$i]['detail_name']; 
		}
		return $medicine_details;
	}

}