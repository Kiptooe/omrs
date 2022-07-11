<?php

namespace App\Controllers;
// use App\Controllers\BaseController;
use App\Models\tbl_admin;
use App\Models\tbl_role;
// use App\Models\adult_employees;
// use App\Models\root;
// use App\Models\adult_registration;
// use App\Models\children_registration;
// use App\Models\adult_images;
// use App\Models\child_images;
// use App\Models\arch_dioces;
// use App\Models\dioces;
// use App\Models\mission;
// use App\Models\continent;
// use App\Models\beneficiary;
// use App\Models\beneficiary_image;
// use App\Models\beneficiary_registration;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Registration extends Home
{

    function __construct() {
        require_once 'C:\Users\Meshack Owino\vendor\PHPMailer\PHPMailer\src\PHPMailer.php"';
        require_once 'C:\Users\Meshack Owino\vendor\PHPMailer\PHPMailer\src\SMTP.php"';
        require_once 'C:\Users\Meshack Owino\vendor\PHPMailer\PHPMailer\src\Exception.php"';

    }
    

    //  employee REGISTRATION

    public function registration(){


        $tbl_role=new tbl_role();
        $registration=new registration();
        $tbl_admin=new tbl_admin();
        $home=new home();

        

        helper('form');



        $identification=$this->request->getPost('identification');


        $role=$this->request->getPost('role_name');



        $password=$home->generate_password();

        $role_id='';

               
        if ($role) {


            $role_exist=$tbl_role->where('role_name',$role)->first();


            if ($role_exist) {
                // code...
                $role_id=$role_exist['role_id'];

            }
            else{

                $role_name=['role_name'=>$role];

                $tbl_role->save($role_name);


                $role_exist=$tbl_role->where('role_name',$role)->first();

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



            $key=$home->generate_password();

         

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

            // send_email_to_user($data['email']);


            // $registration->data_exist($data,$role);

            if ($role=="Administrator") {
                // code...

                $inserted=$tbl_admin->save($data);


            }
            else if($role=="Patient"){
                // $inserted=$tbl_patient->save($data);

            }
            else{
                // $inserted=$tbl_employee->save($data);

            }

 



            if ($inserted) {
                // code...

                
                $full_name=$data['firstname']." ".$data['lastname'];

                $email_sent=$registration->send_email($data);

                $message="Registration of <b style='color:red;'> ".$role."</b> ".$full_name." <b class='text-primary'>is Successful.</b> Password is: <b style='color:purple'>".$password['password_code']."</b>";


                if ($email_sent) {
                    // code...
                    $registration->message($message);

                }
                


            }
            

                $message="<b style='color:red;'>Failled</b>!!!: Registration <b style='color:red;'>NOT</b> Successful.";

                $registration->message($message);
            
        
    }


    function message($message){

        echo $message;exit();
        
                
    }

    

    

    
    

    function data_exist(array $data, $role){

        $registration=new registration();
        $tbl_admin=new tbl_admin();

        $national_id_exist=$adult_employees->where('national_id',$national_id)->first();

        if ($national_id_exist) {
            // code...
            $message="<b style='color:red;'>Registration Failled</b>!!!: ID <b style='color:blue;'>".$national_id."</b> had already been <b style='color:red;'>Registered</b>.";

            $registration->message($message);
        }

        $email_exist=$adult_employees->where('email',$email)->first();

        if ($email_exist) {
            // code...
            $message="<b style='color:red;'>Registration Failled</b>!!!: Email <b style='color:blue;'>".$email."</b> had already been <b style='color:red;'>Registered</b>.";

            $registration->message($message);

        }

        $mobile_number1_exist=$adult_employees->where('mobile_number1',$mobile_number1)
                                        ->orWhere('mobile_number2',$mobile_number1)
                                        ->first();

        if ($mobile_number1_exist) {
            // code...
            $message="<b style='color:red;'>Registration Failled</b>!!!: Mobile Number <b style='color:blue;'>".$mobile_number1."</b> had already been <b style='color:red;'>Registered</b>.";

            $registration->message($message);
        }

        if ($mobile_number2 !=null) {
            // code...

            if ($mobile_number2 == $mobile_number1) {
                // code...
                $message="<b style='color:red;'>Registration Failled</b>!!!: First contact <b style='color:blue;'>".$mobile_number1."</b> & Second contact <b style='color:blue;'>".$mobile_number2."</b> <b style='color:red;'>CANNOT</b> be the same.";

                $registration->message($message);
            }


            $mobile_number2_exist=$adult_employees->where('mobile_number1',$mobile_number2)
                                        ->orWhere('mobile_number2',$mobile_number2)
                                        ->first();
            if ($mobile_number2_exist) {
                // code...
                $message="<b style='color:red;'>Registration Failled</b>!!!: Mobile Number <b style='color:blue;'>".$mobile_number2."</b> had already been <b style='color:red;'>Registered</b>.";

                $registration->message($message);
            }

        }

    }


    function send_email(array $data){

        
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
            // echo 'Not sent'. $e->ErrorInfo;

            return false;
        }


    }


}