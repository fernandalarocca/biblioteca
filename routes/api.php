<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('authors',[\App\Http\Controllers\AuthorController::class,'list']);
Route::get('authors/{author}',[\App\Http\Controllers\AuthorController::class, 'show']);
Route::post('authors',[\App\Http\Controllers\AuthorController::class,'create']);
Route::put('authors/{author}',[\App\Http\Controllers\AuthorController::class,'update']);
Route::delete('authors/{author}',[\App\Http\Controllers\AuthorController::class,'delete']);

Route::get('books',[\App\Http\Controllers\BookController::class,'list']);
Route::get('books/{book}',[\App\Http\Controllers\BookController::class, 'show']);
Route::post('books',[\App\Http\Controllers\BookController::class,'create']);
Route::put('books/{book}',[\App\Http\Controllers\BookController::class,'update']);
Route::delete('books/{book}',[\App\Http\Controllers\BookController::class,'delete']);

Route::get('clients',[\App\Http\Controllers\ClientController::class,'list']);
Route::get('clients/{user}',[\App\Http\Controllers\ClientController::class, 'show']);
Route::post('clients',[\App\Http\Controllers\ClientController::class,'create']);
Route::put('clients/{user}',[\App\Http\Controllers\ClientController::class,'update']);
Route::delete('clients/{user}',[\App\Http\Controllers\ClientController::class,'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
