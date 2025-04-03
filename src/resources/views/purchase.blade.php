@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}" />
@endsection
@section('content')
    <div class="purchase">
        <div class="purchase__content">
            <div class="purchase__left">
                <div class="item">
                    <div class="item__left">
                        <img src="" alt="商品画像" class="item__pic">
                    </div>
                    <div class="item__right">
                        <div class="item__name">商品名</div>
                        <div class="item__price">47,000</div>
                    </div>
                </div>
                <div class="payment">
                    <div class="payment__title">
                        <div class="payment__content-title">支払い方法</div>
                    </div>
                    <div class="payment__howto">
                        <select name="" id="" class="payment__howto-select">
                            <option value="" selected>選択してください</option>
                        </select>
                    </div>
                </div>
                <div class="shipping">
                    <div class="shipping__left">
                        <div class="shipping__address-title">配送先</div>
                        <div class="shipping__address">
                            <div class="shipping__address-column">
                                <div class="shipping__address-postcode">XXX-YYY</div>
                                <div class="shipping__address-city">ここには住所と建物が入ります</div>
                            </div>
                        </div>
                    </div>
                    <div class="shipping__right">
                        <a href="" class="address__alter">変更する</a>
                    </div>
                </div>
            </div>
            <div class="purchase__right">
                <div class="confirmation">
                    <div class="item__confirmation">
                        <div class="item__confirmation-left">
                            <span class="item__confirmation-title">商品代金</span>
                        </div>
                        <div class="item__confirmation-right">
                            <span class="item__confirmation-money">47,000</span>
                        </div>
                    </div>
                    <div class="payment__confirmation">
                        <div class="payment__confirmation-left">
                            <span class="payment__confirmation-title">支払い方法</span>
                        </div>
                        <div class="payment__confirmation-right">
                            <span class="payment__confirmation-howto">コンビニ払い</span>
                        </div>
                    </div>
                </div>
                <div class="purchase__button">
                    <button class="purchase__button-submit">購入する</button>
                </div>
            </div>
        </div>
    </div>
@endsection