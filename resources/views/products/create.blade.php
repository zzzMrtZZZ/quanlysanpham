@extends('layouts.app')
@section('title','Tạo sản phẩm')
@section('content')



<h3>Tạo sản phẩm</h3>
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="mb-3"><label>Name</label><input name="name" class="custom-input" required></div>
  <div class="mb-3"><label>Description</label><textarea name="description" class="custom-input"></textarea></div>
  <div class="mb-3"><label>Price</label><input name="price" class="custom-input" required></div>
  <div class="mb-3"><label>Images (multiple)</label><input type="file" name="images[]" multiple class="custom-input" required></div>
  <div class="mb-3"><label><input type="checkbox" name="is_valid" checked> is_valid</label></div>
  <button class="button ">Lưu</button>
  <hr>
</form>
@endsection