<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// izsauc HomeController index()
Route::get('/', [HomeController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'list']);

// rāda formu
Route::get('/authors/create', [AuthorController::class, 'create']);
// apstrādā formas datus
Route::post('/authors/put', [AuthorController::class, 'put']);

// {author} ir autora id kam tiks veiktas izmaiņas
Route::get('/authors/update/{author}', [AuthorController::class, 'update']);
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);

Route::post('/authors/delete/{author}', [AuthorController::class, 'delete']);

// tas pats ar books
Route::get('/books', [BookController::class, 'list']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books/put', [BookController::class, 'put']);

Route::get('/books/update/{book}', [BookController::class, 'update']);
Route::post('/books/patch/{book}', [BookController::class, 'patch']);

Route::post('/books/delete/{book}', [BookController::class, 'delete']);