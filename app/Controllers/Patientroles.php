<?php

namespace App\Controllers;
use App\Models\TblVitals;
use App\Models\TblSignSymp;

class Patientroles extends BaseController
{
    public function getSummary($page,$id)
    {

        $tv = new TblVitals();
        $summary['vitals'] = $tv->fetchVitals($id);

        $ts = new TblSignSymp();

        $summary['sign_symp'] = $ts->fetchSignSymp($id);

        echo view($page,$summary);

    }
}
