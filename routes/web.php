<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PengumumanPernikahanController;

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
            'profil_caleg' => 'hallo capil manado',
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

Route::controller(PengumumanPernikahanController::class)->middleware('isCaleg')->group(function () {
    Route::get('/pengumumanpernikahan/dash', 'dashboard');
    Route::get('/pengumumanpernikahan/index', 'index');

    Route::get('/pengumumanpernikahan/create/{id_dpt}/{status}', 'create');
    Route::post('/pengumumanpernikahan', 'store');

    Route::get('/pengumumanpernikahan/pilih_print', 'pilih_print');

    Route::get('/pengumumanpernikahan/form_destroy/{id_dpt}', 'form_destroy');
    Route::delete('/pengumumanpernikahan/{id}', 'destroy');
});
