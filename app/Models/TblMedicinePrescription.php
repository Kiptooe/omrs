<?php

namespace App\Models;

use CodeIgniter\Model;

class TblMedicinePrescription extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_medicine_prescription';
	protected $primaryKey='prescription_id';
	protected $allowedFields=['visit_id','is_deleted','patient_id','prescribed_by','prescribed_at'];

}