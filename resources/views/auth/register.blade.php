@extends('layouts.app')

@section('title','Register')

@section('content')
<div class="login-wrapper">
  <form method="POST" action="{{ route('register') }}" class="login-form">
    @csrf
    <h2 class="login-title">Create account</h2>

    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
      @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required>
      @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required>
      @error('password') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn">Register</button>
    </div>

    <div class="links">
      <a href="{{ route('login') }}">Already have an account? Sign in</a>
    </div>
  </form>
</div>
@endsection
