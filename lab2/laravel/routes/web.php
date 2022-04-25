<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/',[PostController::class,'index']);
Route::get('/posts',[PostController::class,'index'])->name('index');
Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
Route::post('/posts',[PostController::class,'store'])->name('post.store');
Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/posts/edit/{post}',[PostController::class,'edit'])->name('post.edit');
Route::put('/posts/{post}',[PostController::class,'update'])->name('post.update');
Route::put('/posts/{post}/restore', [PostController::class, 'restore'])->name('post.restore');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('post.delete');
