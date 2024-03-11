<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [JobApplicationController::class, 'showForm'])->name('application.show-form');
    Route::get('/job-application', [JobApplicationController::class, 'showForm'])->name('application.show-form');
    Route::post('/job-application', [JobApplicationController::class, 'submitForm'])->name('application.submit-form');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    // User-only routes here
    Route::get('/test', [TestController::class, 'showTest'])->name('test.show');
    Route::get('/test-screen', [TestController::class, 'screenTest'])->name('test.screen');
    Route::post('/test', [TestController::class, 'submitTest'])->name('test.submit');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Admin-only routes here
    Route::get('/users', [UserController::class, 'index'])->name('users.list');
});

