<?php

use App\Http\Controllers\ApiProxyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('proxy')->controller(ApiProxyController::class)->group(function () {
    Route::get('getNumber', 'getNumber');
    Route::get('getSms', 'getSms');
    Route::get('cancelNumber', 'cancelNumber');
    Route::get('getStatus', 'getStatus');
});
