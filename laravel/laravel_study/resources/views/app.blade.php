<!DOCTYPE html>
<html lang='ja'>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'TNGブログ')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- ヘッダー部 -->
         <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-primary-subtle">
            <a href="{{ route('index') }}" class="text-decoration-none link-body-emphasis">
            <h3>TNGブログ</h3>
            </a>
            @auth
            <div>ログインユーザー: {{ auth()->user()->name }}</div>
            @endauth

            <div class="col-4">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="btn btn-outline-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
            </div>
         </header>

         <div class="container">
            <div class="row justify-content-center">
                <!-- フラッシュメッセージの表示 -->
                 @if(session('success'))
                 <div class="alert alert-success">
                    {{ session('success') }}
                 </div>
                 @endif

                 <!-- 各画面の中身 -->
                  <div class="col-8">
                    @yield('content')
                  </div>
            </div>
         </div>

         <footer class=" d-flex flex-wrap justify-content-center py-3 mt-5 bg-primary-subtle">
            <!-- フッター部 -->
             <P>&copy; 2024 ALL Rights Reserved.</P>
         </footer>

    </body>
    
</html>