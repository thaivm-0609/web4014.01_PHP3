<?php

use App\Http\Controllers\Api\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/products', [ApiProductController::class, 'index']);
Route::get('/products/{product}', [ApiProductController::class, 'show']);
