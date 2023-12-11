<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // 登録後の処理、例えばログインやリダイレクトなど
        // auth()->login($user);

        return redirect()->route('welcame');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255'],
            'user_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'user_name' => $data['user_name'],
            'user_email' => $data['user_email'],
            'user_password' => Hash::make($data['user_password']),
        ]);
    }
}
