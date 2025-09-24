<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function step1()
    {
        return view('auth/register_step1');
    }

    public function step2()
    {
        return view('auth/register_step2');
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
