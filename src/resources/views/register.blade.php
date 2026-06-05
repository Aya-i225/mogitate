@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<div class="product-detail">
    <div class="products__header">
        <h1 class="products__title">商品登録</h1>
    </div>
    <form action="/products/register" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="product-detail__content">
            <div class="form-group">
                <label>商品名
                    <span class="required">必須</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>値段
                    <span class="required">必須</span>
                </label>
                <input type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
                @error('price')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>商品画像
                    <span class="required">必須</span>
                </label>
                <div class="image-preview">
                    <img id="preview" src="" alt="">
                </div>
                <div class="image-upload">
                    <input type="file" name="image" id="image">
                    <label for="image" class="image-upload__button">
                        ファイルを選択
                    </label>
                    <span id="file-name" class="image-upload__filename">
                    </span>
                </div>
                @error('image')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>季節
                    <span class="required">必須</span>
                    <span class="multiple">複数選択可</span>
                </label>
                <div class="season-group">
                    <label><input type="checkbox" name="seasons[]" value="1" {{ in_array('1', old('seasons', [])) ? 'checked' : '' }}>
                    春</label>
                    <label><input type="checkbox" name="seasons[]" value="2" {{ in_array('2', old('seasons', [])) ? 'checked' : '' }}>
                    夏</label>
                    <label><input type="checkbox" name="seasons[]" value="3" {{ in_array('3', old('seasons', [])) ? 'checked' : '' }}>
                    秋</label>
                    <label><input type="checkbox" name="seasons[]" value="4" {{ in_array('4', old('seasons', [])) ? 'checked' : '' }}>
                    冬</label>
                </div>
                @error('seasons')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="product-description">
                <label>商品説明
                    <span class="required">必須</span>
                </label>
                <textarea name="description" rows="8" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="product-detail__buttons">
            <div class="button-group">
                <button type="button" class="back__button" onclick="location.href='/products'">戻る</button>
                <button type="submit" class="save__button">登録</button>
            </div>
        </div>
    </form>
</div>
<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) {
        return;
    }
    const reader = new FileReader();
    reader.onload = function(event) {
    const preview = document.getElementById('preview');
    preview.src = event.target.result;
    preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
    document.getElementById('file-name').textContent = file.name;
});
</script>
@endsection