<?php

namespace App\Controllers;
use App\Models\tbl_vitals;

class Patientroles extends BaseController
{
    public function showVitals($page,$id)
    {
        $tv = new tbl_vitals();
        $vitals['vitals'] = $tv->fetchVitals($id);
        
        echo view($page,$vitals);
    }
}
