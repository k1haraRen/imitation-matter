@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection
@section('content')
    <div class="register">
        <form action="{{ route('address.update') }}" method="POST">
            @csrf
            <div class="register__view">
                <div class="register__title">
                    <h1>住所の変更</h1>
                </div>
                <div class="register__content">
                    <div class="register__content-item">
                        <div class="content-item__title">郵便番号</div>
                        <input type="text" name="postcode" class="content-item__input"
                            value="{{ old('postcode', $user->postcode) }}">
                    </div>
                    <div class="register__content-item">
                        <div class="content-item__title">住所</div>
                        <input type="text" name="address" class="content-item__input"
                            value="{{ old('address', $user->address) }}">
                    </div>
                    <div class="register__content-item">
                        <div class="content-item__title">建物名</div>
                        <input type="text" name="building" class="content-item__input"
                            value="{{ old('building', $user->building) }}">
                    </div>
                </div>
                <div class="content-button">
                    <button type="submit" class="content-button__submit">更新する</button>
                </div>
            </div>
        </form>
    </div>
@endsection