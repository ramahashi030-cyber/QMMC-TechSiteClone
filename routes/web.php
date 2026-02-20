<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
>>>>>>> c298eb7863d579bb6db201505b744d894e391721

Route::get('/', function () {
    return view('auth.login');
});

// LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

<<<<<<< HEAD
// REGISTER
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
=======
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
>>>>>>> c298eb7863d579bb6db201505b744d894e391721

// DASHBOARD (PROTECTED)
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('auth')->name('dashboard');

<<<<<<< HEAD

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
=======
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
>>>>>>> c298eb7863d579bb6db201505b744d894e391721
