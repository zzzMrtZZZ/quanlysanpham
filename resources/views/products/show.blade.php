@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết sản phẩm</h1>

    <div class="card" style="padding: 20px;">
        <p><strong>Tên:</strong> {{ $product->name }}</p>
        <p><strong>Mô tả:</strong> {{ $product->description }}</p>
        <p><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
        <p><strong>Trạng thái:</strong> {{ $product->is_valid ? 'Hoạt động' : 'Không hoạt động' }}</p>

        <p><strong>Hình ảnh:</strong></p>
        @php
            $images = json_decode($product->image, true);
        @endphp

        @if(!empty($images) && is_array($images))
            <div style="display:flex; flex-wrap:wrap;">
                @foreach($images as $img)
                    <div style="margin:10px;">
                        <a href="{{ url('storage/'.$img) }}" target="_blank">
                            <img src="{{ url('storage/'.$img) }}" 
                                 alt="Ảnh sản phẩm" 
                                 width="200" 
                                 style="border:1px solid #ddd; border-radius:5px;">
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Chưa có ảnh</p>
        @endif
    </div>

    <br>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
</div>
@endsection
