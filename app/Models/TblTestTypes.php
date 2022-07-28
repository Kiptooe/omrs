<?php

namespace App\Models;

use CodeIgniter\Model;

class TblTestTypes extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_test_types';
	protected $primaryKey='test_type_id';
	protected $allowedFields=['test_type_name','is_deleted'];

}