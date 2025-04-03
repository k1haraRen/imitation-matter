@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection
@section('content')
    <div class="register">
        <div class="register__view">
            <div class="register__title">
                <h1>住所の変更</h1>
            </div>
            <div class="register__content">
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
                <button type="button" class="content-button__submit">更新する</button>
            </div>
        </div>
    </div>
@endsection