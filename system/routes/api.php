<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Playerauthcontroller;
use App\Http\Controllers\Api\Playerhomecontroller;


Route::prefix('player')->group(function () {

    Route::controller(Playerauthcontroller::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/registrasi', 'registrasi');
        Route::get('/cekLogin/{player}', 'cekLogin');
    });

    Route::controller(Playerhomecontroller::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::get('/daerahPermainan/{daerah}', 'daerahPermainan');
        Route::get('/kuis/{player}', 'kuis');
        Route::post('/updateFoto/{player}', 'updateFoto');
        Route::post('/updatedataProfile/{player}', 'updatedataProfile');
        Route::post('/jawabanKuis', 'jawabanKuis');
        Route::get('/resetJawaban/{player}', 'resetJawaban');
    });
});


