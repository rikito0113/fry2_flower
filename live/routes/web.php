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

Route::get('/',                            'TopController@login')->name('top.login');
Route::post('/loginExec',                  'TopController@loginExec')->name('top.loginExec');
Route::get('/register',                    'TopController@register')->name('register');
Route::post('/registerExec',               'TopController@registerExec');
Route::get('my/my',                        'MyController@my')->name('my.my');
Route::get('Present/index',                'PresentController@index')->name('present.index');
Route::get('Girl/index',                   'GirlController@index')->name('girl.index');
Route::get('/girl_select',                 'GirlController@girlSelect')->name('girl_select');
Route::get('/girl_select/{charId}',        'GirlController@girlSelectExec');
Route::get('/setImg/{imgId}',              'GirlController@setImgExec');

Route::prefix('admin')->group(function () {
    // function内は '/admin/~~'になる
    // 上に指定したrouteの方が採用されるため、sessionが必要なのは37行目以降となる。

    Route::get('login',  'AdminController@login')->name('admin.login');
    Route::post('login', 'AdminController@loginExec');

    if (!session()->has('admin_id')) {
        redirect()->route('admin.login');
    }

    Route::get('index', 'AdminController@index')->name('admin.index');
});