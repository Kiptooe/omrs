<?php

namespace App\Models;

use CodeIgniter\Model;

class TblMedicine extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_medicine';
	protected $primaryKey='medicine_id';
	protected $allowedFields=['medicine_name','is_deleted','unit_id','medicine_price','medicine_quantity','expiry_date','updated_at'];

	public function fetchMedicine($mid)
	{
		$medicine = $this->asArray()
						 ->where('medicine_id',$mid)
						 ->first();
		return $medicine['medicine_name'];				 	
	}

}