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


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('search', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
Route::get('/album', [App\Http\Controllers\AlbumController::class, 'index'])->name('album');
Route::get('/album/{album}', [App\Http\Controllers\AlbumController::class, 'show']);
Route::get('/album/{album}/{editing?}', [App\Http\Controllers\AlbumController::class, 'show']);
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/create', [App\Http\Controllers\CreateController::class, 'index'])->name('create');


Route::post('storeAlbum', [App\Http\Controllers\CreateController::class, 'store'])->name('item.store');
Route::post('editAlbum', [App\Http\Controllers\CreateController::class, 'edit'])->name('item.edit');
Route::post('deleteAlbum', [App\Http\Controllers\CreateController::class, 'delete'])->name('item.delete');


Route::post('storeRating', [App\Http\Controllers\RatingController::class, 'store'])->name('review.store');
Route::post('changeRatingStatus', [App\Http\Controllers\ProfileController::class, 'edit'])->name('status.edit');

Route::post('deleteUser', [App\Http\Controllers\CreateController::class, 'deleteUser'])->name('user.delete');
