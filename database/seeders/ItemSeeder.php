<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データを挿入する処理を記述
        DB::table('items')->insert([
            'item_image' => 'images/01.jpg',
            'item_size' => 'XL',
            'item_condition' => '新品・未使用',
            'seller_id' => 1, // これを適切なセラーの ID に変更
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
