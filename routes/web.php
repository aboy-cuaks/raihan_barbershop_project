
<?php

use App\Http\Controllers\BarberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// GUEST: Home
Route::get('/', [HomeController::class, 'index'])
    ->name('guest.home');

Route::get('/about', [HomeController::class, 'about'])
    ->name('guest.about');

Route::get('/services', [HomeController::class, 'services'])
    ->name('guest.services');

Route::get('/portfolio', [HomeController::class, 'portfolio'])
    ->name('guest.portfolio');

Route::get('/blog', [HomeController::class, 'blog'])
    ->name('guest.blog');

Route::get('/blog-details', [HomeController::class, 'blogDetails'])
    ->name('guest.blog-details');

Route::get('/contact', [HomeController::class, 'contact'])
    ->name('guest.contact');

Route::get('/elements', [HomeController::class, 'elements'])
    ->name('guest.elements');

Route::post('/contact/send', [QuestionController::class, 'store'])
    ->name('question.store');

// LOGIN & REGISTER
Route::view('/auth', 'guest.auth')
    ->name('guest.auth');

Route::post('/auth', [LoginController::class, 'authenticate'])
    ->name('guest.login');

Route::view('/register', 'guest.register')
    ->name('guest.register');

Route::post('/register', [LoginController::class, 'register'])
    ->name('guest.register.store');

// ADMIN
Route::get('/admin', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::redirect('/dashboard', '/admin')
    ->name('dashboard.index');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('barber', BarberController::class);
    Route::resource('user', UserController::class)
        ->except(['show']);

    Route::get('/pertanyaan', [QuestionController::class, 'index'])
        ->name('pertanyaan.index');
});
