<?php

namespace App\Models;

use CodeIgniter\Model;

class TblLabTestResultsDetails extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_lab_test_results_details';
	protected $primaryKey='result_details_id';
	protected $allowedFields=['file_name','is_deleted','uploaded_at','result_id'];

}