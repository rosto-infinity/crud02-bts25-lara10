<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/create', [ProductController::class, 'create'])->name('create');
Route::post('/create', [ProductController::class, 'save']);
Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('/edit/{id}', [ProductController::class, 'update']);
