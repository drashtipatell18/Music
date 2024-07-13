<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // if(Auth::check()) {
        return redirect()->route('login');
    // }
    // return redirect()->route('dashboard');
});
Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => false
]);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/create/register', [RegisterController::class, 'register'])->name('create.register');

Route::get('/login', [HomeController::class, 'Login'])->name('login');
Route::post('/loginstore', [HomeController::class, 'loginStore'])->name('loginstore');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/forget-password', [DashboardController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('/forget-password', [DashboardController::class, 'sendResetLinkEmail'])->name('forget.password.email');
Route::get('/verify-otp', [DashboardController::class, 'verifyOTPForm'])->name('verify.otp');
Route::post('verify-otp', [DashboardController::class, 'verifyOTP']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// User 

Route::get('/user', [UserController::class, 'users'])->name('user');
Route::post('/user/insert',[UserController::class,'userInsert'])->name('insert.user');
Route::post('/user/update/{id}', [UserController::class, 'userUpdate'])->name('update.user');
Route::get('/user/destroy/{id}',[UserController::class,'userDestroy'])->name('destroy.user');

Route::get('/language', [LanguageController::class, 'language'])->name('language');
Route::post('/language/insert',[LanguageController::class,'languageInsert'])->name('insert.language');
Route::post('/language/update/{id}', [LanguageController::class, 'languageUpdate'])->name('update.language');
Route::get('/language/destroy/{id}',[LanguageController::class,'languageDestroy'])->name('destroy.language');

