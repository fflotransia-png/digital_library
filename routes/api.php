<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

// Login admin: tidak membutuhkan token
Route::post('/login', [AuthController::class, 'login']);

// Endpoint yang membutuhkan token Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Informasi admin yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Logout admin
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD perpustakaan
    Route::apiResource('members', MemberController::class);
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('publishers', PublisherController::class);
    Route::apiResource('books', BookController::class);
    Route::apiResource('loans', LoanController::class);

});
