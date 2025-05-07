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
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="sell__pic">
                    <div class="pic__title">
                        <span class="item__pic-title">商品画像</span>
                    </div>
                    <div class="item__pic">
                        <img id="preview" src="{{ asset('img/default.png') }}" alt="商品画像を選択してください" class="pic__preview">
                        <label for="select__pic" class="pic__select-button">
                            <input type="file" id="select__pic" accept="image/*" class="pic__select-input" name="item_image">
                            画像を選択する
                        </label>
                        @if ($errors->has('item_image'))
                            <div class="error-message">{{ $errors->first('item_image') }}</div>
                        @endif
                    </div>
                </div>
                <div class="item__detail">
                    <div class="detail__title">
                        <span class="item__detail-title">商品の詳細</span>
                    </div>
                    <div class="item__category">
                        <div class="item__category-title">カテゴリー</div>
                        <div class="category__list">
                            @foreach ($categories as $category)
                                <input type="checkbox" id="category_{{ $category->id }}" name="category[]" value="{{ $category->id }}">
                                <label for="category_{{ $category->id }}" class="category__item-label">{{ $category->content }}</label>
                            @endforeach
                        </div>
                    </div>
                    @if ($errors->has('category'))
                        <div class="error-message">{{ $errors->first('category') }}</div>
                    @endif
                </div>
                <div class="item__status">
                    <div class="item__status-title">
                        <span class="status__title">商品の状態</span>
                    </div>
                    <div class="item__status-select">
                        <select name="state_id" id="" class="status__select-button">
                            <option value="" selected>選択してください</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->state }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('state_id'))
                            <div class="error-message">{{ $errors->first('state_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="sell__content">
                    <div class="sell__content-title">
                        <span class="content__title">商品名と説明</span>
                    </div>
                    <div class="sell__content-item">
                        <div class="content-item__title">商品名</div>
                        <input type="text" class="content-item__input" name="item_name">
                        @if ($errors->has('item_name'))
                            <div class="error-message">{{ $errors->first('item_name') }}</div>
                        @endif
                    </div>
                    <div class="sell__content-item">
                        <div class="content-item__title">プランド名</div>
                        <input type="text" class="content-item__input" name="brand_name">
                        @if ($errors->has('brand_name'))
                            <div class="error-message">{{ $errors->first('brand_name') }}</div>
                        @endif
                    </div>
                    <div class="sell__content-item">
                        <div class="content-item__title">商品の説明</div>
                        <textarea id="" class="content-item__textarea" name="text"></textarea>
                        @if ($errors->has('text'))
                            <div class="error-message">{{ $errors->first('text') }}</div>
                        @endif
                    </div>
                    <div class="sell__content-item">
                        <div class="content-item__title">販売価格</div>
                        <input type="text" class="content-item__input" name="price">
                        @if ($errors->has('price'))
                            <div class="error-message">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                </div>
                <div class="content-button">
                    <button type="submit" class="content-button__submit">出品する</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('select__pic').addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('preview').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
    </script>
@endsection