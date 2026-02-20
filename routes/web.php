<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    // Check credentials against the `accounts` table (seeded by UserAccountSeeder)
    $account = DB::table('accounts')->where('email', $request->input('email'))->first();

    if ($account && Hash::check($request->input('password'), $account->password)) {
        // set a simple session flag for this test flow
        session(["account_id" => $account->id, "account_email" => $account->email, "authenticated" => true]);
        return redirect()->route('clientreports');
    }

    return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
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

// Client reports view (simple test route)
Route::get('/clientreports', function () {
    if (!session('authenticated')) {
        return redirect()->route('login');
    }
    return view('pages.clientreports');
})->name('clientreports');

// Simple logout for the test flow
Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');
