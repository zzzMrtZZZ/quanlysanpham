@extends('layouts.app')
@section('title','Danh sách sản phẩm')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h3>Sản phẩm</h3>

  
  @auth 
    <a href="{{ route('products.create') }}" class="btn btn-success">Tạo mới</a> 
  @endauth
</div>

<form id="searchForm" method="GET" action="{{ route('products.index') }}" class="mb-3">
  <div>
    <input type="text" name="keyword"  
           placeholder="🔎Tìm kiếm sản phẩm" 
           value="{{ request('keyword') }}" id="keywordInput">
        <!-- <button class="btn btn-primary">Tìm</button> -->
  </div>
</form>

<script>
  const input = document.getElementById('keywordInput');
  const form = document.getElementById('searchForm');
  input.addEventListener('input', function() {
      form.submit(); 
  });
</script>

<div class="row">
  @forelse($products as $p)
  <div class="col-md-4 mb-3">
    <div class="card">
      @if($p->image)
          @php
              $images = json_decode($p->image, true) ?? [];
          @endphp

          @if(count($images))
              <img src="{{ asset('storage/'.$images[0]) }}" 
                  class="card-img-top" 
                  style="height:200px; width:100%; object-fit:cover;">
          @endif
      @endif


      <div class="card-body">
        <h5 class="card-title">
          {{ $p->name }} 
          @if(!$p->is_valid) 
            <span class="badge bg-danger">Invalid</span> 
          @endif
        </h5>
        <p class="card-text">{{ Str::limit($p->description, 80) }}</p>
        <p><strong>{{ number_format($p->price,0) }} đ</strong></p>
        
        <a href="{{ route('products.show',$p) }}" class="btn-link">Xem</a>
        @auth
          <a href="{{ route('products.edit',$p) }}" class="btn-link1">Sửa</a>
          <form method="POST" action="{{ route('products.destroy',$p) }}" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Xoá?')" class="btn-link2">Xoá</button>
          </form>
        @endauth
      </div>
    </div>
  </div>
  @empty
    <p>Không tìm thấy sản phẩm nào.</p>
  @endforelse
</div>

<div class="mt-3">{{ $products->withQueryString()->links() }}</div>
@endsection
