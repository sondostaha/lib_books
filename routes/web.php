<?php

use App\Http\Controllers\BookController;
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
Route::get('/books', [BookController::class,'index'])->name('books.index');

Route::get('/books/show/{id}', [BookController::class, 'show'])->name('books.show');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');

Route::post('/books/update/{id}', [BookController::class, 'update'])->name('books.update');

Route::get('/books/delete/{id}', [BookController::class, 'delete'])->name('books.delete');

