<!DOCTYPE html>
<html>

<head>
    <title>購入画面</title>
</head>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<body>

    <h1>購入画面</h1>

    <p>商品名：{{ $product->product_name }}</p>

    <p>説明：{{ $product->description }}</p>

    <img
        src="{{ asset('images/' . $product->image) }}"
        class="product-image">

    <p class="price">
        金額：￥{{ $product->price }}
    </p>

    <p>残り：{{ $product->stock }}</p>

    <p class="company">
        会社：TNG
    </p>


    <div class="button-area">

        <form action="{{ route('products.purchase') }}" method="POST">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <button type="submit" class="btn primary-btn">
                購入する
            </button>
        </form>

        <a href="/products/{{ $product->id }}"
            class="btn secondary-btn">
            戻る
        </a>

    </div>

</body>

</html>