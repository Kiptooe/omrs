<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TblMedicine;

class TblPrescribedMedicineDetails extends Model
{
	
	protected $table='tbl_medicine_prescription_details';
	protected $primaryKey='prescribed_id';
	protected $allowedFields=['prescription_id','is_deleted','quantity','medicine_id','visit_id','patient_id'];

	public function fetchMedicine($pid,$vid){

		$tm = new TblMedicine();
		$medicine = [];
		$medicine_details = $this->asArray()
						  ->where('patient_id',$pid)
						  ->where('visit_id',$vid)
						  ->findAll();                 
		for($i=0; $i<count($medicine_details); $i++){
			$medicine_details[$i] = $medicine_details[$i]['medicine_id']; 
		
		$medicine[$i] = $tm->fetchMedicine($medicine_details[$i]);

		}
		
		return $medicine;
	}

}