<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    <div class="whole">
        <header class="header">
            <div class="header__whole">
                <div class="header__inner">
                    <div class="header__icon">
                        <img class="header__icon-coachtech" src="{{ asset('img/logo.svg') }}" alt="">
                    </div>
                    <div class="header__search">
                        <input type="text" class="header__search-input">
                    </div>
                    <div class="header__light">
                        <ul class="header__list">
                            <nav>
                                @auth
                                    <form action="/logout" method="post">
                                        @csrf
                                        <li class="header__item">
                                            <button type="submit" class="header__login">ログアウト</button>
                                        </li>
                                    </form>
                                @else
                                    <li class="header__item">
                                        <a href="{{ route('login') }}" class="login__button">ログイン</a>
                                    </li>
                                @endauth
                            </nav>
                            <li class="header__item">
                                <a href="{{ route('mypage') }}" class="header__mypage">マイページ</a>
                            </li>
                            <li class="header__item">
                                <span class="header__sell">出品</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>