<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ユーザー一覧
    public function index()
    {
        if (!Gate::allows('view-users')) {
            abort(403);
        }

        $users = User::all();
        return view('users.index', compact('users'));
    }

    // ユーザー作成フォーム
    public function create()
    {
        if (!Gate::allows('manage-users')) {
            abort(403);
        }

        return view('users.create');
    }

    // ユーザー保存
    public function store(Request $request)
    {
        if (!Gate::allows('manage-users')) {
            abort(403);
        }

        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users',
            'user_password' => 'required|min:3',
            'user_role' => 'required',
        ]);

        User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_password' => Hash::make($request->user_password),
            'user_role' => $request->user_role,
        ]);

        return redirect()->route('users.index');
    }

    // ユーザー編集フォーム
    public function edit($id)
    {
        if (!Gate::allows('edit-users')) {
            abort(403);
        }

        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // ユーザー更新
    public function update(Request $request, $id)
    {
        if (!Gate::allows('edit-users')) {
            abort(403);
        }

        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users,user_email,' . $id,
            'user_role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            // パスワードが入力された場合のみ更新
            'user_password' => $request->user_password ? Hash::make($request->user_password) : $user->user_password,
            'user_role' => $request->user_role,
        ]);
        return redirect()->route('users.index');
    }

    // ユーザー削除
    public function destroy($id)
    {
        if (!Gate::allows('manage-users')) {
            abort(403);
        }

        User::findOrFail($id)->delete();

        return redirect()->route('users.index');
    }
}
