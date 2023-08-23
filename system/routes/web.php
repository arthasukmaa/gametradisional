<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Permainancontroller;
use App\Http\Controllers\Admin\Kuiscontroller;
use App\Http\Controllers\Admin\Playercontroller;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DaerahController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/aksilogin', 'aksilogin');
    Route::get('/logout', 'logout');
});

// ini route
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
    });

    Route::controller(DaerahController::class)->group(function () {
        Route::get('/daerah', 'index');
        Route::post('/daerah/tambahAct', 'tambahAct');
        Route::post('/daerah/editAct/{daerah}', 'editAct');
        Route::post('/daerah/hapus/{daerah}', 'hapus');
    });

    Route::controller(Permainancontroller::class)->group(function () {
        Route::get('/permainan', 'index');
        Route::get('/permainan/tambah', 'tambah');
        Route::post('/permainan/tambahAct', 'tambahAct');
        Route::get('/permainan/detail/{id}', 'detail');
        Route::get('/permainan/edit/{id}', 'edit');
        Route::post('/permainan/editAct/{id}', 'editAct');
        Route::post('/permainan/hapus/{id}', 'hapus');
        Route::post('/permainan/tambahGambar/{id}', 'tambahGambar');
        Route::post('/permainan/updateGambar/{id}', 'updateGambar');
        Route::post('/permainan/hapusGambar/{id}', 'hapusGambar');
    });

    Route::controller(Kuiscontroller::class)->group(function () {
        Route::get('/kuis', 'index');
        Route::get('/kuis/tambah', 'tambah');
        Route::post('/kuis/tambahAct', 'tambahAct');
        Route::get('/kuis/detail/{kuis}', 'detail');
        Route::get('/kuis/edit/{kuis}', 'edit');
        Route::post('/kuis/editAct/{kuis}', 'editAct');
        Route::post('/kuis/hapus/{kuis}', 'hapus');
    });
    Route::controller(Playercontroller::class)->group(function () {
        Route::get('/player', 'index');
        Route::post('/player/tambahAct', 'tambahAct');
        Route::post('/player/editAct/{player}', 'editAct');
        Route::post('/player/hapus/{player}', 'hapus');
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index');
        Route::post('/profile/edit/{admin}', 'edit');
    });

});
