<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfileController;
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
    return view('index');
});




    Route::get('/', [MusicController::class, 'index'])->name('music.index');
    Route::post('/upload', [MusicController::class, 'upload']);
    Route::get('/{$filename}', [MusicController::class, 'play']);
    


require __DIR__.'/auth.php';
