<?php

use App\Http\Controllers\Api\AuthTokensLoginController;
use App\Http\Controllers\Api\ChildController;
use App\Http\Controllers\Api\LoginController;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

Route::get('/childrens',[ChildController::class,'show']);

Route::post('/login',[AuthTokensLoginController::class,'login']);

Route::post('/logout', [AuthTokensLoginController::class,'logout']);

Route::get('/user',[AuthTokensLoginController::class,'getUser']);

Route::post('/change-password', [AuthTokensLoginController::class, 'changePassword']);

});