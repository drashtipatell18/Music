<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\MusicVideoController;


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
Route::get('/resend-otp', [DashboardController::class, 'resend'])->name('resend.otp');
Route::get('/reset-password', [DashboardController::class, 'resetPassword'])->name('reset.password');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Premium

Route::get('/premiums', [PremiumController::class, 'premiums'])->name('premiums');
Route::post('/premiums/insert',[PremiumController::class,'premiumsInsert'])->name('insert.premiums');
Route::post('/premiums/update/{id}', [PremiumController::class, 'premiumsUpdate'])->name('update.premiums');

// Music & Video

Route::get('/music_videos', [MusicVideoController::class, 'music_videos'])->name('music_videos');
Route::post('/music_videos/insert',[MusicVideoController::class,'musicVideosInsert'])->name('insert.music_videos');
Route::post('/music_videos/update/{id}', [MusicVideoController::class, 'musicVideosUpdate'])->name('update.music_videos');




// User

Route::get('/user', [UserController::class, 'users'])->name('user');
Route::post('/user/insert',[UserController::class,'userInsert'])->name('insert.user');
Route::post('/user/update/{id}', [UserController::class, 'userUpdate'])->name('update.user');
Route::get('/user/destroy/{id}',[UserController::class,'userDestroy'])->name('destroy.user');

// Language

Route::get('/language', [LanguageController::class, 'language'])->name('language');
Route::post('/language/insert',[LanguageController::class,'languageInsert'])->name('insert.language');
Route::post('/language/update/{id}', [LanguageController::class, 'languageUpdate'])->name('update.language');

// Category

Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category.store');
Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('update.category');

Route::get('/artist', [ArtistController::class, 'artist'])->name('artist');
Route::post('/artist/store', [ArtistController::class, 'storeArtist'])->name('artist.store');
Route::post('/artist/update/{id}', [ArtistController::class, 'ArtistUpdate'])->name('update.category');
