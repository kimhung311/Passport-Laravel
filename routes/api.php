<?php

use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::group(['prefix' => 'auth'], function () {
//     Route::post('/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
//     Route::group(['middleware' => 'auth:api'], function () {
//         Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//         Route::get('/me', [AuthController::class, 'me'])->name('me');
//     });
// });

Route::group(['prefix' => 'v1',  'as' => 'v1.'], function () {
    // Route::resource('user', UserController::class)->only(['index', 'show', 'store', 'update', 'delete']);
    Route::resource('user', UserController::class)->except(['create', 'edit']);  // Route::resource là tất cả các phương thức Controller Api
    // dùng only để chạy các phương thức khai báo trong hàm hoặc dung except trừ ra những phương thức không chạy
});