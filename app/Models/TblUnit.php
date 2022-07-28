<?php

namespace App\Models;

use CodeIgniter\Model;

class TblUnit extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_unit';
	protected $primaryKey='unit_id';
	protected $allowedFields=['unit_name','is_deleted'];

}