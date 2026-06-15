<!DOCTYPE html>
<html>

<head>
    <title>マイページ</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <h1>マイページ</h1>

    <a href="{{ route('account.edit') }}" class="btn primary-btn">
        アカウント編集
    </a>

    <div class="user-info">

        <div class="left-info">
            <p>ユーザー名：{{ Auth::user()->user_name }}</p>
            <p>Eメール：{{ Auth::user()->email }}</p>
        </div>

        <div class="right-info">
            <p>名前：{{ Auth::user()->name }}</p>
            <p>カナ：{{ Auth::user()->name_kana}}</p>
        </div>

    </div>

    <div class="product-header">

        <h2>&lt;出品商品&gt;</h2>

        <a href="/products/create" class="btn primary-btn">
            新規登録
        </a>

    </div>

    <table>
        <tr>
            <th>商品番号</th>
            <th>商品名</th>
            <th>商品説明</th>
            <th>料金（￥）</th>
        </tr>

        @foreach ($products as $product)

        <tr>
            <td>{{ $product->id }}</td>

            <td>{{ $product->product_name }}</td>

            <td>{{ $product->description }}</td>

            <td>{{ $product->price }}</td>

            <td>
                <a href="/mypage/products/{{ $product->id }}" class="btn success-btn">
                    詳細
                </a>
            </td>
        </tr>

        @endforeach

    </table>

    <h2>&lt;購入した商品&gt;</h2>

    <table>
        <tr>
            <th>商品名</th>
            <th>商品説明</th>
            <th>料金（￥）</th>
            <th>個数</th>
        </tr>

        @foreach ($products as $product)

        <tr>
            <td>{{ $product->product_name }}</td>

            <td>{{ $product->description }}</td>

            <td>{{ $product->price }}</td>

            <td>1</td>

        </tr>

        @endforeach

    </table>

</body>

</html>