<?php

namespace App\Controllers;
use App\Models\TblVitals;
use App\Models\TblSignSymp;

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
