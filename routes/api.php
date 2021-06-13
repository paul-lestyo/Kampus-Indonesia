<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\MajorController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);
Route::get('login/google', [GoogleController::class, 'redirectToProvider']);
Route::get('login/google/callback', [GoogleController::class, 'handleProviderCallback']);

Route::middleware('auth:sanctum')->group(function() {
	Route::post('logout', [AuthController::class, 'logout']);

	Route::apiResource('blog', BlogController::class)->except([
		'index', 'show'
	]);
	Route::apiResource('college', CollegeController::class)->except([
		'index', 'show'
	]);
	Route::post('college/{college}/major/', [CollegeController::class, 'storeMajor']);
	
	Route::patch('college/{college}/major/{major}', [CollegeController::class, 'updateMajor']);
	Route::delete('college/{college}/major/{major}', [CollegeController::class, 'destroyMajor']);
});

Route::get('blog', [BlogController::class, 'index']);
Route::get('blog/{blog}', [BlogController::class, 'show']);

Route::get('college', [CollegeController::class, 'index']);
Route::get('college/{college}', [CollegeController::class, 'show']);

Route::get('college/{college}/major/{major}', [CollegeController::class, 'showMajor']);
