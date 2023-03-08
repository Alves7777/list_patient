<?php

use App\Http\Controllers\Api\Patients\PatientsController;
use App\Http\Controllers\Api\ZipCode\SearchZipController;
use App\Http\Controllers\Auth\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth', [AuthApiController::class, 'login']);
Route::get('me', [AuthApiController::class, 'getAuthenticatedUser']);
Route::post('auth-refresh', [AuthApiController::class, 'refreshToken']);

Route::group(['prefix' => 'patients/', 'middleware' => 'auth:api'], function () {
    Route::get('list', [PatientsController::class, 'index']);
    Route::post('add', [PatientsController::class, 'store']);
    Route::put('edit/{id}', [PatientsController::class, 'update']);
    Route::delete('delete/{id}', [PatientsController::class, 'destroy']);

});

Route::get('zipcode', [SearchZipController::class, 'getApiZipCode']);
