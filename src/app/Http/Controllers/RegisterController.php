<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;

class RegisterController extends Controller
{
    public function step1()
    {
        return view('auth/register_step1');
    }

    public function postStep1(RegisterStep1Request $request)
    {
        $validated = $request->validated();

        // セッションに一時保存
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
            'calories' => 0, // 新規登録時は仮の値
            'exercise_time' => '00:00:00', // 仮の時間
        ]);

        auth()->login($user);

        return redirect()->route('weight_logs.index')->with('status', '登録が完了しました');
    }


    public function login()
    {
        return view('auth/login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // ユーザーをログアウト

        $request->session()->invalidate(); // セッションを無効化
        $request->session()->regenerateToken(); // CSRFトークンを再生成

        return redirect()->route('login'); // ログイン画面へリダイレクト
    }

}
