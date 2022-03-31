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

Route::get('/', 'UserController@index')->name('all_users');

Route::post('/', 'UserController@store')->name('create_user');

Route::post('/edit/{id}', 'UserController@update')->name('update_user');

Route::post('/delete/{id}', 'UserController@destroy')->name('delete_user');

/* Route::get('/', function() {
    return view('crud');
}); */
