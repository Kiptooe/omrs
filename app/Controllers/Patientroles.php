<?php

namespace App\Controllers;
use App\Models\tbl_vitals;
use App\Models\Tblsignsymp;

class Patientroles extends BaseController
{
    public function getSummary($page,$id)
    {

        $tv = new tbl_vitals();
        $summary['vitals'] = $tv->fetchVitals($id);

        $ts = new Tblsignsymp();

        $summary['sign_symp'] = $ts->fetchSignSymp($id);

        echo view($page,$summary);

    }
}
