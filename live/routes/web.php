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

Route::get('/',                            'TopController@login')->name('register');
Route::post('/loginExec',                  'TopController@loginExec');
Route::get('/register',                    'TopController@register');
Route::post('/register',                   'TopController@registerExec');
Route::get('my/my',                        'MyController@my')->name('my.my');
Route::get('Present/index',                'PresentController@index')->name('present.index');
Route::get('Girl/index',                   'GirlController@index')->name('girl.index');