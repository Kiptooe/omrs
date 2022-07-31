<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPrescribedTestDetails extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_prescribed_test_details';
	protected $primaryKey='test_detail_id';
	protected $allowedFields=['test_id','is_deleted','detail_name','visit_id','patient_id'];

	public function fetchTestDetails($pid,$vid){

		$test_details = $this->asArray()
						  ->where('patient_id',$pid)
						  ->where('visit_id',$vid)
						  ->findAll();                 
		for($i=0; $i<count($test_details); $i++){
			$test_details[$i] = $test_details[$i]['detail_name']; 
		}
		return $test_details;
	}

}