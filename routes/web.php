<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\PerkaraControoller;
use App\Http\Controllers\PutusanPnController;
use App\Models\PutusanPn;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');

Route::redirect('/home', '/welcome');

Route::get(
    '/welcome',
    function () {
        return view('welcome', [
            'title' => 'Welcome',
        ]);
    }

)->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::post('/login', 'auth');
    Route::post('/logout', 'logout');
});

Route::controller(ProfilController::class)->middleware('auth')->group(function () {
    Route::get('/profil/{user}', 'show');
    Route::get('/profil/{user}/edit', 'edit');
    Route::put('/profil/{user}', 'update');
});

Route::resource('/pengguna', PenggunaController::class)->middleware('auth')->except(['show'])->parameters([
    'user' => 'user',
]);

Route::controller(KelahiranController::class)->middleware(['IsPaarsel'])->group(function () {
    Route::get('/kelahiran/dash', 'dash');
    Route::get('/kelahiran', 'index');
    Route::get('/kelahiran/show_rs/{id}', 'show_rs');

    Route::get('/kelahiran/create/', 'create');
    Route::get('/kelahiran/{id}/edit', 'edit');

    Route::post('/kelahiran', 'store');
    Route::put('/kelahiran/{id}', 'update');

    // Route::delete('/kelahiran/{id}', 'destroy');

    Route::get('/get_kelurahandesa/kelahiran/{id}', 'getKelurahanDesa');
});

Route::controller(DownloadFileController::class)->middleware('auth')->group(function () {
    Route::get('/download_file/kelahiran', 'lahir');
    Route::get('/download_file/kematian', 'mati');
});

Route::controller(PerkaraControoller::class)->middleware(['IsPN'])->group(function () {
    Route::get('/perkara/dash', 'dash');
    Route::get('/perkara', 'index');
    Route::get('/perkara/show_rs/{id}', 'show');

    Route::get('/perkara/create/', 'create');
    Route::get('/perkara/{id}/edit', 'edit');

    Route::post('/perkara', 'store');
    Route::put('/perkara/{id}', 'update');
});

Route::controller(PutusanPnController::class)->middleware(['IsPN'])->group(function () {
    Route::get('/putusanpn/dash', 'dash');
    Route::get('/putusanpn', 'index');
    Route::get('/putusanpn/show_rs/{id}', 'show');

    Route::get('/putusanpn/create/', 'create');
    Route::get('/putusanpn/{id}/edit', 'edit');

    Route::post('/putusanpn', 'store');
    Route::put('/putusanpn/{id}', 'update');
});
