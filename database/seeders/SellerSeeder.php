<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データを挿入する処理を記述
        DB::table('sellers')->insert([
            'seller_name' => '出品次郎',
            'seller_email' => 'ziro@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
