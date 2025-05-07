@extends('layouts.app_login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}" />
@endsection
@section('content')
    <div class="purchase">
        <div class="purchase__content">
            <div class="purchase__left">
                <div class="item">
                    <div class="item__left">
                        <img src="{{ asset('storage/item_image/' . $item->item_image) }}" alt="商品画像" class="item__pic">
                    </div>
                    <div class="item__right">
                        <div class="item__name">{{ $item->item_name }}</div>
                        <div class="item__price">{{ number_format($item->price) }}</div>
                    </div>
                </div>
                <div class="payment">
                    <div class="payment__title">
                        <div class="payment__content-title">支払い方法</div>
                    </div>
                    <div class="payment__howto">
                        <select name="payment_method" class="payment__howto-select" id="payment-select">
                            <option value="card">クレジットカード</option>
                            <option value="konbini">コンビニ支払い</option>
                        </select>
                    </div>
                </div>
                <div class="shipping">
                    <div class="shipping__left">
                        <div class="shipping__address-title">配送先</div>
                        <div class="shipping__address">
                            <div class="shipping__address-column">
                            <div class="shipping__address-postcode">{{ $user->formatted_postcode }}</div>
                                <div class="shipping__address-city">
                                    {{ $user->address }} {{ $user->building }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shipping__right">
                        <a href="{{ route('address.edit', $item->id) }}" class="address__alter">変更する</a>
                    </div>
                </div>
            </div>
            <div class="purchase__right">
                <form method="POST" id="payment-form" action="{{ route('purchase.card') }}">
                    @csrf
                    <div class="confirmation">
                        <div class="item__confirmation">
                            <div class="item__confirmation-left">
                                <span class="item__confirmation-title">商品代金</span>
                            </div>
                            <div class="item__confirmation-right">
                                <span class="item__confirmation-money">{{ number_format($item->price) }}</span>
                            </div>
                        </div>
                        <div class="payment__confirmation">
                            <div class="payment__confirmation-left">
                                <span class="payment__confirmation-title">支払い方法</span>
                            </div>
                            <div class="payment__confirmation-right">
                                <span class="payment__confirmation-howto" id="selected-method-label">クレジットカード</span>
                            </div>
                        </div>
                    </div>
                    <div class="purchase__button">
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <input type="hidden" name="payment_method" id="payment-method" value="card">
                        <button class="purchase__button-submit">購入する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paymentSelect = document.getElementById('payment-select');
            const form = document.getElementById('payment-form');
            const methodLabel = document.getElementById('selected-method-label');
            const paymentMethodInput = document.getElementById('payment-method');

            const routes = {
                card: "{{ route('purchase.card') }}",
                konbini: "{{ route('purchase.konbini') }}"
            };

            const labels = {
                card: "クレジットカード",
                konbini: "コンビニ払い"
            };

            paymentSelect.addEventListener('change', function () {
                const selected = this.value;
                form.action = routes[selected];
                paymentMethodInput.value = selected;
                methodLabel.textContent = labels[selected];
            });
        });
    </script>
@endsection