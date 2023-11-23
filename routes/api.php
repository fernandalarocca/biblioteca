<?php

use Illuminate\Support\Facades\Route;

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
//    Route::get('authors', [\App\Http\Controllers\AuthorController::class, 'list'])->name("authors");
//    Route::get('authors/{author}', [\App\Http\Controllers\AuthorController::class, 'show.blade.php'])->name("authors");
//    Route::post('authors', [\App\Http\Controllers\AuthorController::class, 'create'])->name("authors");
//    Route::put('authors/{author}', [\App\Http\Controllers\AuthorController::class, 'update'])->name("authors");
//    Route::delete('authors/{author}', [\App\Http\Controllers\AuthorController::class, 'delete'])->name("authors");

//    Route::get('books', [\App\Http\Controllers\BookController::class, 'list'])->name("books");
//    Route::get('books/{book}', [\App\Http\Controllers\BookController::class, 'show.blade.php'])->name("books");
//    Route::post('books', [\App\Http\Controllers\BookController::class, 'create'])->name("books");
//    Route::put('books/{book}', [\App\Http\Controllers\BookController::class, 'update'])->name("books");
//    Route::delete('books/{book}', [\App\Http\Controllers\BookController::class, 'delete'])->name("books");

//    Route::get('clients', [\App\Http\Controllers\ClientController::class, 'list'])->name("clients");
//    Route::get('clients/{user}', [\App\Http\Controllers\ClientController::class, 'show.blade.php'])->name("clients");
//    Route::post('clients', [\App\Http\Controllers\ClientController::class, 'create'])->name("clients");
//    Route::put('clients/{user}', [\App\Http\Controllers\ClientController::class, 'update'])->name("clients");
//    Route::delete('clients/{user}', [\App\Http\Controllers\ClientController::class, 'delete'])->name("clients");

//    Route::get('loans', [\App\Http\Controllers\LoanController::class, 'list'])->name("loans");
//    Route::get('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'show.blade.php'])->name("loans");
//    Route::post('loans', [\App\Http\Controllers\LoanController::class, 'create'])->name("loans");
//    Route::put('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'update'])->name("loans");
//    Route::delete('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'delete'])->name("loans");
});

Route::middleware(['auth:sanctum', 'role:client'])->prefix('client')->group(function () {
    Route::get('books', [\App\Http\Controllers\BookController::class, 'list'])->name("books");
    Route::get('books/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name("books");

    Route::get('loans', [\App\Http\Controllers\LoanController::class, 'list'])->name("loans");
    Route::get('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'show'])->name("loans");
    Route::post('loans', [\App\Http\Controllers\LoanController::class, 'create'])->name("loans");
    Route::put('loans/{loan}', [\App\Http\Controllers\LoanController::class, 'update'])->name("loans");

    Route::put('profile/{user}', [\App\Http\Controllers\ProfileController::class, 'update']);
});
