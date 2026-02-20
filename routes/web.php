<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// ROOT - redirect to login
Route::get('/', function () {
    return view('auth.login');
});

// LOGIN
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

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
        return redirect()->route('dashboard');
    }

    return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
});

// REGISTER
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);
    return redirect()->route('login')->with('status', 'Registration successful. Please sign in.');
});

// DASHBOARD (PROTECTED WITH SESSION CHECK)
Route::get('/dashboard', function () {
    if (!session('authenticated')) {
        return redirect()->route('login');
    }
    return view('pages.dashboard');
})->name('dashboard');

// CLIENT REPORTS (PROTECTED WITH SESSION CHECK)
Route::get('/clientreports', function () {
    if (!session('authenticated')) {
        return redirect()->route('login');
    }
    return view('pages.clientreports');
})->name('clientreports');

// LOGOUT
Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');

