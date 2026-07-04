<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {  
    return view('front.index');  
});

// Easter Egg Route
Route::get('/kodein', function () {
    return view('front.kodein');
});

use Illuminate\Support\Str;
use Illuminate\Http\Request;

Route::get('/dashboard/portal-admin-jabarberdampak', function () {  
    // Generate a random 40-character token (looks encrypted)
    $token = Str::random(40);
    // Store in session
    session(['secure_login_token' => $token]);
    // Redirect to the randomized URL
    return redirect('/auth-guard/' . $token);
})->name('login')->middleware('guest');

Route::get('/auth-guard/{token}', function ($token) {
    // If the token doesn't match the one in session, block access
    if (session('secure_login_token') !== $token) {
        abort(404);
    }
    return view('auth.login', ['token' => $token]);  
})->name('login.view')->middleware('guest');

Route::post('/auth-guard/{token}', function (Request $request, $token) {
    if (session('secure_login_token') !== $token) {
        abort(404);
    }
    return app(LoginController::class)->handleLogin($request);
})->name('login.post')->middleware('guest');

Route::get('/program-kegiatan', [FrontController::class, 'program']);
Route::get('/berita-artikel', [FrontController::class, 'artikel']);
Route::get('/detail-proker/{slug}', [FrontController::class, 'detailProker']);
Route::get('/detail-artikel/{slug}', [FrontController::class, 'detailArtikel']);
Route::get('/detail-kegiatan/{slug}', [FrontController::class, 'detailKegiatan']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->as('users.')->controller(UserController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('kegiatan')->as('kegiatan.')->controller(KegiatanController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('artikel')->as('artikel.')->controller(ArtikelController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::get('/{id}/preview', 'preview')->name('preview');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('proker')->as('proker.')->controller(ProkerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('users')->as('users.')->controller(UserController::class)->group(function() {
        Route::post('/ganti-password', 'gantiPassword')->name('ganti-password');
        Route::post('/reset-password', 'resetPassword')->name('reset-password');
    });
});
