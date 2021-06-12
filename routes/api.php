<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewPasswordController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);
Route::get('login/google', [GoogleController::class, 'redirectToProvider']);
Route::get('login/google/callback', [GoogleController::class, 'handleProviderCallback']);

Route::middleware('auth:sanctum')->group(function() {
	Route::post('logout', [AuthController::class, 'logout']);

	Route::resource('blog', BlogController::class)->except([
		'create', 'edit'
	]);
});

