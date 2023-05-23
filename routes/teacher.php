<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\PhotoController;

/*
|--------------------------------------------------------------------------
| teacher Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('teacher')->name('teacher.')->group(function(){
    Route::middleware('isTeacher')->group(function(){
        Route::view('dashboard','backend.teacher.dashboard')->name('dashboard');
        Route::get('/files', [FilesController::class, 'index'])->name('files.index');
Route::get('/files/add', [FilesController::class, 'create'])->name('files.create');
Route::post('/files/add', [FilesController::class, 'store'])->name('files.store');
Route::get('/file/{filename}',[FilesController::class, 'show'])->name('file.show');
Route::resource('galleries', PhotoController::class)->except(['show']);


 });
             require __DIR__.'/teacher_auth.php';


});





