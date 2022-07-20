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

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'post'], function (){
    Route::get('/', \IndexController::class)->name('post.index');
    Route::get('/create', \CreateController::class, 'create')->name('post.create');
    Route::get('/{post}', \ShowController::class, 'show')->name('post.show');
    Route::get('/{post}/edit', \EditController::class, 'edit')->name('post.edit');
    Route::patch('/{post}', \UpdateController::class, 'update')->name('post.update');
    Route::delete('/{post}', \DeleteController::class, 'delete')->name('post.delete');
    Route::post('/', \StoreController::class, 'store')->name('post.store');
});

// Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
// Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
// Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
// Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
// Route::patch('/post/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
// Route::delete('/post/{post}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
// Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

Route::get('/main', [App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
