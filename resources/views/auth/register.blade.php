@extends('layouts.app')
@section('title','Đăng ký')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Đăng ký</h3>
    <form method="POST" action="{{ url('register') }}">
      @csrf
       @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      <div class="mb-3"><label>Name</label><input name="name" class="form-control" value="{{ old('name') }}"  required> </div>
       @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      <div class="mb-3"><label>Email</label><input name="email" class="form-control" value="{{ old('email') }}" required></div>
       @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      <div class="mb-3"><label>Phone</label><input name="phone" class="form-control" value="{{ old('phone') }}" required></div>
       @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      <div class="mb-3"><label>Password</label><input name="password" type="password" class="form-control" required></div>
       @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      <div class="mb-3"><label>Confirm</label><input name="password_confirmation" type="password" class="form-control" required></div>
      <button class="btn btn-success">Đăng ký</button>
    </form>
  </div>
</div>
@endsection
