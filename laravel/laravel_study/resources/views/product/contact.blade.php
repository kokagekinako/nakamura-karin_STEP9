<!DOCTYPE html>
<html>

<head>
    <title>お問い合わせフォーム</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    @include('layouts.header')

    <h1>お問い合わせフォーム</h1>

    <form action="/contact/send" method="POST">
        @csrf

        <div class="form-group">
            <label>名前</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label>お問い合わせ内容</label>
            <textarea name="message">{{ old('message') }}</textarea>

            <button type="submit" class="btn primary-btn">
                送信
            </button>

            <button type="button" class="btn secondary-btn" onclick="location.href='/products'">
                戻る
            </button>

    </form>

    @include('layouts.footer')

</body>

</html>