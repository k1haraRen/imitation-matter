@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection
@section('content')
    <div class="admin">
        <div class="list">
            <div class="list__item">
                <button class="suggest" onclick="fetchItems('suggest')">おすすめ</button>
                <button class="my-list" onclick="fetchItems('mylist')">マイリスト</button>
            </div>
        </div>
        <div class="item__list-all" id="itemContainer">
            @include('components.item_list', ['items' => $items])
        </div>
    </div>

    <script>
        const keywordInput = document.getElementById('searchKeyword');

        keywordInput.addEventListener('keyup', function () {
            const keyword = keywordInput.value;
            const type = window.currentType || 'suggest';
            const url = `/items/${type}?keyword=${encodeURIComponent(keyword)}`;

            fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('itemContainer').innerHTML = html;
                })
                .catch(err => console.error('読み込みエラー:', err));
        });

        function fetchItems(type) {
            window.currentType = type;
            const keyword = document.querySelector('input[name="keyword"]').value;
            const url = `/items/${type}?keyword=${encodeURIComponent(keyword)}`;

            fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('itemContainer').innerHTML = html;
                })
                .catch(err => console.error('読み込みエラー:', err));
        }
    </script>
@endsection