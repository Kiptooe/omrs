<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPrescribedTest extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_prescribed_test';
	protected $primaryKey='test_id';
	protected $allowedFields=['patient_id','visit_id','is_deleted','prescribed_by'];

}