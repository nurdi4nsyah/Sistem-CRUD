<?php


use Illuminate\Support\Facades\Route;

Route::get('/', 'AuthController@getLogin');
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin')->name('login');
Route::get('/register', 'AuthController@getRegister');
Route::post('/register', 'AuthController@postRegister')->name('register');
Route::get('/logout', 'AuthController@logOut')->name('logout');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/tamdat', 'HomeController@create')->name('tamdat');
    Route::post('/tamdat', 'HomeController@store')->name('postamdat');
    Route::get('/home/{id}/edit', 'HomeController@edit')->name('edit');
    Route::post('/home/{id}/update', 'HomeController@update');
    Route::get('/home/delete/{id}', 'HomeController@destroy');
    
});











    