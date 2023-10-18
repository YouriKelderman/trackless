<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/album', [App\Http\Controllers\AlbumController::class, 'index'])->name('album');
Route::get('/album/{album}', [App\Http\Controllers\AlbumController::class, 'show']);
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('album');

Route::get('/create', [App\Http\Controllers\CreateController::class, 'index'])->name('create');
Route::post('storeAlbum', [App\Http\Controllers\CreateController::class, 'store'])->name('item.store');
Route::post('storeRating', [App\Http\Controllers\RatingController::class, 'store'])->name('review.store');
