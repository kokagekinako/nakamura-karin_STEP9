<!DOCTYPE html>
<html>

<head>
    <title>出品商品編集</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <h1>出品商品編集</h1>

    <form action="/products/{{ $product->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>商品名</label>
            <input type="text" name="product_name" value="{{ $product->product_name }}">
        </div>

        <div class="form-group">

            <label>価格</label>
            <input type="text" name="price" value="{{ $product->price }}">
        </div>

        <div class="form-group">

            <label>商品説明</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">

            <label>在庫数</label>
            <input type="number" name="stock" value="{{ $product->stock }}">
        </div>

        <div class="form-group">
            <label>商品画像</label>

            <img src="{{ asset('images/' . $product->image) }}" width="100">

            <br><br>

            <input type="file">

        </div>

        <a href="/mypage/products/{{ $product->id }}"
            class="btn secondary-btn">
            戻る
        </a>

        <button type="submit" class="btn primary-btn">更新</button>

    </form>

</body>

</html>