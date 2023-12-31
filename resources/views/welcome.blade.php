@extends('layouts.helloapp')

@section('content')
  <div class="container">
    <h1>出品情報の登録</h1>

    {{-- エラーメッセージの表示 --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- 出品情報の入力フォーム --}}
    <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      {{-- 画像のアップロード --}}
      <div class="form-group">
        <label for="image_url">画像</label>
        <input type="file" class="form-control" name="image_url" id="image_url">
      </div>

      {{-- サイズの入力 --}}
      <div class="form-group">
        <label for="size">サイズ</label>
        <input type="text" class="form-control" name="size" id="size">
      </div>

      {{-- 状態の入力 --}}
      <div class="form-group">
        <label for="condition">状態</label>
        <select name="shoes_con" id="shoes_con" class="form-control">
          <option value="">選択してください。</option>
          <option value="0">全体的に傷や汚れがある</option>
          <option value="1">傷や汚れが数カ所ある</option>
          <option value="2">目立った汚れはない</option>
          <option value="3">未使用に近い</option>
          <option value="4">新品・未使用</option>
        </select>
      </div>

      <!-- 出品者情報のセクション -->
      <h2>出品者情報</h2>

      {{-- ニックネーム --}}
      <div class="form-group">
        <label for="nickname">ニックネーム</label>
        <input type="text" class="form-control" name="nickname" id="nickname">
      </div>

      {{-- メールアドレス --}}
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>


      {{-- 提出ボタン --}}
      <button type="submit" class="btn btn-primary">登録</button>
    </form>

  </div>
@endsection
