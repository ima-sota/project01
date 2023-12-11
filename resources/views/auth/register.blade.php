<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ユーザー登録</title>
</head>

<body>
  <div class="container">
    <h1>ユーザー登録</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group">
        <label for="name">名前</label>
        <input type="text" name="user_name" id="name" required>
      </div>

      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" name="user_email" id="email" required>
      </div>

      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" name="user_password" id="password" required>
      </div>

      <div class="form-group">
        <label for="password_confirmation">パスワード（確認用）</label>
        <input type="password" name="user_password_confirmation" id="user_password_confirmation" required>
      </div>

      <button type="submit">登録</button>
    </form>
  </div>
</body>

</html>
