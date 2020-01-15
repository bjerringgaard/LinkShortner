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
/*
Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'ShortLinkController@index');
Route::post('/', 'ShortLinkController@store')->name('generate.shorten.link.post');
   
Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');

Route::get('/delete/{id}' , 'controller@delete');