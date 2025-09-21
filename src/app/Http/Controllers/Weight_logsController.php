<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Weight_logsController extends Controller
{
    public function top()
    {

        return view('weight_logs.top');

    }

    public function goal_setting()
    {

        return view('weight_logs.goal_setting');
    }
    
}

