@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Đăng nhập</h3>
    <form method="POST" action="{{ url('login') }}">
      <br>
      @csrf
       @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      <div class="mb-3"><label>Email</label><input name="email" class="form-control" value="{{ old('email') }}" placeholder="Nhập email" required></div>
       @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      <div class="mb-3"><label>Password</label><input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu" required></div>
      <!-- <div class="mb-3"><label><input type="checkbox" name="remember"> Remember me</label></div> -->
      <br>
      <button class="btn btn-primary">Đăng nhập</button>
    </form>
  </div>
</div>
@endsection
