<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('loginPost');

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('authors', [\App\Http\Controllers\AuthorController::class, 'list'])->name("authors.list");
    Route::get('authors-show/{author}', [\App\Http\Controllers\AuthorController::class, 'show'])->name("authors.show");
    Route::post('authors-store', [\App\Http\Controllers\AuthorController::class, 'store'])->name("authors.store");
    Route::get('authors-create', [\App\Http\Controllers\AuthorController::class, 'create'])->name("authors.create");
    Route::post('authors-update/{author}', [\App\Http\Controllers\AuthorController::class, 'update'])->name("authors.update");
    Route::get('authors/edit/{author}', [\App\Http\Controllers\AuthorController::class, 'edit'])->name("authors.edit");
    Route::post('authors/delete/{author}', [\App\Http\Controllers\AuthorController::class, 'delete'])->name("authors.delete");

    Route::get('books', [\App\Http\Controllers\BookController::class, 'list'])->name("books.list");
    Route::get('books-show/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name("books.show");
    Route::post('books-store', [\App\Http\Controllers\BookController::class, 'store'])->name("books.store");
    Route::get('books-create', [\App\Http\Controllers\BookController::class, 'create'])->name("books.create");
    Route::post('books-update/{book}', [\App\Http\Controllers\BookController::class, 'update'])->name("books.update");
    Route::get('books/edit/{book}', [\App\Http\Controllers\BookController::class, 'edit'])->name("books.edit");
    Route::post('books/delete/{book}', [\App\Http\Controllers\BookController::class, 'delete'])->name("books.delete");

    Route::get('clients', [\App\Http\Controllers\ClientController::class, 'list'])->name("clients.list");
    Route::get('clients-show/{user}', [\App\Http\Controllers\ClientController::class, 'show'])->name("clients.show");
    Route::post('clients-store', [\App\Http\Controllers\ClientController::class, 'store'])->name("clients.store");
    Route::get('clients-create', [\App\Http\Controllers\ClientController::class, 'create'])->name("clients.create");
    Route::post('clients-update/{user}', [\App\Http\Controllers\ClientController::class, 'update'])->name("clients.update");
    Route::get('clients/edit/{user}', [\App\Http\Controllers\ClientController::class, 'edit'])->name("clients.edit");
    Route::post('clients/delete/{user}', [\App\Http\Controllers\ClientController::class, 'delete'])->name("clients.delete");

    Route::get('loans', [\App\Http\Controllers\LoanController::class, 'list'])->name("loans.list");
    Route::get('loans-show/{loan}', [\App\Http\Controllers\LoanController::class, 'show'])->name("loans.show");
    Route::post('loans-store', [\App\Http\Controllers\LoanController::class, 'store'])->name("loans.store");
    Route::get('loans-create', [\App\Http\Controllers\LoanController::class, 'create'])->name("loans.create");
    Route::post('loans-update/{loan}', [\App\Http\Controllers\LoanController::class, 'update'])->name("loans.update");
    Route::get('loans/edit/{loan}', [\App\Http\Controllers\LoanController::class, 'edit'])->name("loans.edit");
    Route::post('loans/delete/{loan}', [\App\Http\Controllers\LoanController::class, 'delete'])->name("loans.delete");
});
