@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection
@section('content')
    <div class="admin">
        <div class="user">
            <div class="user-item">
                <div class="my-icon">
                    <img src="{{ asset('storage/user_icon/' . $user->icon_url) }}" alt="" class="my-icon__pic">
                </div>
                <div class="name">
                    <span class="user-name">{{ $user->name }}</span>
                </div>
                <div class="icon-select">
                    <a href="{{ route('edit') }}" class="icon-select__button">プロフィールを編集</a>
                </div>
            </div>
        </div>
        <div class="list">
            <div class="list__item">
                <button class="suggest">出品した商品</button>
                <button class="my-list">購入した商品</button>
            </div>
        </div>
        <div class="item__list-all">
            <div class="item__list">
                <div class="item">
                    <div class="picture">
                        <img src="" alt="商品画像" class="item-pic">
                    </div>
                    <div class="item-name__space">
                        <span class="item-name">商品名</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection