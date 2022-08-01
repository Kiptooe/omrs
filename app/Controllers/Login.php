<?php

namespace App\Controllers;
// use App\Controllers\BaseController;
use App\Controllers\Registration;
use App\Controllers\home;
use App\Controllers\fetchData;
// use App\Controllers\Sections\home_;
use App\Models\TblAdmin;
use App\Models\TblAdminLogin;
use App\Models\TblRole;
use App\Models\tblEmployee;
use App\Models\tblEmployeeLogin;
use App\Models\tblPatient;
use App\Models\tblPatientLogin;
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


    public function getIndex($address,$role)
    {
        $tblAdminLogin=new tblAdminLogin();
        $tblPatientLogin=new tblPatientLogin();
        $tblEmployeeLogin=new tblEmployeeLogin();
        $home=new home();
        $login=new login();

        
        $ip=$login->get_ip_address();

        

            $mydate=$home->getDate('now');

            if ($role=='Administrator') {
                // code...
                $login_details=[
                'admin_id'=>$address,
                'ip_address'=>$ip,
                'login_time'=>$mydate,
                'is_deleted'=>0
                ];
                $login_data=$tblAdminLogin->where('admin_id',$login_details['admin_id'])->first();

                if ($login_data) {
                                // code...
                    $tblAdminLogin->update($login_data['login_id'],$login_details);

                }
                else{
                    $tblAdminLogin->save($login_details);
                }
            }
            else if ($role=='Patient') {
                // code...
                $login_details=[
                'patient_id'=>$address,
                'ip_address'=>$ip,
                'login_time'=>$mydate,
                'is_deleted'=>0
                ];
                $login_data=$tblPatientLogin->where('patient_id',$login_details['patient_id'])->first();

                if ($login_data) {

                    $tblPatientLogin->update($login_data['login_id'],$login_details);

                }
                else{
                    $tblPatientLogin->save($login_details);
                }
            }
            else if ($role='Employee') {
                // code...
                $login_details=[
                'employee_id'=>$address,
                'ip_address'=>$ip,
                'login_time'=>$mydate,
                'is_deleted'=>0
                ];
                $login_data=$tblEmployeeLogin->where('employee_id',$login_details['employee_id'])->first();

                if ($login_data) {
                                // code...
                    

                    $tblEmployeeLogin->update($login_data['login_id'],$login_details);

                }
                else{
                    $tblEmployeeLogin->save($login_details);
                }
            }


    }

   

    public function postValidate_data(){


        $tbl_role=new tblRole();
        $login=new login();
        $tbl_admin=new tblAdmin();
        $tbl_employee=new tblEmployee();
        $tbl_patient=new tblPatient();
        $registration=new Registration();
        $home=new home();


        // $time=$home->getDate('now');

        // $time=$time->toTimeString();
            
        $password=$this->request->getPost('password');
        $key=$this->request->getPost('key');

        
            $salt_password=$home->getSalt_password($password);
            $salt_key=$home->getSalt_password($key);

            $login_data=[
                'password'=>$salt_password,
                'username'=>$this->request->getPost('username'),
                'key'=>$salt_key
            ];
    
            $is_admin=$tbl_admin->verify_admin($login_data,'ghg');
    

            $_SESSION['login_data']='';
            $_SESSION['role']='';


            if (! $is_admin || !is_array($is_admin)) {
                // code...

                $is_employee=$tbl_employee->login($login_data);

                if (! $is_employee) {

                    $is_patient=$tbl_patient->login($login_data);

                    if ($is_patient) {
                        # code...

                        $login->getIndex($is_patient['patient_id'],'Patient');


                        $_SESSION['login_data']=$is_patient;
                        $_SESSION['role']='Patient';

                        echo 1;exit();

                    }else{
                        echo 'Invalid Username or Password';
                        exit();
                    }


                }
                else{

                    $role_name=$tbl_role->where('role_id',$is_employee['role_id'])->first();
                    $login->getIndex($is_employee['employee_id'],'Employee');

                    $_SESSION['login_data']=$is_employee;
                    $_SESSION['role']=$role_name['role_name'];

                    
                    echo 1;exit();


                }
                

            }
            else{
                $login->getIndex($is_admin['admin_id'],'Administrator');

                $_SESSION['login_data']=$is_admin;
                $_SESSION['role']='Administrator';
                

                echo 1;exit();

            }
            
    }

    function getlogin(){
       

        $tbl_role=new tblRole();
        $login=new login();
        $tbl_admin=new tblAdmin();
        $tbl_employee=new tblEmployee();
        $tbl_patient=new tblPatient();
        $registration=new Registration();
        $fetchData=new fetchData();
        $home=new home();

        

        $all['role_name']=$_SESSION['role'];

        setcookie("logedIn_data",json_encode($all),time()+1*24*60*60,"/");

        
        $folder=$_SESSION['role'];
        $_SESSION['folder']=$_SESSION['role'];

        $all['login_data']=$_SESSION['login_data'];


        $all['logedIn_data']=$_SESSION['login_data'];
        // $session = session();
        // $session->set('login_data',$_SESSION['login_data']);

        $all['dashboard_data']=$fetchData->getAdminHomePage();


        $all['title']=$_SESSION['role'];

        
        echo view('templete/head',$all);
        echo view($folder.'/dashboard/index');
        echo view('templete/foot');exit();
    }


  
    

   
}
