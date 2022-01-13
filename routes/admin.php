<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;


    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/list', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('destroy');
    });