<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UssdController;
use App\Http\Controllers\SimStatusController;
use App\Http\Middleware\BearerTokenMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('v1/status', [NotificationController::class, 'test'])->name('test');



Route::post('v1/login', [AuthController::class, 'authenticate'])->name('api.login');
// Route::get('v1/version', [AuthController::class, 'version'])->name('api.version');

Route::post('/ussd/create', [UssdController::class, 'create']);
Route::post('/ussds/{id}/status', [UssdController::class, 'updateStatus']);

Route::get('/stations/{stationCode}/sims', [SimStatusController::class, 'getSimsForStation']);

// New Routes for Sim Status and Management
Route::post('/sims/status', [SimStatusController::class, 'bulkUpdate']);
Route::post('/sims/{sim}/change-ip', [SimStatusController::class, 'changeIp']);
Route::post('/sims/confirm-ip-change', [SimStatusController::class, 'confirmIpChange']);

Route::group(['middleware' => BearerTokenMiddleware::class], function () {
    Route::get('v1/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::get('v1/destroy', [AuthController::class, 'destroy'])->name('api.destroy');
    Route::get('v1/info', [AuthController::class, 'info'])->name('api.info');
    Route::post('v1/update', [AuthController::class, 'update'])->name('api.update');
});
