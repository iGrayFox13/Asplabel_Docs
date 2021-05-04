<?php

use App\Http\Middleware\AdminMiddleware;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/upload', [App\Http\Controllers\FileController::class, 'store'])->name('user.file.store');
Route::get('/Me-files', [App\Http\Controllers\FileController::class, 'index'])->name('user.files.index');
Route::delete('/delete-files/{files}', [App\Http\Controllers\FileController::class, 'destroy'])->name('user.files.destroy');

Auth::routes();



