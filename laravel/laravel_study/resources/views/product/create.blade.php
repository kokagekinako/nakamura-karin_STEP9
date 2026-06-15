<!DOCTYPE html>
<html>

<head>
    <title>商品登録</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <h1>商品登録</h1>

    <form action="/products/store" method="POST">

        @csrf

        <div class="form-group">
            <label>商品名</label>
            <input type="text" name="product_name">
        </div>

        <div class="form-group">
            <label>価格</label>
            <input type="text" name="price">
        </div>

        <div class="form-group">
            <label>商品説明</label>
            <textarea name="description"></textarea>
        </div>

        <div class="form-group">
            <label>在庫数</label>
            <input type="number" name="stock">
        </div>

        <div class="form-group">
            <label>商品画像</label>

            <img src="https://via.placeholder.com/500x300"
                class="product-image-small">

            <br><br>

            <input type="file">

        </div>

        <div class="btn-area">
            <a href="/mypage" class="btn secondary-btn">戻る</a>

            <button type="submit" class="btn primary-btn">登録</button>

        </div>

    </form>

</body>

</html>