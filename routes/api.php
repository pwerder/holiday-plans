<?php

use App\Http\Controllers\Api\V1\HolidayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('holiday', HolidayController::class);
