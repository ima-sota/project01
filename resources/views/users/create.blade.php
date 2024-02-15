@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>ユーザー追加</h1>
    <form action="{{ route('users.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="user_name">アカウント名</label>
        <input type="text" class="form-control" id="user_name" name="user_name" required>
      </div>
      <div class="form-group">
        <label for="user_email">メールアドレス</label>
        <input type="email" class="form-control" id="user_email" name="user_email" required>
      </div>
      <div class="form-group">
        <label for="user_password">パスワード</label>
        <input type="password" class="form-control" id="user_password" name="user_password" required>
      </div>
      <div class="form-group">
        <label for="user_role">権限</label>
        <select class="form-control" id="user_role" name="user_role">
          <option value="管理者">管理者</option>
          <option value="編集">編集</option>
          <option value="閲覧">閲覧</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
@endsection
