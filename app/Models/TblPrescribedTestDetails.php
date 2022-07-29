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
	protected $allowedFields=['test_id','is_deleted','test_type_id'];

}