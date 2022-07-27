<?php

namespace App\Models;

use CodeIgniter\Model;

class TblAdmin extends Model
{
	protected $DBGroup              = 'default'; // default database group
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	protected $table='tbl_admin';
	protected $primaryKey='admin_id';
	protected $allowedFields=['password','is_deleted','firstname','lastname','email','gender','mobile_number','national_id','updated_at','key'];
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
        
        if(isset($data['data']['key'])){

            $data['data']['key']=password_hash($data['data']['key'], PASSWORD_DEFAULT);

        }
        
        return $data;
    }


    // public function login(array $data){

    //      $admin=$this->asArray()
    //                 ->where('national_id',$data['national_id'])
    //                 ->first();

    //      if(!$admin){
    //             return false;
    //         }
    //         else{

    //             $verify=password_verify($data['password'], $admin['password']);

    //             if (! $verify) {
    //                 // code...

    //                 return false;
    //             }
    //             else{
    //                 return $admin;
    //             }
    //         }
    // }

    public function verify_admin(array $data){

        $tbl_empty=$this->asArray()->findAll();

        if (!$tbl_empty) {
            // code...
            return 0;
        }

         $admin=$this->asArray()
                    ->where('national_id',$data['username'])
                    ->first();

         if(!$admin){
                return 1;
            }
            else{

                $verify=password_verify($data['password'], $admin['password']);

                if (! $verify) {
                    // code...

                    return 1;
                }
                else{
                    return $admin;
                }
            }
    }

}
