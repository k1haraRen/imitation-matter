@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/first_login.css') }}" />
@endsection
@section('content')
    <div class="register">
        <div class="register__view">
            <div class="register__title">
                <h1>プロフィール設定</h1>
            </div>
            <div class="icon">
                <div class="my-icon">
                    <span class="my-icon__pic"></span>
                </div>
                <div class="icon-select">
                    <label for="select__file" class="icon-select__button">
                        <input type="file" id="select__file" class="icon-select__input">
                        画像を選択する
                    </label>
                </div>
            </div>
            <div class="register__content">
                <div class="register__content-item">
                    <div class="content-item__title">ユーザー名</div>
                    <input type="text" class="content-item__input">
                </div>
                <div class="register__content-item">
                    <div class="content-item__title">郵便番号</div>
                    <input type="text" class="content-item__input">
                </div>
                <div class="register__content-item">
                    <div class="content-item__title">住所</div>
                    <input type="text" class="content-item__input">
                </div>
                <div class="register__content-item">
                    <div class="content-item__title">建物名</div>
                    <input type="text" class="content-item__input">
                </div>
            </div>
            <div class="content-button">
                <button type="button" class="content-button__submit">登録する</button>
            </div>
        </div>
    </div>
@endsection