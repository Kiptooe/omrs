<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPrescribedMedicine extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_prescribed_medicine';
	protected $primaryKey='prescribed_id';
	protected $allowedFields=['prescription_id','is_deleted','medicine_id','quantity'];

}