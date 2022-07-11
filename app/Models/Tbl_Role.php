<?php

namespace App\Models;

use CodeIgniter\Model;

class Tbl_Role extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_role';
	protected $primaryKey='role_id';
	protected $allowedFields=['role_name','is_deleted'];

}