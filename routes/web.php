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
Route::group(['middleware'=>'web'], function() {
Route::get('/', 'GalleryController@index');
Route::resource('gallery', 'GalleryController');

Route::get('gallery/show/{id}', 'GalleryController@show');

Route::resource('photo', 'PhotoController');
Route::get('photo/details/{id}', 'PhotoController@details');
Route::get('photo/create/{id}', 'PhotoController@create');
Auth::routes();
/*Gyárilag ezt hozza létre, és ez irányít a regisztrálás után egy felületre, ahol csak kiirja hogy be vagy lépve mint felhasználó(itt egyébként van gyárilag egy kijelentkező link már):
Route::get('/home', 'HomeController@index')->name('home');
*/

// Ez viszont oda irányít belépés után ahol a galériák vannak:
Route::get('/home', 'GalleryController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');
});