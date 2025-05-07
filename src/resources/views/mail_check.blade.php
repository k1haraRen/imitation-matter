@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{  asset('css/mail_check.css') }}" />
@endsection
@section('content')
    <div class="mail_check">
        <div class="check__content">
            <div class="check__item-comment">
                <div class="comment1">登録していただいたメールアドレスに認証メールを送付しました。</div>
                <div class="comment2">認証が完了したら、以下のボタンを押して先へ進んでください。</div>
            </div>

            <div class="check__button">
                <form method="POST" action="{{ route('email.checkVerified') }}">
                    @csrf
                    <button type="submit" class="check__button-submit">認証はこちらから</button>
                </form>
            </div>

            <div class="resend">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="resend__url">認証メールを再送する</button>
                </form>
            </div>

            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            @if(session('status'))
                <div class="status">{{ session('status') }}</div>
            @endif
        </div>
    </div>
@endsection