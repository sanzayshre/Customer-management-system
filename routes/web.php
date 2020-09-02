<?php

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
Route::group(['middleware'=>['auth']], function (){

    Route::any('edit_action', 'CustomerController@editAction')->name('edit_action');
    Route::any('delete/{user_id?}', 'CustomerController@deleteUser')->name('delete');

});

Route::get('/', 'CustomerController@index')->name('home');
Route::any('add', 'CustomerController@addUser')->name('add');

Route::any('edit/{user_id?}', 'CustomerController@editUser')->name('edit');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
