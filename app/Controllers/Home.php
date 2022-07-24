<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Controllers\registration;
use App\Controllers\login;
use App\Models\tbl_admin;

class Home extends BaseController
{
   
    //  LANDING PAGE FUNCTION

    public function index($message=null)
    {
        // $db_branch=new db_branch();
        //  $home=new home();
        // $email=new email();



        // if ($message==null) {
        //     // code...

        //     if (isset($_COOKIE['logedIn_data'])) {
        //         // code...

        //         $data=json_decode($_COOKIE['logedIn_data'],true);

        //         $login_data=$db_login->where('cashier_id',$data['cashier_data']['cashier_id'])->first();

        //         $mydate=$home->date('now');


        //         $logOut_data=[
        //             'is_deleted'=>1,
        //             'logout_time'=>$mydate
        //         ];

        //         if ($login_data['is_deleted']==0) {
        //             // code...
        //             $db_login->update($login_data['login_id'],$logOut_data);

        //         }

        //     }
        // }



        // $branch['branch_data']=$db_branch->findAll();
        // $branch['session_expires']=$message;

            // $email->send_email('btgavygarvey@gmail.com');

        $all['title']='Medical Management System';



        echo view('templete/head',$all);
        echo view('index');
        echo view('templete/foot');exit();
    }

    

    function getPages(){

        if (isset($_REQUEST['reg'])) {
            // code...

            $all['title']='Registration';


            if ($_REQUEST['reg']==$_SESSION['code']) {
                // code...
                echo view('templete/head',$all);
                echo view('sections/registration');
                echo view('templete/foot');exit();
            }
        }

        if (isset($_REQUEST['pass'])) {
            // code...

            $all['title']='Reset Password';

            if ($_REQUEST['pass']==$_SESSION['code']) {
                // code...
                echo view('templete/head',$all);
                echo view('sections/password');
                echo view('templete/foot');exit();
            }
        }

        if (isset($_REQUEST['anm'])) {
            // code...

            $all['title']='New Medicine';
            $all['action']='add';


            if ($_REQUEST['anm']==$_SESSION['code']) {
                // code...
                echo view('templete/head',$all);
                echo view('sections/medicine/medicine');
                echo view('templete/foot');exit();
            }
        }

        // if (isset($_REQUEST['msr'])) {
        //     // code...

        //     $all['title']='Medicine Sales Report';

        //     if ($_REQUEST['msr']==$_SESSION['code']) {
        //         // code...
        //         echo view('templete/head',$all);
        //         echo view('sections/reports/medicine-report');
        //         echo view('templete/foot');exit();
        //     }
        // }

        if (isset($_REQUEST['gmr'])) {
            // code...

            $all['title']='General Medical Report';

            if ($_REQUEST['gmr']==$_SESSION['code']) {
                // code...
                echo view('templete/head',$all);
                echo view('sections/reports/general-report');
                echo view('templete/foot');exit();
            }
        }

        $all['directory']='management/staffs/staff';


        if (isset($_REQUEST['tsm'])) {
            // code...

            $all['title']='Staff Members';
            $all['header']='Staff Members';
            $all['staff']='Staff';

            if ($_REQUEST['tsm']==$_SESSION['code']) {
                // code...

            }
        }

        if (isset($_REQUEST['tpa'])) {
            // code...

            $all['title']='Patients';
            $all['header']='Patients';
            // $all['staff']='patients';

            if ($_REQUEST['tpa']==$_SESSION['code']) {
                // code...
            $all['directory']='management/patients/patient';


            }
        }

        if (isset($_REQUEST['td'])) {
            // code...

            $all['title']='Doctors';
            $all['header']='Doctors';

            if ($_REQUEST['td']==$_SESSION['code']) {
                // code...

            }
        }

        if (isset($_REQUEST['tn'])) {
            // code...

            $all['title']='Nurses';
            $all['header']='Nurses';

            if ($_REQUEST['tn']==$_SESSION['code']) {
                // code...

            }
        }

        if (isset($_REQUEST['tlt'])) {
            // code...

            $all['title']='Lab Technicians';
            $all['header']='Lab Technicians';

            if ($_REQUEST['tlt']==$_SESSION['code']) {
                // code...

            }
        }

        if (isset($_REQUEST['tr'])) {
            // code...

            $all['title']='Receptionists';
            $all['header']='Receptionists';

            if ($_REQUEST['tr']==$_SESSION['code']) {
                // code...


            }
        }

        if (isset($_REQUEST['tp'])) {
            // code...

            $all['title']='Pharmacists';
            $all['header']='Pharmacists';

            if ($_REQUEST['tp']==$_SESSION['code']) {
                // code...


            }
        }

        if (isset($_REQUEST['tam'])) {
            // code...

            $all['title']='Available Medicine';
            $all['header']='Available Medicine';
            $all['action']='view';
            $all['expired']='expired';


            if ($_REQUEST['tam']==$_SESSION['code']) {
                // code...
                $all['directory']='medicine/medicine';

            }
        }

        if (isset($_REQUEST['tem'])) {
            // code...

            $all['title']='Expired Medicine';
            $all['header']='Expired Medicine';
            $all['action']='view';

            if ($_REQUEST['tem']==$_SESSION['code']) {
                // code...
                $all['directory']='medicine/medicine';

            }
        }

        echo view('templete/head',$all);
        echo view('sections/management/management');
        echo view('templete/foot');exit();


    }



