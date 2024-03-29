<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('layouts.backend');
});

Route::get('dashboardfrontend', function () {
    return view('dashboardfrontend');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::resource('kategori', 'KategoriController');
    Route::resource('tag', 'TagController');
    Route::resource('artikel', 'ArtikelController');
    Route::resource('review', 'ReviewController');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/catagories-post', function () {
    return view('catagories-post');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/single-post', function () {
    return view('single-post');
});
