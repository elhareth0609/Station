<?php

use App\Http\Controllers\Api\AuthenticationApiController;
use App\Http\Middleware\BearerTokenMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('v1/status', function () {
    return response()->json(['status' => 'API is working']);
});

Route::post('v1/login', [AuthenticationApiController::class, 'authenticate'])->name('api.login');
// Route::get('v1/version', [AuthenticationApiController::class, 'version'])->name('api.version');


Route::group(['middleware' => BearerTokenMiddleware::class], function () {
    Route::get('v1/logout', [AuthenticationApiController::class, 'logout'])->name('api.logout');
    Route::get('v1/destroy', [AuthenticationApiController::class, 'destroy'])->name('api.destroy');
    Route::get('v1/info', [AuthenticationApiController::class, 'info'])->name('api.info');
    Route::post('v1/update', [AuthenticationApiController::class, 'update'])->name('api.update');
});
