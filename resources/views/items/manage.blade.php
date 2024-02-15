@extends('layouts.app')

@section('title', '出品管理画面')

@section('content')
  <h1>出品管理画面</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>出品者</th>
        <th>画像</th>
        <th>サイズ</th>
        <th>状態</th>
        <th>最終編集日時</th>
        <th>編集</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->seller->seller_name }}</td>
          <td><img src="{{ asset('storage/' . $item->item_image) }}" alt="画像" width="100"></td>
          <td>{{ $item->item_size }}</td>
          <td>{{ $item->item_condition }}</td>
          <td>{{ $item->updated_at }}</td>
          <td><a href="{{ route('items.edit', $item->id) }}">編集</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('scripts')
  <script></script>
@endsection
