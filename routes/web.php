<?php

use App\Http\Controllers\DropController;
use App\Http\Controllers\DropSubmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderboardController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', HomeController::class)->name('home');

    Route::get('/drop/{drop:slug}', DropController::class)->name('drop');

    Route::get('/leaderboard', LeaderboardController::class)->name('leaderboard');

    Route::post('/submit-drop',  DropSubmissionController::class)->name('submit-drop');

//    require __DIR__.'/auth.php';
});
