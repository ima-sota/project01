{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'デフォルトタイトル')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <header>
    @if (Auth::check())
      <div class="float-right">
        <span>ログイン中: {{ Auth::user()->user_name }}({{ Auth::user()->user_role }})</span>
        @if (in_array(Auth::user()->user_role, ['管理者', '編集']))
          | <a href="{{ route('users.index') }}">ユーザー管理</a>
        @endif
        | <a href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    @endif
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    {{-- フッターの内容 --}}
  </footer>

  {{-- 追加のJavaScriptなど --}}
  @yield('scripts')
</body>

</html>
