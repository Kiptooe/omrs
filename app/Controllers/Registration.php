<?php

namespace App\Controllers;
use App\Models\tblAdmin;
use App\Models\tblPatient;
use App\Models\tblPatientVisit;
use App\Models\tblEmployee;
use App\Models\tblRole;
use App\Models\tblMedicine;
use App\Models\tblUnit;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Registration extends Home
{

    function __construct() {
        
        require_once 'PHPMailer/PHPMailer.php"';
        require_once 'PHPMailer/SMTP.php"';
        require_once 'PHPMailer/Exception.php"';

    }
    

    //  employee REGISTRATION

    public function postRegistration(){


        $tblRole=new tblRole();
        $registration=new registration();
        $tblPatientVisit=new tblPatientVisit();
        $tblAdmin=new tblAdmin();
        $tblPatient=new tblPatient();
        $tblEmployee=new tblEmployee();
        $home=new home();

        

        helper('form');



        $identification=$this->request->getPost('identification');


        $role=$this->request->getPost('role_name');



        $password=$home->getGenerate_password();

        $role_id='';

               
        if ($role) {


            $role_exist=$tblRole->where('role_name',$role)->first();


            if ($role_exist) {
                // code...
                $role_id=$role_exist['role_id'];

            }
            else{

                $role_name=['role_name'=>$role];

                $tblRole->save($role_name);


                $role_exist=$tblRole->where('role_name',$role)->first();

                $role_id=$role_exist['role_id'];


            }
        }
        if ($identification=='national_id') {
            // code...
            $username=$this->request->getPost('national_id');
        }
        else{
            $username=$this->request->getPost('certificate_no');

        }



            $key=$home->getGenerate_password();

         

            $data=[
                'firstname'=>$this->request->getPost('first_name'),
                'lastname'=>$this->request->getPost('last_name'),
                'email'=>$this->request->getPost('email'),
                'mobile_number'=>$this->request->getPost('contact'),
                'national_id'=>$this->request->getPost('national_id'),
                'birth_cert'=>$this->request->getPost('certificate_no'),
                'gender'=>$this->request->getPost('gender'),
                'role_id'=>$role_id,
                'password'=>$password['salt_password'],
                'key'=>$key['salt_password'],
                'password_code'=>$password['password_code'],
                'username'=>$username

            ];

            $email_data=[
                'email'=>$data['email'],
                'message'=>'Your Password is: '.$data['password_code']
            ];


            $registration->getData_exist($data,$role);

            if ($role=="Administrator") {
                // code...

                $email_data=[
                    'email'=>$data['email'],
                    'message'=>'Your Password is: '.$data['password_code'].' and Key is: '.$key['password_code']
                ];

                $inserted=$tblAdmin->save($data);


            }
            else if($role=="Patient"){

                $inserted=$tblPatient->save($data);

                $patient_exist=$tblPatient->search($username);


                $visit_data=[
                    'patient_id'=>$patient_exist['patient_id']
                ];

                $inserted=$tblPatientVisit->save($visit_data);


            }
            else{
                $inserted=$tblEmployee->save($data);

            }




            if ($inserted) {
                // code...

                
                $full_name=$data['firstname']." ".$data['lastname'];

                $email_sent=$registration->postSend_email($email_data);

                $message="Registration of <b style='color:red;'> ".$role."</b> ".$full_name." <b class='text-primary'>is Successful.</b>";


                if ($email_sent) {
                    // code...
                    echo "string";exit();
                    $registration->postMessage($message);

                }
                else{

                    $patient_exist=$tblPatient->search($username);

                    $tblPatient->where('patient_id',$patient_exist['patient_id'])->delete();


                }
                


            }
            

            $message="<b style='color:red;'>Failled</b>!!!: Registration <b style='color:red;'>NOT</b> Successful.";

            $registration->postMessage($message);
            
        
    }


    function postMessage($message){

        echo $message;exit();
        
                
    }

    

    

    
    

    function getData_exist(array $data, $role){

        $registration=new registration();
        $tblAdmin=new tblAdmin();
        $tblPatient=new tblPatient();
        $tblEmployee=new tblEmployee();

        $national_id=$data['national_id'];



        if($role=="Administrator"){

        $national_id_exist=$tblAdmin->where('national_id',$data['national_id'])->where('is_deleted',0)->first();
        $email_exist=$tblAdmin->where('email',$data['email'])->where('is_deleted',0)->first();
        $mobile_number_exist=$tblAdmin->where('mobile_number',$data['mobile_number'])
                                        ->where('is_deleted',0)
                                        ->first();




            
        }
        elseif($role=="Patient"){


            if ($data['birth_cert']) {
                // code...
                $national_id_exist=$tblPatient->where('birth_cert',$data['birth_cert'])->first();

                $national_id=$data['birth_cert'];

                $email_exist=false;
                $mobile_number_exist=false;
            }
            else if ($data['national_id']) {
                // code...
                $national_id_exist=$tblPatient->where('national_id',$data['national_id'])->first();
                $email_exist=$tblPatient->where('email',$data['email'])->first();
                $mobile_number_exist=$tblPatient->where('mobile_number',$data['mobile_number'])
                                        ->first();

            }

            

        }
        else{
            // code...
        $national_id_exist=$tblEmployee->where('national_id',$data['national_id'])->first();
        $email_exist=$tblEmployee->where('email',$data['email'])->first();
        $mobile_number_exist=$tblEmployee->where('mobile_number',$data['mobile_number'])
                                        ->first();



        }

        if ($national_id_exist) {
            // code...
            $message="<b style='color:red;'>Registration Failled</b>!!!: ID <b style='color:blue;'>".$national_id."</b> had already been <b style='color:red;'>Registered</b>.";

            $registration->postMessage($message);
        }

        

        if ($email_exist) {
            // code...
            $message="<b style='color:red;'>Registration Failled</b>!!!: Email <b style='color:blue;'>".$data['email']."</b> had already been <b style='color:red;'>Registered</b>.";

            $registration->postMessage($message);

        }

      
        if ($mobile_number_exist) {
            // code...
            $message="<b style='color:red;'>Registration Failled</b>!!!: Mobile Number <b style='color:blue;'>".$data['mobile_number']."</b> had already been <b style='color:red;'>Registered</b>.";

            $registration->postMessage($message);
        }

        
    }


    function postSend_email(array $data){
        
        try{

            $mail=new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->SMTPSecure="tls";
            $mail->SMTPAuth=true;
            $mail->Username='myphone136714@gmail.com';
            $mail->Password='awydpxoihgkcrgha';
            $mail->Port='587';
            $mail->Subject="Verification Code";
            $mail->setFrom('myphone136714@gmail.com');
            $mail->addAddress($data['email']);
            $mail->Body=$data['message'];
            $mail->SMTPOptions=array('ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>false

            ));
            $mail->send();
                                
            return true;                    
        }catch(Exception $e){

            return false;
        }


    }



    function postMedicine(){

        $registration=new registration();
        $tblMedicine=new tblMedicine();
        $tblUnit=new tblUnit();

        helper('form');

        $unit_name=$this->request->getPost('medicine_unit');

        $unit_data=$tblUnit->where('unit_name',$unit_name)->first();

        if (!$unit_data) {
            // code...

            $unit_data=['unit_name'=>$unit_name];

            $inserted=$tblUnit->save($unit_data);

            if (!$inserted) {
                // code...
                $message="<b style='color:red;'>Failled</b>!!!: Unknown Error Occured.";

                $registration->postMessage($message);

            }

            $unit_data=$tblUnit->where('unit_name',$unit_name)->first();

        }


        $data=[
                'medicine_name'=>$this->request->getPost('medicine_name'),
                'medicine_quantity'=>$this->request->getPost('medicine_quantity'),
                'medicine_price'=>$this->request->getPost('medicine_price'),
                'added_by'=>$this->request->getPost('added_by'),
                'unit_id'=>$unit_data['unit_id'],
                'expiry_date'=>$this->request->getPost('expiry_date')
            ];

            

            $registration->getMedicine_exist($data);

            $inserted=$tblMedicine->save($data);


            if ($inserted) {
                // code...

                $message="Registration of <b style='color:red;'> ".$data['medicine_name']."</b><b class='text-primary'>is Successful.</b>";

               
                    $registration->postMessage($message);

            }
            

            $message="<b style='color:red;'>Failled</b>!!!: Registration <b style='color:red;'>NOT</b> Successful.";

            $registration->postMessage($message);


    }

    function getMedicine_exist(array $data){

        $registration=new registration();
        $tblMedicine=new tblMedicine();




        $medicine_exist=$tblMedicine->where('medicine_name',$data['medicine_name'])->where('is_deleted',0)->first();
        

        if ($medicine_exist) {
            // code...
            $message="<b style='color:red;'>Registration Failled</b>!!!: Medicine <b style='color:blue;'>".$data['medicine_name']."</b> had already been <b style='color:red;'>Registered</b>.";

            $registration->postMessage($message);
        }

        
    }





}


