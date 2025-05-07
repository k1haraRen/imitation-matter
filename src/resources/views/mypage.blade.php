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
                <button onclick="loadItems('my')">出品した商品</button>
                <button onclick="loadItems('purchased')">購入した商品</button>
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

    <script>
        async function loadItems(type) {
            let url = '';
            if (type === 'my') {
                url = '{{ route('mypage.my_items') }}';
            } else {
                url = '{{ route('mypage.purchased_items') }}';
            }

            const res = await fetch(url);
            const items = await res.json();

            const container = document.getElementById('item-list');
            container.innerHTML = '';

            if (items.length === 0) {
                container.innerHTML = '<p>商品がありません。</p>';
                return;
            }

            items.forEach(item => {
                const html = `
                    <div class="item-card">
                        <h3>${item.item_name}</h3>
                        <p>¥${item.price}</p>
                        <img src="/storage/item_image/${item.image}" width="150">
                    </div>
                `;
                container.innerHTML += html;
            });
        }

        // 初期表示：出品した商品
        loadItems('my');
    </script>
@endsection