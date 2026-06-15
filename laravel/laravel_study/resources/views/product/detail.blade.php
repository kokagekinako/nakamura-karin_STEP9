<!DOCTYPE html>
<html>

<head>
    <title>商品詳細</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script>
        function toggleHeart(element) {
            if (element.style.color == "red") {
                element.style.color = "";
            } else {
                element.style.color = "red";
            }
        }
    </script>

</head>

<body>

    <h1>商品詳細</h1>

    <p>商品名：{{ $product->product_name }}</p>

    <p>説明：{{ $product->description }}</p>

    <p>画像：</p>

    <img src="{{ asset('images/' . $product->image) }}"
        class="product-image">

    <p class="price">
        金額：￥{{ $product->price }}
    </p>

    <p class="company">
        会社：TNG
    </p>

    <p class="heart" onclick="toggleHeart(this)">♥</p>

    <a href="/products/buy/{{ $product->id }}" class="btn primary-btn">
        カートに追加する
    </a>

    <a href="/products" class="btn secondary-btn">
        戻る
    </a>

</body>

</html>