<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', 'MPController@index');

Route::get('/news/', 'NewsController@index');

/*
|--------------------------------------------------------------------------
| Detail Berita
|--------------------------------------------------------------------------
*/
// Route::name('front')->middleware('visitor:id')->group(function($id){
//     Route::get('/news/detail/{id}', 'NewsController@detail')->name('news-detail');
// });
Route::get('/news/detail/{id}')->middleware('visitor:');
Route::get('/news/detail/{id}', 'NewsController@detail')->name('detail');

/*
|--------------------------------------------------------------------------
| Tambah Berita
|--------------------------------------------------------------------------
*/
Route::get('/dashboard/add', 'NewsController@add');
Route::post('/dashboard/add/store', 'NewsController@store');

/*
|--------------------------------------------------------------------------
| Edit Berita
|--------------------------------------------------------------------------
*/
Route::get('/dashboard/edit/{id}', 'NewsController@edit');
Route::put('/dashboard/edit/update/{id}', 'NewsController@update');

/*
|--------------------------------------------------------------------------
| Hapus Berita
|--------------------------------------------------------------------------
*/
Route::get('/dashboard/delete/{id}', 'NewsController@delete');

Auth::routes();

Route::get('/dashboard/', 'HomeController@dashboard')->name('dashboard');
