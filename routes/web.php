<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\DownloadFileController;
use App\Models\AkteLahir;
use App\Models\AkteMati;

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

        if (auth()->user()->level == 1) {
            $akte_lahir = AkteLahir::where('user_id', auth()->user()->id);
        } else {
            $akte_lahir = AkteLahir::all();
        }


        $total_berkas = $akte_lahir->count();
        $total_berkas_capil = $akte_lahir->where('status_akte', 3)->count();
        $total_berkas_bpjs = $akte_lahir->where('status_bpjs', 1)->count();
        $total_berkas_dinsos = $akte_lahir->where('status_dinsos', 1)->count();

        // dd($total_berkas_capil);

        return view('welcome', [
            'title' => 'Welcome',
            'total_berkas' => $total_berkas,
            'total_capil' => $total_berkas_capil,
            'total_bpjs' => $total_berkas_bpjs,
            'total_dinsos' => $total_berkas_dinsos,
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

Route::controller(KelahiranController::class)->middleware('auth')->group(function () {
    Route::get('/kelahiran/dash', 'dashboard');
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
