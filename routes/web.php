<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ItemController::class, 'showSellerForm'])->name('items.create_with_seller');

Route::get('/hello', function () {
    return view('hello');
})->name('hello');



// ログイン画面の表示
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// ログイン処理
Route::post('/login', [LoginController::class, 'login']);

// ログアウト処理
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/welcome', function () {
    return view('welcome');
});



Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::get('/summary', function () {
    return view('summary');
});



// 出品情報入力フォームの表示
Route::get('/items/create_with_seller', [ItemController::class, 'showSellerForm'])->name('items.create_with_seller');

// Route::get('/items/create_with_seller', [ItemController::class, 'createWithSeller'])->name('items.create_with_seller');
Route::post('/items/store-with-seller', [ItemController::class, 'storeWithSeller'])->name('items.storeWithSeller');
