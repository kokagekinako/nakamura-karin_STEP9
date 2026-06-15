<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 40px;
        border-bottom: 1px solid #ddd;
    }

    .logo {
        font-size: 30px;
        font-weight: bold;
    }

    .menu {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .logout-btn {
        background-color: #dc3545;
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
    }
</style>

<header class="header">

    <div class="logo">
        Cytech EC
    </div>

    <div class="menu">
        <a href="/products">Home</a>

        <a href="/mypage">マイページ</a>

        <span>
            ログインユーザー:
            @auth
            {{ Auth::user()->user_name }}
            @else
            ログインしてません
            @endauth
        </span>

        <a href="/logout" class="logout-btn">
            ログアウト
        </a>
    </div>

</header>