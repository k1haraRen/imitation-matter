@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection
@section('content')
    <div class="register">
        <div class="register__view">
            <div class="register__title">
                <h1>会員登録</h1>
            </div>
            <form action="/register" method="post">
                @csrf
                <div class="register__content">
                    <div class="register__content-item">
                        <div class="content-item__title">ユーザー名</div>
                        <input type="text" class="content-item__input" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
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
                    <div class="register__content-item">
                        <div class="content-item__title">確認用パスワード</div>
                        <input type="text" class="content-item__input" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="content-button">
                    <button type="submit" class="content-button__submit">登録する</button>
                </div>
            </form>
            <div class="url">
                <a href="{{ route('login') }}" class="login__url">ログインはこちら</a>
            </div>
        </div>
    </div>
@endsection