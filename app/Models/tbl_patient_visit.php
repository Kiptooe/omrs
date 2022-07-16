<?php

namespace App\Models;

use CodeIgniter\Model;

class tbl_patient_visit extends Model{
    
protected $table = 'tbl_patient_visit';
protected $primaryKey = 'visit_id';
protected $allowedfields = ['patient_id','visit_date','visit_time','is_deleted'];

}