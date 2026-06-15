<!DOCTYPE html>
<html>

<head>
    <title>出品商品詳細</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <h1>出品商品詳細</h1>

    <p>商品名：{{ $product->product_name }}</p>

    <p>説明：{{ $product->description }}</p>

    <p>画像：</p>

    <img src="{{ asset('images/' . $product->image) }}"
        class="product-image">

    <p class="price">
        金額：￥{{ $product->price }}
    </p>

    <a href="/products/{{ $product->id }}/edit"
        class="btn primary-btn">
        編集
    </a>

    <form action="/products/{{ $product->id }}"
        method="POST"
        style="display:inline;">

        @csrf
        @method('DELETE')

        <button type="submit"
            class="btn danger-btn">
            削除する
        </button>
    </form>

    <a href="/mypage" class="btn secondary-btn">
        戻る
    </a>

</body>

</html>