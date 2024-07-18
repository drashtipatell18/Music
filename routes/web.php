<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', function(){
    return view('dashboard');
});
Route::get('/users', function(){
    return view('user.view_user');
});
Route::get('/language', function(){
    return view('language.view_language');
});
Route::get('/category', function(){
    return view('category.view_category');
});
Route::get('/artist', function(){
    return view('artist.view_artist');
});
Route::get('/albums', function(){
    return view('albums.view_albums');
});
Route::get('/musicvideo', function(){
    return view('music_video.view_musicvideos');
});
