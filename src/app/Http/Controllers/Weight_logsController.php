<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Weight_logsController extends Controller
{
    public function index()
    {

        return view('weight_logs.index');

    }

    public function goal_setting()
    {

        return view('weight_logs.goal_setting');
    }
    
}

