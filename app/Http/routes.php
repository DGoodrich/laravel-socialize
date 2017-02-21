<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    // Admin
    Route::get('admin', ['uses' => 'AdminController@admin', 'as' => 'admin']);
    Route::get('admin/admin', ['uses' => 'AdminController@showAdminUsers', 'as' => 'admin.users']);
    Route::get('admin/users/{page}', ['uses' => 'AdminController@showUsers', 'as' => 'admin.users']);
    Route::post('admin/ban', ['uses' => 'AdminController@banUsers', 'as' => 'admin.banUsers']);
    Route::post('admin/un-ban', ['uses' => 'AdminController@unBanUsers', 'as' => 'admin.unBanUsers']);

    Route::group(['middleware' => ['role']], function () {

        Route::resource('user', 'UserController');

        Route::group(['prefix' => 'user/{user}/'], function () {

            Route::resource('requests', 'UserRelationsController', [
                'only' => ['index', 'data', 'store', 'update', 'destroy']
            ]);

            Route::resource('post', 'PostController', [
                'only' => ['data', 'store', 'update', 'destroy']
            ]);
        });
    });

    Route::auth();

});
