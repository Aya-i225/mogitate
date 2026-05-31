@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="products">
    <div class="products__header">
        <h1 class="products__title">商品一覧</h1>
        <a class="products__add-button" href="products/register">+商品を追加</a>
    </div>

    <div class="products__content">
        <aside class="search">
            <form action="/" method="GET" class="search__form">
                <input class="search__input" type="text" name="keyword" placeholder="商品名で検索">
                <button class="search__button" type="submit">検索</button>
                <div class="search__sort">
                    <label class="search__sort-label" for="sort">価格順で表示
                    </label>
                    <select id="sort" class="search__select" name="sort">
                        <option value="">価格順で並べ替え</option>
                        <option value="high">高い順に表示</option>
                        <option value="low">低い順に表示</option>
                    </select>
                </div>
            </form>
        </aside>

        <div class="products-list">
            @foreach ($products as $product)
            <div class="product-card">
                <img class="product-card__img" src="{{ asset('storage/fruits-img/' .$product->image) }}" alt="{{ $product->name }}">
                <div class="product-card__body">
                    <p class="product-card__name">{{ $product->name }}</p>
                    <p class="product-card__price">¥{{ number_format($product->price) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="products__pagination">
        {{ $products->links() }}
    </div>
</div>
@endsection