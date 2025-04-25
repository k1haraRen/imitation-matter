<div class="item__list">
    @foreach ($items as $item)
        <div class="item">
            <div class="picture">
                <a href="{{ route('detail', ['id' => $item->id]) }}" class="item__detail">
                    <img src="{{ asset('storage/item_image/' . $item->item_image) }}" alt="商品画像" class="item-pic">
                </a>
            </div>
            <div class="item-name__space">
                <span class="item-name">{{ $item['item_name'] }}</span>
            </div>
        </div>
    @endforeach
</div>