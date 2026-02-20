<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
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
    return redirect()->back()->with('status', 'Login simulated (test).');
});
