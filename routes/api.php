<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => false
]);
