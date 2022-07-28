<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPatientLogin extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_patient_login';
	protected $primaryKey='login_id';
	protected $allowedFields=['admin_id','is_deleted','ip_address','login_time','logout_time','login_time'];

}