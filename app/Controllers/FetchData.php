<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Controllers\registration;
use App\Controllers\login;
use App\Models\tblAdmin;
use App\Models\tblPatient;
use App\Models\tblEmployee;
use App\Models\tblRole;

class FetchData extends BaseController
{

    public function getAdminHomePage($message=null)
    {

        $tblRole=new tblRole();
        $registration=new registration();
        $tblAdmin=new tblAdmin();
        $tblPatient=new tblPatient();
        $tblEmployee=new tblEmployee();
        $home=new home();


        // ALL EMPLOYEES

        $all['all_employees_data']=$tblEmployee->where('is_deleted',0)->findAll();

        if($all['all_employees_data']){

            for($i=0;$i<count($all['all_employees_data']); $i++){

                $all['all_roles'][$i]=$tblRole->where('role_id',$all['all_employees_data'][$i]['role_id'])->first();
            }
        }

        // print_r(($all['all_roles']));exit();


        // ALL DOCTORS
        $all['role_data']=$tblRole->where('role_name','Doctor')->first();

        if ($all['role_data']) {
            // code...
        $all['doctors_data']=$tblEmployee->where('role_id',$all['role_data']['role_id'])->findAll();

        }
        else{
            $all['doctors_data']=[];
        }



        // ALL NURSES

        $all['role_data']=$tblRole->where('role_name','Nurse')->first();

        if ($all['role_data']) {
            // code...
        $all['nurse_data']=$tblEmployee->where('role_id',$all['role_data']['role_id'])->findAll();
        
        }
        else{
            $all['nurse_data']=[];
        }
        

        // ALL LAB TECHNICIANS
        $all['role_data']=$tblRole->where('role_name','Lab Technician')->first();

        if ($all['role_data']) {
            // code...
        $all['lab_tech_data']=$tblEmployee->where('role_id',$all['role_data']['role_id'])->findAll();
        
        }
        else{
            $all['lab_tech_data']=[];
        }
        


        // ALL RECEPTIONISTS
        $all['role_data']=$tblRole->where('role_name','Receptionist')->first();

        if ($all['role_data']) {
            // code...
        $all['receptionist_data']=$tblEmployee->where('role_id',$all['role_data']['role_id'])->findAll();

        }
        else{
            $all['receptionist_data']=[];
        }


        // ALL PATIENTS

        $all['patient_data']=[];//$tblPatient->findAll();

        
        // // ALL MEDICINES

        // $role_data=$tblRole->where('role_name','Doctor')->first();

        // if ($role_data) {
        //     // code...
        // $all['doctors_data']=$tblEmployee->where('role_id',$role_data['role_id'])->findAll();

        

        // // ALL EXPIRED MEDICINES
        // $role_data=$tblRole->where('role_name','Doctor')->first();

        // if ($role_data) {
        //     // code...
        // $all['doctors_data']=$tblEmployee->where('role_id',$role_data['role_id'])->findAll();


        return $all;

        

    }

    
}