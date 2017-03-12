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

Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/chats', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('/ptv', 'HomeController@ptv');
Route::get('/ptv/routes', 'HomeController@ptvRoutes');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/{page}', 'PageController@show')->name('pages.show');

Route::group(["middleware" => "auth"], function () {

    Route::group(["prefix" => "admin"], function () {
        Route::get('/', 'HomeController@index')->name('admin.index');

        //Show Admin Profile
        Route::get('profile', 'AdminController@show')->name('admin.profile');

        Route::group(["prefix" => "pages"], function () {
            Route::get('/', 'PageController@index')->name('pages.index');
            //Create pages
            Route::get('create', 'PageController@create')->name('pages.create');
            Route::post('create', 'PageController@store')->name('pages.store');
        });
        Route::get('page/{page}', 'PageController@edit')->name('pages.edit');
        Route::post('page/{page}', 'PageController@update')->name('pages.update');

        Route::group(["prefix" => "users"], function () {

            Route::get('/', 'UserController@index')->name('users.index');
            //Create pages
            Route::get('create', 'UserController@create')->name('users.create');
            Route::post('create', 'UserController@store')->name('users.store');
        });
        //Display user
        Route::get('user/{user}', 'UserController@show')->name('users.show');

    });
});
