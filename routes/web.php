<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth.login');
});

// Login form for testing (GET)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Simple POST handler for testing only — validates and returns a status message
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    return redirect()->back()->with('status', 'Login successful.');
});

// Register form for testing (GET)
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Simple POST handler for testing registration only
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);
    return redirect()->route('login')->with('status', 'Registration simulated (test). Please sign in.');
});
