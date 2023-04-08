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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'Student'], function() {
            // //............ company........... //
               Route::get('/', 'StudentController@index')->name('student.index');
            Route::get('/create', 'StudentController@create')->name('student.create');
             Route::post('/store', 'StudentController@store')->name('student.store');
             Route::get('/{student}/edit', 'StudentController@edit')->name('student.edit');
                 Route::patch('/{student}/update', 'StudentController@update')->name('student.update');
            Route::delete('student/{id}', 'StudentController@destroy')->name('student.destroy');
        });

        
    });
});
