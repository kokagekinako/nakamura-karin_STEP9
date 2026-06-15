<!DOCTYPE html>
<html>

<head>
    <title>商品一覧</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    @include('layouts.header')

    <div class="container">

        <h1>商品一覧</h1>

        <form action="/products" method="GET">

            <div class="search-area">

                <input type="text" name="keyword" placeholder="商品名を入力">

                <input type="number" name="min_price" placeholder="最低価格">

                <span>~</span>

                <input type="number" name="max_price" placeholder="最高価格">

                <button type="submit" class="btn primary-btn">
                    検索
                </button>

            </div>

        </form>

        <table>
            <tr>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>画像</th>
                <th>料金(￥)</th>
            </tr>

            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->description }}</td>

                <td>
                    <img src="{{ asset('images/' . $product->image) }}" width="80">
                </td>

                <td>
                    {{ $product->price }}
                </td>

                <td>
                    <a href="/products/{{ $product->id }}" class="btn success-btn">
                        詳細
                    </a>
                </td>

            </tr>
            @endforeach

        </table>

    </div>

    @include('layouts.footer')

</body>

</html>