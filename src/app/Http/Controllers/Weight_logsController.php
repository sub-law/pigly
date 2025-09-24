<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class Weight_logsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $targetWeight = $user->weightTarget->target_weight ?? null;
        $latestWeight = $user->weightLogs()->latest('date')->first()->weight ?? null;
        $weightLogs = $user->weightLogs()->orderByDesc('date')->get();

        $weightLogs = $user->weightLogs()->orderByDesc('date')->paginate(8);


        return view('weight_logs.index', compact('targetWeight', 'latestWeight', 'weightLogs'));
    }

    public function goal_setting()
    {

        return view('weight_logs.goal_setting');
    }
    
}

