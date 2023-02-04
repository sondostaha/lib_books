<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Middleware\IsLogin;
use App\Http\Controllers\NotesController;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});
// if is login
Route::middleware('isLogin')->group(function(){
    //create book
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    //edit 
    Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');

    Route::post('/books/update/{id}', [BookController::class, 'update'])->name('books.update');
    //delete
    Route::get('/books/delete/{id}', [BookController::class, 'delete'])->name('books.delete');
    //create categories
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    //edit 
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    //logout
    Route::get('/logout', [AuthController::class, 'logout'])->name(('auth.logout'));

});

//books
//read books
Route::get('/books', [BookController::class,'index'])->name('books.index');

Route::get('/books/show/{id}', [BookController::class, 'show'])->name('books.show');

//category
//read data
Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');

Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');


//if is just a gest
Route::middleware('isGest')->group(function ()
 {
    //autho 
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::Post('/handl-register', [AuthController::class, 'handleRegister'])->name('auth.handleRegister');
    //login
    Route::get('/login', [AuthController::class, 'login'])->name(('auth.login'));
    Route::Post('/handl-login', [AuthController::class, 'handleLogin'])->name('auth.handleLogin');
 });
// if is admin
Route::middleware('isLoginAdmin')->group(function () {
    //delete
    Route::get('/books/delete/{id}', [BookController::class, 'delete'])->name('books.delete');
    //delete
    Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

});

//create notes
Route::get('/notes/create', [NotesController::class, 'create'])->name('notes.create');

Route::post('/notes/store', [NotesController::class, 'store'])->name('notes.store');


// Route::get('/auth/github', [AuthController::class , 'githubRedirect'])->name('auth.github.redirect');
 
// Route::get('/auth/github/callback', [AuthController::class , 'githubCallback' ])->name('auth.github.callback');

Route::get('/login/github',[AuthController::class, 'githubRedirect'])->name('auth.github.redirect');

Route::get('/login/github/callback', [AuthController::class, 'githubCallback'])->name('auth.github.callback');