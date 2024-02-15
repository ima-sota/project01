@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>ユーザー編集</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="user_name">アカウント名</label>
        <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $user->user_name }}" required>
      </div>
      <div class="form-group">
        <label for="user_email">メールアドレス</label>
        <input type="email" class="form-control" id="user_email" name="user_email" value="{{ $user->user_email }}"
          required>
      </div>
      <div class="form-group">
        <label for="user_password">パスワード（変更する場合のみ入力）</label>
        <input type="password" class="form-control" id="user_password" name="user_password">
      </div>
      <div class="form-group">
        <label for="user_role">権限</label>
        <select class="form-control" id="user_role" name="user_role">
          <option value="管理者" {{ $user->user_role == '管理者' ? 'selected' : '' }}>管理者</option>
          <option value="編集" {{ $user->user_role == '編集' ? 'selected' : '' }}>編集</option>
          <option value="閲覧" {{ $user->user_role == '閲覧' ? 'selected' : '' }}>閲覧</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">更新</button>
    </form>
  </div>
@endsection
