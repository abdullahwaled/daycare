<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FilesController;

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
Route::prefix('dad')->name('dad.')->group(function(){
    Route::middleware('isDad')->group(function(){
        Route::view('dashboard','backend.dad.dashboard')->name('dashboard');


Route::post('/comments', [CommentsController::class, 'store'])->name('comments.create');

//back

Route::get('/all_comments', [CommentsController::class, 'index'])->name('comments.all_comments');
Route::get('/dashboard/all_comments/edit/{id}', [CommentsController::class, 'edit'])->name('dashboard.comments.edit');
Route::post('/dashboard/all_comments/update/{id}', [CommentsController::class, 'update'])->name('dashboard.comments.update');
Route::get('/dashboard/all_comments/destroy/{id}', [CommentsController::class, 'destroy'])->name('dashboard.comments.destroy');
     Route::get('/files', [FilesController::class, 'index'])->name('files.index');
Route::get('/file/{filename}',[FilesController::class, 'show'])->name('file.show');

 });
             require __DIR__.'/dad_auth.php';


});





