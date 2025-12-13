<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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
// Route::get('/materials', [MaterialsController::class, 'Materials'])->name('Materials');
Route::get('/mycourse/{course}', [MaterialsController::class, 'details'])->name('mycourse.details');


Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store']);
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::resource('courses', App\Http\Controllers\CourseController::class);

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/create', [\App\Http\Controllers\AdminCourseController::class, 'create'])
        ->name('admin.create');

    Route::post('/admin/store', [\App\Http\Controllers\AdminCourseController::class, 'store'])
        ->name('admin.courses.store');
});

Route::post('/course/{id}/submit', [CourseController::class, 'submit'])->name('course.submit');
