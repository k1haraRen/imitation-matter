@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection
@section('content')
    <div class="register">
        <div class="register__view">
            <div class="register__title">
                <h1>ログイン</h1>
            </div>
            <form action="/login" method="post">
                @csrf
                <div class="register__content">
                    <div class="register__content-item">
                        <div class="content-item__title">メールアドレス</div>
                        <input type="text" class="content-item__input" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="register__content-item">
                        <div class="content-item__title">パスワード</div>
                        <input type="text" class="content-item__input" name="password">
                    </div>
                </div>
                <div class="content-button">
                    <button type="button" class="content-button__submit">登録する</button>
                </div>
            </form>
            <div class="url">
                <a href="{{ route('register') }}" class="login__url">会員登録はこちら</a>
            </div>
        </div>
    </div>
@endsection