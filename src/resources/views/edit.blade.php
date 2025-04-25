@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}" />
@endsection
@section('content')
    <div class="register">
        <div class="register__view">
            <div class="register__title">
                <h1>プロフィール設定</h1>
            </div>
            <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="icon">
                    <div class="my-icon">
                        <span class="my-icon__pic" id="iconPreview" style="background-image: url('{{ asset('storage/user_icon/' . $user->icon_url) }}');"></span>
                    </div>
                    <div class="icon-select">
                        <label for="select__file" class="icon-select__button">
                            <input type="file" id="select__file" accept="image/*" class="icon-select__input" name="icon_url">
                            画像を選択する
                        </label>
                    </div>
                </div>
                <div class="register__content">
                    <div class="register__content-item">
                        <div class="content-item__title">ユーザー名</div>
                        <input type="text" class="content-item__input" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register__content-item">
                        <div class="content-item__title">郵便番号</div>
                        <input type="text" class="content-item__input" name="postcode" value="{{ old('postcode', $user->postcode) }}">
                        @error('postcode')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register__content-item">
                        <div class="content-item__title">住所</div>
                        <input type="text" class="content-item__input" name="address" value="{{ old('address', $user->address) }}">
                        @error('address')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register__content-item">
                        <div class="content-item__title">建物名</div>
                        <input type="text" class="content-item__input" name="building" value="{{ old('building', $user->building) }}">
                        @error('building')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="content-button">
                    <button type="submit" class="content-button__submit">登録する</button>
                </div>
            </form>
    </div>

    <script>
        document.getElementById('select__file').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const preview = document.getElementById('iconPreview');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.style.backgroundImage = `url(${e.target.result})`;
                    preview.style.backgroundSize = 'cover';
                    preview.style.backgroundPosition = 'center';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection