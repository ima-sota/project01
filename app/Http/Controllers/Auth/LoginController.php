<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ログインフォームの表示
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required',
        ]);

        if (Auth::attempt(['user_email' => $credentials['user_email'], 'password' => $credentials['user_password']])) {
            $request->session()->regenerate();
            return redirect()->route('items.manage');
        }

        return back()->withErrors([
            'user_email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }


    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
