@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{  asset('css/mail_check.css') }}" />
@endsection
@section('content')
    <div class="mail_check">
        <div class="check__content">
            <div class="check__item-comment">
                <div class="comment1">登録していただいたメールアドレスに認証メールを送付しました。</div>
                <div class="comment2">メール認証を完了してください。</div>
            </div>
            <div class="check__button">
                <button class="check__button-submit">認証はこちらから</button>
            </div>
            <div class="resend">
                <a href="" class="resend__url">認証メールを再送する</a>
            </div>
        </div>
    </div>
@endsection