<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Controllers\registration;
use App\Controllers\FetchData;
use App\Controllers\login;
use App\Models\tblAdminLogin;
use App\Models\tblAdmin;
use App\Models\tblPatientLogin;
use App\Models\tblPatient;
use App\Models\tblPatientVisit;
use App\Models\tblEmployeeLogin;
use App\Models\tblEmployee;
use App\Models\tblMedicine;
use App\Models\tblUnit;

class Home extends BaseController
{
   
    //  LANDING PAGE FUNCTION


    public function getHome_Page($message=null)
    {

        $all['session_expires']=$message;

        $all['title']='Outpatient Medical Record System';

        echo view('templete/head',$all);
        echo view('index');
        echo view('templete/foot');exit();
    }

    

    function getPages($value=null){

        $fetchData=new FetchData();
        $tblMedicine=new tblMedicine();
        $home=new home();
        $login=new login();
        $tblUnit=new tblUnit();

        $login->get_ip_address();

        $date=$home->getDate('now');
        $date=$date->toDateString();

        $all=$fetchData->getAdminHomePage();
        $all['logedIn_data'] = [];

        if (isset($_SESSION['login_data'])) {
            // code...
            $all['logedIn_data']=$_SESSION['login_data'];
        }

        if (isset($_REQUEST['reg'])) {
            // code...

            $all['title']='Registration';

            if (isset($_SESSION['role']) && $_SESSION['role']=='Receptionist') {
                // code...

                $all['receptionist']=$_SESSION['role'];

            }


            if ($_REQUEST['reg']==$value) {
                // code...
                echo view('templete/head');
                echo view('sections/registration',$all);
                echo view('templete/foot');exit();
            }
        }

        if (isset($_REQUEST['pass'])) {
            // code...

            $all['title']='Reset Password';
            if ($_REQUEST['pass']==$value) {
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


            if ($_REQUEST['anm']==$value) {
                // code...
                echo view('templete/head',$all);
                echo view('sections/medicine/medicine');
                echo view('templete/foot');exit();
            }
        }


        if (isset($_REQUEST['gmr'])) {
            // code...

            $all['title']='General Medical Report';

            if ($_REQUEST['gmr']==$value) {
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
            $ll['icon']='eye';
            $all['header']='View Staff Members';
            $all['staff']='Staff';

            if ($_REQUEST['tsm']==$value) {
                // code...

            }
        }

        if (isset($_REQUEST['tpa'])) {
            // code...

            $all['title']='Patients';
            $ll['icon']='eye';
            $all['header']='View Patients';

            if ($_REQUEST['tpa']==$value) {
                // code...
            $all['directory']='management/patients/patient';


            }
        }

        if (isset($_REQUEST['td'])) {
            // code...

            $all['title']='Doctors';
            $ll['icon']='eye';
            $all['header']='View Doctors';

            if ($_REQUEST['td']==$value) {
                // code...
            $all['table']='doctors';


            }
        }

        if (isset($_REQUEST['tn'])) {
            // code...

            $all['title']='Nurses';
            $ll['icon']='eye';
            $all['header']='View Nurses';

            if ($_REQUEST['tn']==$value) {
                // code...
            $all['table']='nurse';
                

            }
        }

        

        if (isset($_REQUEST['tr'])) {
            // code...

            $all['title']='Receptionists';
            $ll['icon']='eye';
            $all['header']='View Receptionists';

            if ($_REQUEST['tr']==$value) {
                // code...
                $all['table']='receptionist';


            }
        }

        

        if (isset($_REQUEST['tam'])) {
            // code...

            $all['title']='Available Medicine';
            $ll['icon']='eye';
            $all['header']='View Available Medicine';
            $all['action']='view';
            $all['expired']='expired';


            if ($_REQUEST['tam']==$value) {
                // code...
                $all['directory']='medicine/medicine';

            }
        }

        if (isset($_REQUEST['tem'])) {
            // code...


            $all['title']='Expired Medicine';
            $ll['icon']='eye';
            $all['header']='View Expired Medicine';
            $all['action']='view';

            if ($_REQUEST['tem']==$value) {
                // code...
                $all['medicine_data']=$tblMedicine->where('expiry_date <=',$date)->findAll();
                if ($all['medicine_data']) {
                    // code...

                    for ($i=0; $i <count($all['medicine_data']) ; $i++) { 
                        // code...

                        $all['unit_data'][$i]=$tblUnit->where('unit_id',$all['medicine_data'][$i]['unit_id'])->first();
                    }
                }


                $all['directory']='medicine/medicine';

            }
        }
        $all['dashboard_data']=$all;

        echo view('templete/head',$all);
        echo view('sections/management/management');
        echo view('templete/foot');exit();


    }

    function getRole_pages($value,$value1=null){

        $fetchData=new FetchData();
        $tblMedicine=new tblMedicine();
        $home=new home();
        $login=new login();
        $tblUnit=new tblUnit();
        $tblPatient=new tblPatient();
        $tblPatientVisit=new tblPatientVisit();

        $date=$home->getDate('now');
        $date=$date->toDateString();

        $all=$fetchData->getAdminHomePage();
        

        $all['role_pages']=$_SESSION['role'];

        if ($_SESSION['login_data']) {
            // code...
            $all['logedIn_data']=$_SESSION['login_data'];
        }


        if (isset($_REQUEST['nv'])) {
            // code...

            $all['title']='New Visit';
            $all['icon']='search'; 
            $all['header']='Search Patient';

            if ($value1) {
                // code...
                $all['action']='view';
                $all['icon']='eye'; 
                $all['header']='View Patient Data';
            }


            if ($_REQUEST['nv']==$value) {
                // code...

                if ($value1) {
                    // code...
                    $all['patient_1_data']=$tblPatient->search($value);

                    if ($all['patient_1_data']) {
                        // code...
                        if ($all['patient_1_data']['national_id']) {
                            // code...
                            $all['patient_national_id']=$all['patient_1_data']['national_id'];

                        }
                        else if ($all['patient_1_data']['birth_cert']) {
                            // code...
                            $all['patient_national_id']=$all['patient_1_data']['birth_cert'];

                        }

                        $all['visit_1_data']=$tblPatientVisit->orderBy('visit_date','DESC')->where('patient_id',$all['patient_1_data']['patient_id'])->first();
                            
                    }
                    else{
                        $all['patient_national_id']='';
                    }

                }
                
                $file='visit';

            }

            $all['directory']=$_SESSION['role'].'/dashboard/'.$file;


            
        }

        if (isset($_REQUEST['pr'])) {
            // code...



            $all['title']='Patients Report';
            $all['icon']='eye'; 
            $all['header']='View Patients Data';

            if ($value1) {
                // code...
                $all['action']='view';
                $all['icon']='eye'; 
                $all['header']='View Patient Data';
            }


            if ($_REQUEST['pr']==$value) {
                // code...
                $file='report';

            $all['directory']=$_SESSION['role'].'/dashboard/'.$file;


            }
        }

        echo view('templete/head',$all);
        echo view('sections/management/management');
        echo view('templete/foot');exit();


    }


    // PATIENT VISIT

    public function postPatient_Visits($id){

        $tblPatientVisit=new tblPatientVisit();
        $tblPatient=new tblPatient();
        $home=new home();

        $date=$home->getDate('now');

        $date=$date->toDateString();

        $patient_exist=$tblPatient->search($id);

        if (!$patient_exist) {
            // code...
            echo "<b class='text-danger'>Failled!!!</b> Patient not found!";exit();
        }

        $visit_exist=$tblPatientVisit->where('visit_date',$date)->where('patient_id',$patient_exist['patient_id'])->first();


        if ($visit_exist) {
            // code...
            echo "<b class='text-danger'>Failled!!!</b> Patient has today's visit record!";exit();
        }


        $visit_data=[
            'patient_id'=>$patient_exist['patient_id']
        ];

        $inserted=$tblPatientVisit->save($visit_data);

        if ($inserted) {
            // code...

            echo 'New visit recorded successfully';exit();
        }
        else{
            echo "Unknown <b class='text-danger'>error</b> occured! Try again later.";exit();

        }

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
            $home->getHome_Page($message);
        }


        $date=Time::parse($format,$timezone,'en_US');


        return $date;
    }

    




     // LOGOUT FUNCTION


    public function getLogout(){

        $home=new home();
        $tblAdminLogin=new tblAdminLogin();
        $tblPatientLogin=new tblPatientLogin();
        $tblEmployeeLogin=new tblEmployeeLogin();


        $mydate=$home->getDate('now');

        // if (isset($_SESSION['login_data']) && isset($_SESSION['role'])) {
        //     // code...

        //     $logOut_data=[
        //         'is_deleted'=>1,
        //         'logout_time'=>$mydate
        //     ];
            

        //     if ($_SESSION['role']=='Administrator') {
        //         // code...
        //         $login_data=$tblAdminLogin->where('admin_id',$_SESSION['login_data']['admin_id'])->first();

        //         $tblAdminLogin->update($login_data['login_id'],$logOut_data);

        //     }
        //     elseif ($_SESSION['role']=='Patient') {
        //         // code...
        //         $login_data=$tblPatientLogin->where('patient_id',$_SESSION['login_data']['patient_id'])->first();

        //         $tblPatientLogin->update($login_data['login_id'],$logOut_data);

        //     }
        //     else{

        //         $login_data=$tblEmployeeLogin->where('employee_id',$_SESSION['login_data']['employee_id'])->first();

        //         $tblEmployeeLogin->update($login_data['login_id'],$logOut_data);

        //     }
        // }
        // elseif (isset($_COOKIE['logedIn_data'])) {
        //     // code...
        //     $data=json_decode($_COOKIE['logedIn_data'],true);

        //     $login_data=$db_login->where('cashier_id',$data['cashier_data']['cashier_id'])->first();
        // }

        

           


        session_unset();
        session_destroy();

        $message="Logged Out.";

        $home->getHome_Page($message);
    }



    function postIsAdmin(){

        $tbl_admin=new tblAdmin();
        $home=new home();

        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');

        $salt_password=$home->getSalt_password($password);

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

            $salt_password=$home->getSalt_password($password_code);

            $password_data=['password_code'=>$password_code,'salt_password'=>$salt_password];
            return $password_data;



    }

    function getSalt_password($data){

        $salt=".,/';|`~!&%#*^()-+[{]}";

        
        $salt_password=$salt.$data.$salt;

        return $salt_password;
    
    }

    function postUpdate_password(){


        $home=new home();
        $registration=new registration();
        $login=new login();
        $tbl_admin=new tblAdmin();
        $tblPatient=new tblPatient();
        $tblEmployee=new tblEmployee();


        $value=$this->request->getPost('value');

        if ($value==1) {
            # code...

            $email=$this->request->getPost('email');

            $verification_code=$home->getGenerate_password();

            $_SESSION['verification_code']=$verification_code['password_code'];

            $data=[
                'email'=>$email,
                // 'code'=>$verification_code,
                'message'=>'Use this code : '.$verification_code['password_code'].' to verify your email.'
            ];
            
            $code_sent=$registration->postSend_email($data);

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

            $salt_password=$home->getSalt_password($password);

            $login->get_ip_address();

            $date=$home->getDate('now');


            $data=[
                'email'=>$this->request->getPost('email'),
                'password'=>$salt_password,
                'updated_at'=>$date
            ];

            $is_admin=$tbl_admin->where('email',$data['email'])->first();
            
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
            $is_employee=$tblEmployee->where('email',$data['email'])->first();


                if ($is_employee) {
                # code...
                
                $updated=$tblEmployee->update($is_employee['employee_id'],$data);

                if($updated){
                    
                    return $value;exit();
                }
                else{
                    echo "<b class='text-danger'>Error!!!</b> Failled to update password";
                }

                }
                else{

                    $is_patient=$tblEmployee->where('email',$data['email'])->first();


                    if ($is_patient) {
                    # code...
                    
                    $updated=$tblPatient->update($is_patient['patient_id'],$data);

                    if($updated){
                        
                        return $value;exit();
                    }
                    else{
                        echo "<b class='text-danger'>Error!!!</b> Failled to update password";
                    }

                    }
                    else{
                        echo "<b class='text-danger'>Error!!!</b> User not found";
                    }

                }

            }

        }

    }
}
