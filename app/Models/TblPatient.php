<?php

namespace App\Models;

use CodeIgniter\Model;

class TblPatient extends Model{
    
protected $table = 'tbl_patient';
protected $primaryKey = 'patient_id';
protected $allowedFields = ['firstname','lastname','email','password','national_id','gender','mobile_number','registered_at','updated_at','is_deleted','birth_cert'];

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

        $patient=$this->asArray()
            ->where('national_id',$data['username'])
            ->first();

        if(!$patient){

        	$patient=$this->asArray()
            ->where('birth_cert',$data['username'])
            ->first();

            if(!$patient){
            	
            	return false;

        	}

        }

        $verify=password_verify($data['password'], $patient['password']);

        if (! $verify) {
            // code...

            return false;
        }
        else{
                
            return $patient;

        }
    }

    public function search($id){

    	$patient=$this->asArray()
            ->where('national_id',$id)
            ->first();



        if(!$patient){

        	$patient=$this->asArray()
            ->where('birth_cert',$id)
            ->first();

            if(!$patient){
            	
            	return false;

        	}
        	return $patient;


        }
        else{
        	return $patient;
        }


    }

}