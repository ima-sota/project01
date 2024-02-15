@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>ユーザー一覧</h1>
    @can('manage-users')
      <a href="{{ route('users.create') }}" class="btn btn-primary">ユーザー追加</a>
    @endcan
    <table class="table">
      <thead>
        <tr>
          <th>アカウント名</th>
          <th>メールアドレス</th>
          <th>権限</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->user_name }}</td>
            <td>{{ $user->user_email }}</td>
            <td>{{ $user->user_role }}</td>
            <td>
              @php
                $canEdit = Auth::user()->user_role == '管理者' || (Auth::user()->user_role == '編集' && $user->user_role != '管理者');
              @endphp
              @if ($canEdit)
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">編集</a>
              @endif
              @can('manage-users')
                {{-- 削除は管理権限を持つユーザーのみ可能 --}}
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">削除</button>
                </form>
              @endcan
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
