@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}" />
@endsection
@section('content')
    <div class="sell">
        <div class="sell__view">
            <div class="sell__title">
                <h1>商品の出品</h1>
            </div>
            <div class="sell__pic">
                <div class="pic__title">
                    <span class="item__pic-title">商品画像</span>
                </div>
                <div class="item__pic">
                    <label for="select__pic" class="pic__select-button">
                        <input type="file" id="select__pic" class="pic__select-input">
                        画像を選択する
                    </label>
                </div>
            </div>
            <div class="item__detail">
                <div class="detail__title">
                    <span class="item__detail-title">商品の詳細</span>
                </div>
                <div class="item__category">
                    <div class="item__category-title">カテゴリー</div>
                    <div class="category__list">
                        <input type="checkbox" id="fashion" name="category[]" value="fashion">
                        <label for="fashion" class="category__item-label">ファッション</label>
                        <input type="checkbox" id="sports" name="category[]" value="sports">
                        <label for="sports" class="category__item-label">家電</label>
                    </div>
                </div>
            </div>
            <div class="item__status">
                <div class="item__status-title">
                    <span class="status__title">商品の状態</span>
                </div>
                <div class="item__status-select">
                    <select name="" id="" class="status__select-button">
                        <option value="" selected>選択してください</option>
                    </select>
                </div>
            </div>
            <div class="sell__content">
                <div class="sell__content-title">
                    <span class="content__title">商品名と説明</span>
                </div>
                <div class="sell__content-item">
                    <div class="content-item__title">商品名</div>
                    <input type="text" class="content-item__input">
                </div>
                <div class="sell__content-item">
                    <div class="content-item__title">プランド名</div>
                    <input type="text" class="content-item__input">
                </div>
                <div class="sell__content-item">
                    <div class="content-item__title">商品の説明</div>
                    <textarea name="" id="" class="content-item__textarea"></textarea>
                </div>
                <div class="sell__content-item">
                    <div class="content-item__title">販売価格</div>
                    <input type="text" class="content-item__input">
                </div>
            </div>
            <div class="content-button">
                <button type="button" class="content-button__submit">出品する</button>
            </div>
        </div>
    </div>
@endsection