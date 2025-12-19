<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminCourseController;

Route::get('/', function () {return redirect()->route('home');});
Route::view('/home', 'home')->name('home');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::post('/courses/{course}/apply', [CourseController::class, 'apply'])
     ->name('courses.apply');
     

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');


Route::get('/mycourse', [MyCourseController::class, 'MyCourse'])->name('MyCourse');
// Route::get('/materials', [MaterialsController::class, 'Materials'])->name('Materials'); aaaaaaaaaaaaaaaaasdasdsadxzczcasd
Route::get('/mycourse/{course}', [MaterialsController::class, 'details'])->name('mycourse.details');


Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store']);
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::resource('courses', App\Http\Controllers\CourseController::class);

Route::get('/profile', [MyCourseController::class, 'show'])->middleware('auth');

Route::middleware(['auth', 'is_admin'])->as('admin.')->group(function () {
    Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [AdminCourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [AdminCourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [AdminCourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [AdminCourseController::class, 'destroy'])->name('courses.destroy');
});

Route::post('/course/{id}/submit', [CourseController::class, 'submit'])->name('course.submit');