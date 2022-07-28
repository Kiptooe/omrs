<?php

namespace App\Models;

use CodeIgniter\Model;

class TblLabTestResults extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_lab_test_results';
	protected $primaryKey='result_id';
	protected $allowedFields=['added_by','is_deleted','uploaded_at'];

}