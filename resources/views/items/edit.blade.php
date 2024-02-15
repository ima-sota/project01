@extends('layouts.app')

@section('title', 'アイテム編集')

@section('content')
  <h1>アイテム編集</h1>

  {{-- 編集フォーム --}}
  <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- ニックネーム --}}
    <div class="form-group">
      <label for="nickname">ニックネーム</label>
      <input type="text" class="form-control" name="nickname" id="nickname" value="{{ $item->seller->seller_name }}">
    </div>

    {{-- メールアドレス --}}
    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="email" class="form-control" name="email" id="email" value="{{ $item->seller->seller_email }}">
    </div>

    {{-- 写真 --}}
    <div class="form-group">
      <label for="image_url">写真</label>
      <input type="file" class="form-control" name="image_url" id="image_url" onchange="previewImage(event)">

      {{-- プレビュー画像 --}}
      <div id="preview">
        @if ($item->item_image)
          <img src="{{ asset('storage/' . $item->item_image) }}" alt="現在の画像" width="150">
        @endif
      </div>
    </div>


    {{-- サイズ --}}
    <div class="form-group">
      <label for="size">サイズ</label>
      <input type="text" class="form-control" name="size" id="size" value="{{ $item->item_size }}">
    </div>

    {{-- 状態 --}}
    <div class="form-group">
      <label for="condition">状態</label>
      <select name="shoes_con" id="shoes_con" class="form-control">
        <option value="全体的に傷や汚れがある" {{ $item->item_condition == '全体的に傷や汚れがある' ? 'selected' : '' }}>全体的に傷や汚れがある</option>
        <option value="傷や汚れが数カ所ある" {{ $item->item_condition == '傷や汚れが数カ所ある' ? 'selected' : '' }}>傷や汚れが数カ所ある</option>
        <option value="目立った汚れはない" {{ $item->item_condition == '目立った汚れはない' ? 'selected' : '' }}>目立った汚れはない</option>
        <option value="未使用に近い" {{ $item->item_condition == '未使用に近い' ? 'selected' : '' }}>未使用に近い</option>
        <option value="新品・未使用" {{ $item->item_condition == '新品・未使用' ? 'selected' : '' }}>新品・未使用</option>
      </select>
    </div>

    {{-- 更新ボタン --}}
    <button type="submit" class="btn btn-primary">更新</button>
  </form>
@endsection

@section('scripts')
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('preview');
        output.innerHTML = '<img src="' + reader.result + '" width="150" />';
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
@endsection
