<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function step1()
    {
        return view('register_step1');
    }

    public function step2()
    {
        return view('register_step2');
    }

    public function login()
    {
        return view('login');
    }

}
