<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('authors', [\App\Http\Controllers\AuthorController::class, 'list']);
    Route::get('authors/{author}', [\App\Http\Controllers\AuthorController::class, 'show']);
    Route::post('authors', [\App\Http\Controllers\AuthorController::class, 'create']);
    Route::put('authors/{author}', [\App\Http\Controllers\AuthorController::class, 'update']);
    Route::delete('authors/{author}', [\App\Http\Controllers\AuthorController::class, 'delete']);

    Route::get('books', [\App\Http\Controllers\BookController::class, 'list']);
    Route::get('books/{book}', [\App\Http\Controllers\BookController::class, 'show']);
    Route::post('books', [\App\Http\Controllers\BookController::class, 'create']);
    Route::put('books/{book}', [\App\Http\Controllers\BookController::class, 'update']);
    Route::delete('books/{book}', [\App\Http\Controllers\BookController::class, 'delete']);

    Route::get('clients', [\App\Http\Controllers\ClientController::class, 'list']);
    Route::get('clients/{user}', [\App\Http\Controllers\ClientController::class, 'show']);
    Route::post('clients', [\App\Http\Controllers\ClientController::class, 'create']);
    Route::put('clients/{user}', [\App\Http\Controllers\ClientController::class, 'update']);
    Route::delete('clients/{user}', [\App\Http\Controllers\ClientController::class, 'delete']);

    Route::get('loans', [\App\Http\Controllers\LoanController::class, 'list']);
    Route::get('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'show']);
    Route::post('loans', [\App\Http\Controllers\LoanController::class, 'create']);
    Route::put('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'update']);
    Route::delete('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'delete']);
});

Route::middleware(['auth:sanctum', 'role:client'])->prefix('client')->group(function () {
    Route::get('books', [\App\Http\Controllers\BookController::class, 'list']);
    Route::get('books/{book}', [\App\Http\Controllers\BookController::class, 'show']);

    Route::get('loans', [\App\Http\Controllers\LoanController::class, 'list']);
    Route::get('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'show']);
    Route::post('loans', [\App\Http\Controllers\LoanController::class, 'create']);
    Route::put('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'update']);

    Route::put('profile/{user}', [\App\Http\Controllers\ProfileController::class, 'update']);
});
