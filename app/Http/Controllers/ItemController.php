<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Seller;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function showSellerForm()
    {
        return view('items.create_with_seller');
    }


    public function index()
    {
        // DBから全出品情報を取得
        $items = Item::all();

        // ビューにデータを渡す
        return view('items.index', compact('items'));
    }

    public function storeWithSeller(Request $request)
    {
        // 出品者情報を検索、または新規作成
        $seller = Seller::firstOrCreate(
            [
                'seller_name' => $request->input('nickname'), // ニックネーム
                'seller_email' => $request->input('email'), // メールアドレス
            ]
        );

        // 画像の保存とURLの取得
        $path = $request->file('image_url')->store('images', 'public'); // 画像ファイル

        // 商品情報の保存
        Item::create([
            'item_image' => $path,
            'item_size' => $request->input('size'), // サイズ
            'item_condition' => $request->input('shoes_con'), // 状態
            'seller_id' => $seller->id, // 既存または新規の出品者IDを使用
        ]);

        return redirect()->route('hello');
    }
}
