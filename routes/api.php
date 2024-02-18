<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobOfferedController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/blogs', [ApiController::class, 'getBlogs']);
Route::get('/blogs/{id}', [ApiController::class, 'getBlog']);


Route::get('/jobs', [ApiController::class, 'getJobs']);
Route::get('/jobs/{id}', [ApiController::class, 'getJob']);


Route::post('/contact/insert', [ContactController::class, 'insertContact']);
Route::post('/jobs/insert', [JobOfferedController::class, 'insertJob']);
