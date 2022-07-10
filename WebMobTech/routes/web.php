<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('blog/{id}', [BlogController::class, 'show'])->name('blog.show');
// Route::resource('blog', BlogController::class);
