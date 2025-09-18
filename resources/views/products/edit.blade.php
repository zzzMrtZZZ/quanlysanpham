@extends('layouts.app')
@section('title','Sửa sản phẩm')
@section('content')
<h3>Sửa sản phẩm</h3>
<form method="POST" action="{{ route('products.update',$product) }}" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="mb-3"><label>Name</label><input name="name" value="{{ $product->name }}" class="custom-input"></div>
  <div class="mb-3"><label>Description</label><textarea name="description" class="custom-input">{{ $product->description }}</textarea></div>
  <div class="mb-3"><label>Price</label><input name="price" value="{{ $product->price }}" class="custom-input"></div>

  <div class="mb-3">
    <label>Existing Images</label>
    <div class="d-flex gap-2 flex-wrap">
      @if($product->image)
        @php
          $images = is_array($product->image) ? $product->image : (json_decode($product->image, true) ?? []);
        @endphp
        @foreach($images as $img)
          <img src="{{ asset('storage/'.$img) }}" style="width:100px;height:80px;object-fit:cover">
        @endforeach
      @endif
    </div>
  </div>

  <div class="mb-3"><label>Upload thêm images (multiple)</label><input type="file" name="images[]" multiple class="custom-input"></div>

  <div class="mb-3"><label><input type="checkbox" name="is_valid" {{ $product->is_valid ? 'checked' : '' }}> is_valid</label></div>
  <button class="btn btn-primary">Cập nhật</button>
  <br>
  <hr>
</form>
@endsection
