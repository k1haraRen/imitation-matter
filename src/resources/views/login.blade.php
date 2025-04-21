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
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register__content-item">
                        <div class="content-item__title">パスワード</div>
                        <input type="text" class="content-item__input" name="password">
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="content-button">
                    <button type="submit" class="content-button__submit">ログインする</button>
                </div>
            </form>
            <div class="url">
                <a href="{{ route('register') }}" class="login__url">会員登録はこちら</a>
            </div>
        </div>
    </div>
@endsection