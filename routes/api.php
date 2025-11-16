<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('documents', DocumentController::class);

Route::get('documents', [DocumentController::class, 'index'])->middleware('cacheResponse:300');
Route::get('documents/{document}', [DocumentController::class, 'show']);

Route::post('documents', [DocumentController::class, 'store']);

Route::patch('documents/{document}', [DocumentController::class, 'update']);

Route::delete('documents/{document}', [DocumentController::class, 'destroy']);
