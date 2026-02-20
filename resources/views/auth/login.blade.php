@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="login-wrapper">
  <form method="POST" action="{{ route('login') }}" class="login-form">
    @csrf

    <h2 class="login-title">Sign in</h2>

    @if(session('status'))
      <div class="status">{{ session('status') }}</div>
    @endif

    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
      @error('email')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required>
      @error('password')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-actions">
      <label class="remember">
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
      </label>
      <button type="submit" class="btn">Login</button>
    </div>

    <div class="links">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Forgot your password?</a>
      @endif
      @if (Route::has('register'))
        <a href="{{ route('register') }}">Create account</a>
      @endif
    </div>
  </form>
</div>
@endsection

