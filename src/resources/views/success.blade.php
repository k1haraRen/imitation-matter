@extends('layouts.app')

@section('content')
    <div class="success">
        <h1>購入が完了しました！</h1>
        <p>商品: {{ $item->item_name }} は販売済みになりました。</p>
        <a href="{{ route('admin') }}">ホームへ戻る</a>
    </div>
@endsection