   // DATE FUNCTION

    public function getDate($format){

        $home=new home();


        if (isset($_SESSION['ip_address'])) {
            // code...
            $ip = $_SESSION['ip_address'];  //$_SERVER['REMOTE_ADDR']

            if ($ip=='127.0.0.1') {
                // code...
                $timezone=app_timezone();
            }
            else{
                $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
                $ipInfo = json_decode($ipInfo);
                $timezone = $ipInfo->timezone;
                date_default_timezone_set($timezone);
                $timezone=date_default_timezone_get();
            }
            
        }
        else{
            $message="Your session has expired. Login again.";
            $home->index($message);
        }


        $date=Time::parse($format,$timezone,'en_US');


        return $date;
    }

    




    // // LOGOUT FUNCTION


    // public function logout(){

    //     $home=new home();
    //     $db_login=new db_login();


    //     $mydate=$home->date('now');

    //     if (isset($_SESSION['logedIn_data'])) {
    //         // code...
    //         $login_data=$db_login->where('cashier_id',$_SESSION['logedIn_data']['cashier_data']['cashier_id'])->first();
    //     }
    //     elseif (isset($_COOKIE['logedIn_data'])) {
    //         // code...
    //         $data=json_decode($_COOKIE['logedIn_data'],true);

    //         $login_data=$db_login->where('cashier_id',$data['cashier_data']['cashier_id'])->first();
    //     }

        

    //         $logOut_data=[
    //             'is_deleted'=>1,
    //             'logout_time'=>$mydate
    //         ];

    //     $db_login->update($login_data['login_id'],$logOut_data);

    //     session_unset();
    //     session_destroy();

    //     $message="Logged Out.";

    //     $home->index($message);
    // }


    function getIs_admin(){

        $tbl_admin=new tbl_admin();
        $home=new home();

        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');

        $salt_password=$home->salt_password($password);

        $admin_data=['username'=>$username,'password'=>$salt_password];

        $is_admin=$tbl_admin->verify_admin($admin_data);

        if (!is_array($is_admin)) {
            // code...
             echo $is_admin;exit();

        }
        else{
            echo 2;exit();
        }


    }

    function getGenerate_password(){

        $home=new home();


        $alphaNumeric="/?#a.b@c/?#@de/?#g1,/?#2345.HI/?#JKL,MN/?#09@876h/?#ijk./?#lmn,ABC/?#DE@FG,54/?#32.10o,pq/?#rs@tuv,w/?#xy.z97/?#4,105@362.8/?#OP@/?#QRS,TU/?#V.W/?#X,Y@Z.";
        

            $password_code=substr(str_shuffle($alphaNumeric),0,8);

            $salt_password=$home->salt_password($password_code);

            $password_data=['password_code'=>$password_code,'salt_password'=>$salt_password];
            return $password_data;



    }

    function getSalt_password($data){

        $salt=".,/';|`~!&%#*^()-+[{]}";

        
        $salt_password=$salt.$data.$salt;

        return $salt_password;
    
    }

    function putUpdate_password(){


        $home=new home();
        $registration=new registration();
        $login=new login();
        $tbl_admin=new tbl_admin();


        $value=$this->request->getPost('value');

        if ($value==1) {
            # code...

            $email=$this->request->getPost('email');

            $verification_code=$home->generate_password();

            $_SESSION['verification_code']=$verification_code['password_code'];

            $data=[
                'email'=>$email,
                // 'code'=>$verification_code,
                'message'=>'Use this code : '.$verification_code['password_code'].' to verify your email.'
            ];
            
            $code_sent=$registration->send_email($data);

            if ($code_sent) {
                # code...
                echo $value;exit();
            }
            else{
                echo "Unknown error occured! Check your email address or network connection and try again.";
            }
            
        }
        else if ($value==2) {
            # code...

            $user_code=$this->request->getPost('code');

            if ($user_code==$_SESSION['verification_code']) {
                # code...

                echo $value;

            }
            else{
                echo "Invalid Verification code!!!";exit();
            }

        }
        elseif ($value==3) {
            # code...


            $password=$this->request->getPost('password');

            $salt_password=$home->salt_password($password);

            $login->get_ip_address();

            $date=$home->date('now');


            $data=[
                'email'=>$this->request->getPost('email'),
                'password'=>$salt_password,
                'updated_at'=>$date
            ];

            $is_admin=$tbl_admin->where('admin_id',1)->first();
            
            if ($is_admin) {
                # code...
                
                $updated=$tbl_admin->update($is_admin['admin_id'],$data);

                if($updated){
                    
                    return $value;exit();
                }
                else{
                    echo "<b class='text-danger'>Error!!!</b> Failled to update password";
                }
            }
            else{
                echo "User not found";exit();

            }

        }

    }
}
