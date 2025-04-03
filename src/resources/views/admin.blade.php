@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection
@section('content')
    <div class="admin">
        <div class="list">
            <div class="list__item">
                <button class="suggest">おすすめ</button>
                <button class="my-list">マイリスト</button>
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