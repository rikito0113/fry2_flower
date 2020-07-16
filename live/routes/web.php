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
Route::get('Girl/mainChat',                'GirlController@mainChat')->name('girl.mainChat');
Route::POST('Girl/mainChatSend',           'GirlController@mainChatSend')->name('girl.mainChatSend');
Route::get('/girl_select',                 'GirlController@girlSelect')->name('girl_select');
Route::get('/girl_select/{charId}',        'GirlController@girlSelectExec');
Route::get('/setImg/{imgId}',              'GirlController@setImgExec');
Route::get('Profile/profile',              'ProfileController@profile')->name('profile.profile');






// 以下、管理画面用
Route::get('/admin/login',      'AdminController@login')->name('admin.login');
Route::post('/admin/loginExec', 'AdminController@loginExec');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    // function内は '/admin/~~'になる

    Route::get('index',                     'AdminController@index')->name('admin.index');
    Route::post('shold_reply',              'AdminController@sholdReply');
    Route::post('find_player',              'AdminController@findPlayer');
    Route::post('find_item',                'AdminController@findItem');
    Route::post('find_girl',                'AdminController@findGirl');

    Route::view('shold_reply',              'admin.shold_reply')->name('admin.sholdReply');
    Route::view('find_player',              'admin.find_player')->name('admin.findPlayer');
    Route::view('find_item',                'admin.find_item')->name('admin.findItem');
    Route::view('find_girl',                'admin.find_girl')->name('admin.findGirl');
});
