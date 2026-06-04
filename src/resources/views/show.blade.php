@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')
<div class="product-detail">
    <div class="breadcrumb">
        <a href="/">商品一覧</a>
        <span class="breadcrumb__arrow">></span>
        <span>キウイ</span>
    </div>
    <div class="product-detail__content">
        <div class="product-detail__left">
            <img src="{{ asset('storage/fruits-img/kiwi.png') }}" alt="キウイ">
            <div class="image-upload">
                <input type="file" id="image">
                <label for="image" class="image-upload__button">
                    ファイルを選択
                </label>
                <span class="image-upload__filename">
                    kiwi.png
                </span>
            </div>
        </div>
        <div class="product-detail__right">
            <div class="form-group">
                <label>商品名</label>
                <input type="text" value="キウイ">
            </div>
            <div class="form-group">
                <label>値段</label>
                <input type="text" value="800">
            </div>
            <div class="form-group">
                <label>季節</label>
                <div class="season-group">
                    <label><input type="checkbox">春</label>
                    <label><input type="checkbox">夏</label>
                    <label><input type="checkbox">秋</label>
                    <label><input type="checkbox">冬</label>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description">
        <label>商品説明</label>
        <textarea rows="8"></textarea>
    </div>

    <div class="product-detail__buttons">
        <div class="button-group">
            <button class="back__button">戻る</button>
            <button class="save__button">変更を保存</button>
        </div>
        <button class="delete__button">🗑️</button>
    </div>

</div>
@endsection