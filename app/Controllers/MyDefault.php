<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Controllers\registration;
use App\Controllers\login;
use App\Models\tblAdmin;

class MyDefault extends BaseController
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

        $all['title']='Outpatient Medical Record System';



        echo view('templete/head',$all);
        echo view('index');
        echo view('templete/foot');exit();
    }

    
}