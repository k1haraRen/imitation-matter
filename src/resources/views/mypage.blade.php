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
                <button onclick="fetchMyItems('selling')" class="switch__button">出品した商品</button>
                <button onclick="fetchMyItems('purchased')" class="switch__button">購入した商品</button>
            </div>
        </div>
        <div class="item__list-all">
            <div id="myItemContainer">
                @include('components.item_list', ['items' => $items])
            </div>
        </div>
    </div>

    <script>
        function fetchMyItems(type) {
            const url = `/mypage/items/${type}`;

            fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('myItemContainer').innerHTML = html;
                })
                .catch(err => console.error('読み込みエラー:', err));
        }
    </script>
@endsection