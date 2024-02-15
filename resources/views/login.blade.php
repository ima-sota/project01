@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
  <div class="container">
    <h1>ログイン</h1>

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

    {{-- ログインフォーム --}}
    <form method="POST" action="{{ route('login') }}">
      @csrf

      {{-- メールアドレス入力 --}}
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" class="form-control" name="user_email" id="email" required autofocus>
      </div>

      {{-- パスワード入力 --}}
      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" class="form-control" name="user_password" id="password" required>
      </div>

      {{-- ログインボタン --}}
      <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
  </div>
@endsection

@section('scripts')
  <script></script>
@endsection
