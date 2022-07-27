<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPatient extends Model{
    
protected $table = 'tbl_patient';
protected $primaryKey = 'patient_id';
protected $allowedfields = ['first_name','last_name','email','password','national_id','gender','role_id','mobile_no','added_by','registered_at','updated_at','is_deleted'];


// public function fetchVitals($user = array)
// {
    
// }






}