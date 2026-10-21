<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => '/v1'], function () {
    // Auth
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/cart', [CartController::class, 'index'])->middleware('auth:sanctum');
    Route::post('/cart/add', [CartController::class, 'add'])->middleware('auth:sanctum');
    Route::post('/cart/remove', [CartController::class, 'remove']);
});