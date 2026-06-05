@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')
<div class="product-detail">
    <div class="breadcrumb">
        <a href="/products">商品一覧</a>
        <span class="breadcrumb__arrow">></span>
        <span>{{ $product->name }}</span>
    </div>
    <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="product-detail__content">
            <div class="product-detail__left">
                <img src="{{ asset('storage/fruits-img/' .$product->image) }}" alt="{{ $product->name }}">
                <div class="image-upload">
                    <input type="file" name="image" id="image">
                    <label for="image" class="image-upload__button">
                        ファイルを選択
                    </label>
                    <span class="image-upload__filename">
                        {{ $product->image }}
                    </span>
                </div>
            </div>
            <div class="product-detail__right">
                <div class="form-group">
                    <label>商品名</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>値段</label>
                    <input type="text" name="price" value="{{ old('price', $product->price) }}">
                    @error('price')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>季節</label>
                    <div class="season-group">
                        <label><input type="checkbox" name="seasons[]" value="1"
                        {{ in_array('1', old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                        春</label>
                        <label><input type="checkbox" name="seasons[]" value="2"
                        {{ in_array('2', old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                        夏</label>
                        <label><input type="checkbox" name="seasons[]" value="3"
                        {{ in_array('3', old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                        秋</label>
                        <label><input type="checkbox" name="seasons[]" value="4"
                        {{ in_array('4', old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                        冬</label>
                    </div>
                    @error('seasons')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="product-description">
            <label>商品説明</label>
            <textarea name="description" rows="8">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-detail__buttons">
            <div class="button-group">
                <button type="button" class="back__button" onclick="location.href='/products'">戻る</button>
                <button type="submit" class="save__button">変更を保存</button>
            </div>
        </div>
    </form>
    <form class="delete-form" action="/products/{{ $product->id }}/delete" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete__button">🗑️</button>
    </form>
</div>
@endsection