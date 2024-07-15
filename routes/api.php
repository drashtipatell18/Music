<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MusicVideoController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth.api')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/create/register', [RegisterController::class, 'register'])->name('create.register');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/forget-password', [DashboardController::class, 'showForgetPasswordForm'])->name('forget.password');
    Route::post('/forget-password', [DashboardController::class, 'sendResetLinkEmail'])->name('forget.password.email');
    Route::get('/verify-otp', [DashboardController::class, 'verifyOTPForm'])->name('verify.otp');
    Route::post('verify-otp', [DashboardController::class, 'verifyOTP']);
    // Route::get('/resend-otp', [DashboardController::class, 'resend'])->name('resend.otp');
    Route::post('/resend-otp', [DashboardController::class, 'resend'])->name('resend.otp');

    Route::get('/reset-password', [DashboardController::class, 'resetPassword'])->name('reset.password');
    Route::post('/password-reset', [DashboardController::class, 'passwordReset'])->name('password.reset');

    // Dashboard

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // User

    Route::get('/user', [UserController::class, 'users'])->name('user');
    Route::post('/user/insert', [UserController::class, 'userInsert'])->name('insert.user');
    Route::post('/user/update/{id}', [UserController::class, 'userUpdate'])->name('update.user');
    Route::get('/user/destroy/{id}', [UserController::class, 'userDestroy'])->name('destroy.user');

    // Language

    Route::get('/language', [LanguageController::class, 'language'])->name('language');
    Route::post('/language/insert', [LanguageController::class, 'languageInsert'])->name('insert.language');
    Route::post('/language/update/{id}', [LanguageController::class, 'languageUpdate'])->name('update.language');
    Route::post('/language/status/{id}', [LanguageController::class, 'UpdateStatus'])->name('updatestatus.language');

    // Category

    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category.store');
    Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('update.category');

    // Artist

    Route::get('/artist', [ArtistController::class, 'artist'])->name('artist');
    Route::post('/artist/store', [ArtistController::class, 'storeArtist'])->name('artist.store');
    Route::post('/artist/update/{id}', [ArtistController::class, 'ArtistUpdate'])->name('update.artist');
    Route::post('/artist/status/{id}', [ArtistController::class, 'ArtistUpdateStatus'])->name('updatestatus.artist');

    // Category

    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category.store');
    Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('update.category');

    // Album

    Route::get('/albums', [AlbumController::class, 'albums'])->name('albums');
    Route::post('/albums/store', [AlbumController::class, 'storeAlbum'])->name('albums.store');
    Route::post('/albums/update/{id}', [AlbumController::class, 'updateAlbum'])->name('update.albums');
    Route::post('/albums/status/{id}', [AlbumController::class, 'AlbumUpdateStatus'])->name('updatestatus.albums');


    // Music & Video

    Route::get('/music_videos', [MusicVideoController::class, 'music_videos'])->name('music_videos');
    Route::post('/music_videos/insert', [MusicVideoController::class, 'musicVideosInsert'])->name('insert.music_videos');
    Route::post('/music_videos/update/{id}', [MusicVideoController::class, 'musicVideosUpdate'])->name('update.music_videos');

    // Premium
    Route::get('/premiums', [PremiumController::class, 'premiums'])->name('premiums');
    Route::post('/premiums/insert', [PremiumController::class, 'premiumsInsert'])->name('insert.premiums');
    Route::post('/premiums/update/{id}', [PremiumController::class, 'premiumsUpdate'])->name('update.premiums');


});


