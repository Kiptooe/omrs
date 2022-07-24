<?php

namespace App\Controllers;
// use App\Controllers\BaseController;
use App\Controllers\Registration;
use App\Controllers\home;
// use App\Controllers\Sections\home_;
use App\Models\Tbl_Admin;
use App\Models\Tbl_Role;
use App\Models\tbl_employee;
use App\Models\tbl_patient;
// use App\Models\db_cashier;
// use App\Models\db_branch;
// use App\Models\db_attendance;
// use App\Models\db_employee;



class Login extends Home
{

    public function get_ip_address(){

        
    //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  

    //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        } 

    //whether ip is from the remote address  
        else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
        }

        $_SESSION['ip_address']=$ip;

        return $ip;

    }


    // public function index($address,$branch_id)
    // {
    //     $db_login=new db_login();
    //     $home=new home();
    //     $login=new login();

        
    //     $ip=$login->get_ip_address();

        

    //         $mydate=$home->date('now');


    //         $login_details=[
    //             'cashier_id'=>$address,
    //             'ip_address'=>$ip,
    //             'login_time'=>$mydate,
    //             'logout_time'=>$mydate,
    //             'branch_id'=>$branch_id
    //         ];
    
    //         $login_data=$db_login->where('cashier_id',$login_details['cashier_id'])->first();

    //         if ($login_data) {
    //                             // code...
    //             $login_details1=[
    //                     'cashier_id'=>$address,
    //                     'ip_address'=>$ip,
    //                     'login_time'=>$mydate,
    //                     'branch_id'=>$branch_id,
    //                     'is_deleted'=>0
    //             ];


    //             $db_login->update($login_data['login_id'],$login_details1);

    //         }
    //         else{
    //             $db_login->save($login_details);
    //         }

    // }

   

    public function validate_data(){

        $tbl_role=new tbl_role();
        $login=new login();
        $tbl_admin=new tbl_admin();
        $tbl_employee=new tbl_employee();
        $tbl_patient=new tbl_patient();
        $registration=new Registration();
        $home=new home();

        $login->get_ip_address();

        $time=$home->date('now');

        $time=$time->toTimeString();
            
        $password=$this->request->getPost('password');
        $key=$this->request->getPost('key');

        
            $salt_password=$home->salt_password($password);
            $salt_key=$home->salt_password($key);

            $login_data=[
                'password'=>$salt_password,
                'username'=>$this->request->getPost('username'),
                'key'=>$salt_key
            ];
    
            $is_admin=$tbl_admin->verify_admin($login_data);
    

            $_SESSION['login_data']='';
            $_SESSION['role']='';


            if (! $is_admin && !is_array($is_admin)) {
                // code...

                $is_employee=$tbl_employee->login($login_data);

                if (! $is_employee) {

                    $is_patient=$tbl_patient->login($login_data);

                    if ($is_patient) {
                        # code...

                        $login->index($is_patient['cashier_id']);

                        $_SESSION['login_data']=$is_patient;
                        $_SESSION['role']='Patient';

                        echo 1;exit();

                    }else{
                        echo 'Invalid Username or Password';exit();
                    }


                }
                else{

                    print_r($is_employee);exit();

                    $role_name=$tbl_role->where('role_id',$is_employee['role_id'])->first();

                    $_SESSION['login_data']=$is_employee;
                    $_SESSION['role']=$role_name['role_name'];
                    
                    echo 1;exit();


                }
                

            }
            else{

                $_SESSION['login_data']=$is_admin;
                $_SESSION['role']='Administrator';
                

                echo 1;exit();

            }
            
    }

    function login(){
       

        $tbl_role=new tbl_role();
        $login=new login();
        $tbl_admin=new tbl_admin();
        $tbl_employee=new tbl_employee();
        $tbl_patient=new tbl_patient();
        $registration=new Registration();
        $home=new home();

        

        $all['cashier_data']=$_SESSION['login_data'];
        $all['role_name']=$_SESSION['role'];

        setcookie("logedIn_data",json_encode($all),time()+1*24*60*60,"/");


        
            $folder=$_SESSION['role'];
            $_SESSION['folder']=$_SESSION['role'];


        // $_SESSION['logedIn_data']=$cashier_data;

        // $_SESSION['cashier_id']=$cashier_data['cashier_data']['cashier_id'];


        // $all['dashboard_data']=$home_->dashbord_data();

        // $home_=new home_();

        // $home_->session_time();

        $all['title']="Administrator Dashboard";

        
        echo view('templete/head',$all);
        echo view($folder.'/dashboard/index');
        echo view('templete/foot');
    }


  
    

   
}
