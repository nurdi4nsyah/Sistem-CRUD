<?php


use Illuminate\Support\Facades\Route;

//login
Route::get('/', 'AuthController@getLogin');
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin')
    ->name('login');

//register    
Route::get('/register', 'AuthController@getRegister');
Route::post('/register', 'AuthController@postRegister')
    ->name('register');

//logout
Route::get('/logout', 'AuthController@logOut')
    ->name('logout');


Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', 'HomeController@index')
        ->name('home');
    Route::get('/create', 'HomeController@create')
        ->name('create');
    Route::post('/create', 'HomeController@store')
        ->name('postdata');
    Route::get('/home/{id}/edit', 'HomeController@edit')
        ->name('edit');
    Route::post('/home/{id}/update', 'HomeController@update');
    Route::get('/home/delete/{id}', 'HomeController@destroy');
    
});











    