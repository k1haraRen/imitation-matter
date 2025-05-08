@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection
@section('content')
    <div class="detail">
        <div class="detail__content">
            <div class="detail__pic">
                <img src="{{ asset('storage/item_image/' . $item->item_image) }}" alt="商品画像" class="detail__item-pic">
            </div>
            <div class="detail__content-item">
                <div class="item__name">{{ $item->item_name }}</div>
                <div class="item__bland-name">{{ $item->brand_name }}</div>
                <div class="item__price">
                    <span class="item__price-money">{{ $item->price }}</span>
                </div>
                <div class="mark">
                    <div class="star__mark">
                        <input type="checkbox" id="favorite" class="star__mark-input" {{ $item->favoritedBy->contains(auth()->user()) ? 'checked' : '' }}>
                        <label for="favorite" class="star__mark-button">★</label>
                        <div class="star__mark-score" id="favoriteCount">{{ $item->favoritedBy->count() }}</div>
                    </div>
                    <div class="comment__mark">
                        <div class="comment__mark-button">💬</div>
                        <div class="comment__mark-score">{{ $item->comments->count() }}</div>
                    </div>
                </div>
                @if (!$item->sold)
                    <div class="buy__button">
                        <a href="{{ route('purchase.edit', $item) }}">
                            <button class="buy__button-submit">購入手続きへ</button>
                        </a>
                    </div>
                @endif
                @if ($item->sold)
                    <div class="sold">
                        sold
                    </div>
                @endif
                <div class="item__describe">
                    <div class="describe__title">商品説明</div>
                    <p class="describe__area">{{ $item->text }}</p>
                </div>
                <div class="item__information">
                    <div class="information__title">商品の情報</div>
                    <div class="information__content">
                        <div class="item__category">
                            <div class="item__category-title">カテゴリー</div>
                            <div class="item__category-content">
                                @foreach ($item->category as $category)
                                    <span class="category__content-list">{{ $category->content }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="item__status">
                            <div class="item__status-title">商品の状態</div>
                            <div class="item__status-content">{{ $item->state->state }}</div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <div class="comment__title">
                        <span class="comment__title-left">コメント</span>
                        <span class="comment__title-count">（{{ $item->comments->count() }}）</span>
                    </div>
                    @foreach ($item->comments as $comment)
                        <div class="other__comment">
                            <div class="comment__user">
                                <img src="{{ asset('storage/user_icon/' . $comment->users->first()->icon_url) }}" alt="" class="comment__user-icon">
                                <div class="comment__user-name">{{ $comment->users->first()->name ?? '不明' }}</div>
                            </div>
                            <div class="other__comment-content">
                                <textarea readonly class="other__comment-textarea">{{ $comment->comment }}</textarea>
                            </div>
                        </div>
                    @endforeach
                    <div class="write__comment">
                        <div class="write__comment-title">商品へのコメント</div>
                        <form action="{{ route('comment.store', ['item' => $item->id]) }}" method="POST">
                            @csrf
                            <div class="write__comment-content">
                                <textarea name="comment" class="write__comment-textarea" required></textarea>
                            </div>
                            <div class="write__comment-button">
                                <button type="submit" class="comment__button-submit">コメントを送信する</button>
                            </div>
                            @error('comment')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('favorite').addEventListener('change', function () {
            fetch("{{ route('favorite.toggle', ['item' => $item->id]) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({})
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById('favoriteCount').textContent = data.count;
                });
        });
    </script>
@endsection