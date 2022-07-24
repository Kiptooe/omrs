<?php

namespace App\Models;

use CodeIgniter\Model;

class Tbl_Employee extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_employee';
	protected $primaryKey='employee_id';
	protected $allowedFields=['password','is_deleted','firstname','lastname','email','gender','mobile_number','national_id','updated_at'];
	protected $beforeInsert=['beforeInsert'];
    protected $beforeUpdate=['beforeUpdate'];

    protected function beforeInsert(array $data){
        $data=$this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data){
        $data=$this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data){

        if (isset($data['data']['password'])) {
            // code...
            $data['data']['password']=password_hash($data['data']['password'], PASSWORD_DEFAULT);
            
        }
        
        
        return $data;
    }

    

    public function login(array $data){

        $employee=$this->asArray()
            ->where('national_id',$data['username'])
            ->first();

        if(!$employee){

            return false;

        }

        $verify=password_verify($data['password'], $employee['password']);

        if (! $verify) {
            // code...

            return false;
        }
        else{
                
            return $employee;

        }
    }


    

    

}
