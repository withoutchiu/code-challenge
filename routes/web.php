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

Route::get('/', "SearchController@index")->name('home');
Route::post('/search', "SearchController@search");
Route::get('/search/album/{id}', "SearchController@searchByAlbum")->name('search-by-album');
Route::get('/search/artist/{id}', "SearchController@SearchByArtist")->name('search-by-artist');
Route::get('/search/track/{id}', "SearchController@SearchByTrack")->name('search-by-track');
Auth::routes();
