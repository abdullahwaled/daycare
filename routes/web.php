<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DadController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DaycareController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FilesController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/daycares', [DaycareController::class, 'store'])->name('daycare.store');




Route::get('/dashboard', [AuthenticatedSessionController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/create', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('create_teacher');

Route::prefix('auth')->name('auth.')->group(function(){
    Route::middleware('auth')->group(function(){
        ///////////////////////admin profile/////////////////////////////
        Route::view('dashboard','dashboard')->name('dashboard');
         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

///////////////////teacher route//////////////////////

    Route::post('storeTeacher', [AuthenticatedSessionController::class, 'storeTeacher'])->name('storeTeacher');
    Route::get('createTeacher', [AuthenticatedSessionController::class, 'createTeacher'])->name('createTeacher');
    Route::get('dashboard', [AuthenticatedSessionController::class, 'index'])->name('teachers.index');
    Route::get('/daycares/teacher/{daycare_id}', [AuthenticatedSessionController::class, 'indexTeacher'])->name('teachers.index1');
    Route::get('/teacher/{id}', [AuthenticatedSessionController::class, 'editteacher'])->name('teachers.edit');
    Route::put('/teachers/{id}', [AuthenticatedSessionController::class, 'updateTeacher'])->name('teachers.update');
    Route::get('/teachers/{id}', [AuthenticatedSessionController::class, 'show'])->name('teachers.show');
Route::delete('/teachers/{id}', [AuthenticatedSessionController::class, 'destroyTeacher'])->name('teachers.destroy');

///////////////////parents route//////////////////////


Route::get('/dads', [DadController::class, 'index'])->name('dads.index');
Route::get('/dads/create', [DadController::class, 'create'])->name('dads.create');
Route::post('/dads', [DadController::class, 'store'])->name('dads.store');
Route::get('/dads/{id}', [DadController::class, 'show'])->name('dads.show');
Route::get('/dads/{id}/edit', [DadController::class, 'edit'])->name('dads.edit');
Route::put('/dads/{id}', [DadController::class, 'update'])->name('dads.update');
Route::delete('/dads/{id}', [DadController::class, 'destroy'])->name('dads.destroy');
////////////////student route//////////////////


Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::post('/classroom', [ClassroomController::class, 'store'])->name('classroom.store');
Route::post('/timetable', [DaycareController::class, 'storetimetable'])->name('timetable.store');
Route::get('/timetable/create', [DaycareController::class, 'createtimetable'])->name('timetable.create');
Route::post('/timetable', [DaycareController::class, 'indextimetable'])->name('timetable.index');


// Route::get('image-gallery', [ImageGalleryController::class, 'index'])->name('image-gallery.index');
// Route::get('image-gallery/create', [ImageGalleryController::class, 'create'])->name('image-gallery.create');
// Route::post('image-gallery', [ImageGalleryController::class, 'store'])->name('image-gallery.store');
// Route::get('image-gallery/{id}', [ImageGalleryController::class, 'show'])->name('image-gallery.show');
// Route::get('image-gallery/{id}/edit', [ImageGalleryController::class, 'edit'])->name('image-gallery.edit');
// Route::put('image-gallery/{id}', [ImageGalleryController::class, 'update'])->name('image-gallery.update');
// Route::delete('image-gallery/{id}', [ImageGalleryController::class, 'destroy'])->name('image-gallery.destroy');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/create', [ContactController::class, 'store'])->name('contact.create');
Route::get('/dashboard/all_contacts', [ContactController::class, 'all_contacts'])->name('dashboard.all_contacts');
Route::get('/dashboard/all_contacts/destroy/{id}', [ContactController::class, 'destroy'])->name('dashboard.all_contacts.destroy');
Route::get('/files', [FilesController::class, 'index'])->name('files.index');
Route::get('/file/{filename}',[FilesController::class, 'show'])->name('file.show');


Route::get('/payment', [PayPalController::class, 'index'])->name('payment.index');
Route::get('/cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('/payment/success', [PayPalController::class, 'success'])->name('payment.success');



    });
});
 require __DIR__.'/auth.php';
require __DIR__.'/teacher.php';
require __DIR__.'/dad.php';

