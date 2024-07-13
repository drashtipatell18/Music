<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PremiumController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('login');
    }
    return redirect()->route('dashboard');
});

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


Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => false
]);
