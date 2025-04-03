@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection
@section('content')
    <div class="detail">
        <div class="detail__content">
            <div class="detail__pic">
                <img src="" alt="商品画像" class="detail__item-pic">
            </div>
            <div class="detail__content-item">
                <div class="item__name">商品名がここに入る</div>
                <div class="item__bland-name">ブランド名</div>
                <div class="item__price">
                    <span class="item__price-money">47,000</span>
                </div>
                <div class="mark">
                    <div class="star__mark">
                        <input type="checkbox" id="favorite" class="star__mark-input">
                        <label for="favorite" class="star__mark-button">★</label>
                        <div class="star__mark-score">3</div>
                    </div>
                    <div class="comment__mark">
                        <div class="comment__mark-button">💬</div>
                        <div class="comment__mark-score">1</div>
                    </div>
                </div>
                <div class="buy__button">
                    <button class="buy__button-submit">購入手続きへ</button>
                </div>
                <div class="item__describe">
                    <div class="describe__title">商品説明</div>
                    <textarea name="" id="" class="describe__area"></textarea>
                </div>
                <div class="item__information">
                    <div class="information__title">商品の情報</div>
                    <div class="information__content">
                        <div class="item__category">
                            <div class="item__category-title">カテゴリー</div>
                            <div class="item__category-content">
                                <span class="category__content-list">洋服</span>
                                <span class="category__content-list">メンズ</span>
                            </div>
                        </div>
                        <div class="item__status">
                            <div class="item__status-title">商品の状態</div>
                            <div class="item__status-content">良好</div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <div class="comment__title">
                        <span class="comment__title-left">コメント</span>
                        <span class="comment__title-count">（1）</span>
                    </div>
                    <div class="other__comment">
                        <div class="comment__user">
                            <span class="comment__user-icon"></span>
                            <div class="comment__user-name">admin</div>
                        </div>
                        <div class="other__comment-content">
                            <textarea name="" id="" class="other__comment-textarea">こちらにコメントが入ります</textarea>
                        </div>
                    </div>
                    <div class="write__comment">
                        <div class="write__comment-title">商品へのコメント</div>
                        <div class="write__comment-content">
                            <textarea name="" id="" class="write__comment-textarea"></textarea>
                        </div>
                        <div class="write__comment-button">
                            <button class="comment__button-submit">コメントを送信する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection