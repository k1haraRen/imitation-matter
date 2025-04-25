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
                        <a href="{{ route('admin') }}">
                            <img class="header__icon-coachtech" src="{{ asset('img/logo.svg') }}" alt="">
                        </a>
                    </div>
                    <div class="header__search">
                        <input type="text" class="header__search-input">
                    </div>
                    <div class="header__light">
                        <nav>
                            <ul class="header__list">
                                @auth
                                    <form action="/logout" method="post">
                                        @csrf
                                        <li class="header__item">
                                            <button type="submit" class="header__logout">ログアウト</button>
                                        </li>
                                    </form>
                                    <li class="header__item">
                                        <a href="{{ route('mypage') }}" class="header__mypage">マイページ</a>
                                    </li>
                                    <li class="header__item">
                                        <a href="{{ route('sell') }}" class="header__sell">出品</a>
                                    </li>
                                @else
                                    <li class="header__item">
                                        <a href="{{ route('login') }}" class="login__button">ログイン</a>
                                    </li>
                                @endauth
                            </ul>
                        </nav>
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