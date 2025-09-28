<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use App\Http\Requests\LoginRequest;

class RegisterController extends Controller
{
    public function step1()
    {
        return view('auth/register_step1');
    }

    public function postStep1(RegisterStep1Request $request)
    {
        $validated = $request->validated();

        session([
            'register.name' => $validated['name'],
            'register.email' => $validated['email'],
            'register.password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('step2');
    }

    public function step2()
    {
        return view('auth/register_step2');
    }

    public function postStep2(RegisterStep2Request $request)
    {
        $validated = $request->validated();

        $user = \App\Models\User::create([
            'name' => session('register.name'),
            'email' => session('register.email'),
            'password' => session('register.password'),
        ]);

        $user->weightTarget()->create([
            'target_weight' => $validated['target_weight'],
        ]);

        $user->weightLogs()->create([
            'date' => now()->format('Y-m-d'),
            'weight' => $validated['current_weight'],
            'calories' => 0, 
            'exercise_time' => '00:00:00', 
        ]);

        auth()->login($user);

        return redirect()->route('weight_logs.index')->with('status', '登録が完了しました');
    }


    public function login()
    {
        return view('auth/login');
    }

    public function postLogin(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->route('weight_logs.index')->with('status', 'ログインしました');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect()->route('login'); 
    }

}
