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

    public function manage()
    {
        $items = Item::with('seller')->get(); // 出品者情報も取得
        return view('items.manage', compact('items'));
    }

    public function edit($id)
    {
        $item = Item::with('seller')->findOrFail($id);
        return view('items.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {
        // バリデーション
        $validatedData = $request->validate([
            'nickname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'size' => 'required|max:255',
            'shoes_con' => 'required',
            'image_url' => 'sometimes|image|max:2048' // 'sometimes'は、画像がアップロードされた場合のみバリデーションを適用
        ]);

        // アイテムを検索
        $item = Item::findOrFail($id);

        // 関連する出品者情報を更新
        $item->seller->update([
            'seller_name' => $validatedData['nickname'],
            'seller_email' => $validatedData['email']
        ]);

        // 画像がアップロードされた場合、画像を保存してパスを更新
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('images', 'public');
            $item->item_image = $path;
        }

        // その他のアイテム情報を更新
        $item->item_size = $validatedData['size'];
        $item->item_condition = $validatedData['shoes_con'];

        // データベースに保存
        $item->save();

        // 更新後、適切なページにリダイレクト
        return redirect()->route('items.manage')->with('success', 'アイテムが更新されました。');
    }
}
