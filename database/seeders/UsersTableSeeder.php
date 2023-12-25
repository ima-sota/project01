<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // ユーザーの初期データを挿入
        DB::table('users')->insert([
            'user_name' => '山田太郎',
            'user_email' => 'yamada@example.com',
            'user_password' => Hash::make('password'),
            'user_role' => 'user',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 他のユーザーの初期データを挿入する場合、同様に追加してください
    }
}
