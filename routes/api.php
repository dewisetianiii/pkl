<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('siswa', 'Api\siswaController');
Route::resource('kategori', 'Api\KategoriController');
Route::resource('tag', 'Api\TagController');
Route::resource('artikel', 'Api\ArtikelController');

Route::resource('latest','Api\FrontendController@latest');
