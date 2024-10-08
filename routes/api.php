<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\HolidayController;
use App\Http\Controllers\PdfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('holiday', HolidayController::class)->middleware('auth:sanctum');
Route::get('/generate-pdf', [PdfController::class, 'generatePDF'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
