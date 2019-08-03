<?php

/*************************************************************************************
 *                                     Front Guest
 *************************************************************************************/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

/*************************************************************************************
 *                                     Front Auth
 *************************************************************************************/
Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@index')->name('home');
});

/*************************************************************************************
 *                                     Admin Guest
 *************************************************************************************/
Route::group(['prefix' => 'admin'], function() {

    Route::get('login', 'Admin\AuthController@loginForm');
    Route::post('login', 'Admin\AuthController@login')->name('admin.login');
    Route::post('logout', 'Admin\AuthController@logout')->name('admin.logout');
});

/*************************************************************************************
 *                                     Admin Auth
 *************************************************************************************/
Route::group([
    'namespace' => 'Admin',
    'middleware' => 'auth:admin',
    'prefix' => 'admin'
], function () {

    Route::get('/', 'HomeController@index');
});
