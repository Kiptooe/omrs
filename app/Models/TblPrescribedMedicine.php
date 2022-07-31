<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPrescribedMedicine extends Model
{
	protected $DBGroup              = 'default';
	protected $table='tbl_medicine_prescription';
	protected $primaryKey='prescription_id';
	protected $allowedFields=['visit_id','patient_id','prescribed_by','prescribed_at','is_deleted'];

}