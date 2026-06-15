<!DOCTYPE html>
<html>

<head>
    <title>アカウント情報編集</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <h1>アカウント情報編集</h1>

    <form action="{{ route('account.update') }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="user_name" value="{{ old('user_name', Auth::user()->user_name) }}">
        </div>

        <div class="form-group">
            <label>Eメール</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}">
        </div>

        <div class="form-group">
            <label>名前</label>
            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}">
        </div>

        <div class="form-group">
            <label>カナ</label>
            <input type="text" name="name_kana" value="{{ old('name_kana', Auth::user()->name_kana) }}">
        </div>

        <div class="button-area">
            <a href="/mypage" class="btn secondary-btn">
                戻る
            </a>

            <button type="submit" class="btn primary-btn">
                更新
            </button>

        </div>

    </form>
</body>

</html>