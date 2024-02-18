<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

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
Route::middleware('auth:web')->group(function () {
    Route::get('/blog/list', [BlogController::class, 'index'])->name('blog.list');
    Route::get('/blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');


    Route::get('/job/list', [JopController::class, 'index'])->name('job.list');
    Route::get('/job', [JopController::class, 'create'])->name('job.create');
    Route::get('/job/edit/{id}', [JopController::class, 'edit'])->name('job.edit');
    Route::post('/job/store', [JopController::class, 'store'])->name('job.store');
    Route::post('/job/update/{id}', [JopController::class, 'update'])->name('job.update');
    Route::post('/job/delete/{id}', [JopController::class, 'delete'])->name('job.delete');






    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Group for guests
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/', [AuthController::class, 'view'])->name('home');
});
