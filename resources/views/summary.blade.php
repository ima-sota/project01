<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>出品情報管理</title>
</head>

<body>
  <div class="container">
    <h1>出品情報管理</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>ニックネーム</th>
          <th>靴の写真</th>
          <th>靴のサイズ</th>
          <th>靴の状態</th>
          <th>取引状況</th>
          <th>最終更新日時</th>
          <th>編集</th>
        </tr>
      </thead>
      <tbody>
        {{-- ここでDBから取得した出品情報をループで表示 --}}
        @foreach ($items as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->seller->nickname }}</td> {{-- 仮の関連付け --}}
            <td><img src="{{ $item->image_url }}" alt="靴の写真" style="width: 100px;"></td>
            <td>{{ $item->size }}</td>
            <td>{{ $item->condition }}</td>
            <td>{{ $item->transaction_status }}</td> {{-- 仮のステータス --}}
            <td>{{ $item->updated_at->format('Y-m-d H:i:s') }}</td>
            <td><a href="{{ route('items.edit', $item->id) }}">編集</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
