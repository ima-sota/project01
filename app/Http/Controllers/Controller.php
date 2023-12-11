<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}


class ItemController extends Controller
{
    public function index()
    {
        // DBから全出品情報を取得
        $items = Item::all();

        // ビューにデータを渡す
        return view('items.index', compact('items'));
    }
}



class LoginController extends Controller
{
    // ログイン画面の表示
    public function showLoginForm()
    {
        return view('login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証に成功した
            return redirect()->intended('summary');
        }

        // 認証に失敗した
        return back()->withErrors([
            'email' => '指定された資格情報が記録と一致しません。',
        ]);
    }
}
