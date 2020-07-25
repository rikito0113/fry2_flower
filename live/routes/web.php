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

Route::get('/',                                          'TopController@login')->name('top.login');
Route::post('/loginExec',                                'TopController@loginExec')->name('top.loginExec');
Route::get('/register',                                  'TopController@register')->name('register');
Route::post('/registerExec',                             'TopController@registerExec');
Route::get('my/my',                                      'MyController@my')->name('my.my');
Route::get('Present/index',                              'PresentController@index')->name('present.index');

// girl関連
Route::get('Girl/index',                                 'GirlController@index')->name('girl.index');
Route::get('Girl/mainChat',                              'GirlController@mainChat')->name('girl.mainChat');
Route::POST('Girl/mainChatSend',                         'GirlController@mainChatSend')->name('girl.mainChatSend');
Route::get('/girl_select',                               'GirlController@girlSelect')->name('girl_select');
Route::get('/girl_select/{charId}',                      'GirlController@girlSelectExec');
Route::get('/setImg/{imgId}',                            'GirlController@setImgExec');
Route::get('/Gril/eventField',                           'GirlController@eventField')->name('girl.eventField');
Route::get('/Gril/eventPlace/{field}',                   'GirlController@eventPlace');
Route::get('/Gril/eventChat/{place}',                    'GirlController@eventChat')->name('girl.eventChat');

// profile関連
Route::get('/Profile/profile',                            'ProfileController@profile')->name('profile.profile');
Route::post('/Profile/changeNameConfirm',                 'ProfileController@changeNameConfirm');
Route::post('/Profile/changeNameExec',                    'ProfileController@changeNameExec')->name('profile.changeNameExec');
Route::post('/Profile/changeTitleConfirm',                'ProfileController@changeTitleConfirm')->name('profile.changeTitleConfirm');
Route::post('/Profile/changeTitleExec',                   'ProfileController@changeTitleExec')->name('profile.changeTitleExec');

// 育成・勉学関連
Route::get('/Study/index',                                'StudyController@index')->name('study.index');
Route::post('/Study/girlScoreStatus',                     'StudyController@girlScoreStatus')->name('study.girlScoreStatus');
Route::post('/Study/upScoreExec',                         'StudyController@upScoreExec')->name('study.upScoreExec');








// 以下、管理画面用
Route::get('/admin/login',      'AdminController@login')->name('admin.login');
Route::post('/admin/loginExec', 'AdminController@loginExec');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    // function内は '/admin/~~'になる

    Route::get('index',                                     'AdminController@index')->name('admin.index');
    Route::post('shold_reply',                              'AdminController@sholdReply');
    Route::post('find_player',                              'AdminController@findPlayer');
    Route::post('find_item',                                'AdminController@findItem');
    Route::post('find_girl',                                'AdminController@findGirl');
    Route::post('register_title_exec',                      'AdminController@registerTitleExec');
    Route::get('register_title',                            'AdminController@registerTitle')->name('admin.register_title');
    Route::get('player_detail/{playerId}',                  'AdminController@playerDetail')->name('admin.player_detail');
    Route::post('main_chat',                                'AdminController@mainChat');

    Route::view('shold_reply',                              'admin.shold_reply')->name('admin.sholdReply');
    Route::view('find_player',                              'admin.find_player')->name('admin.findPlayer');
    Route::view('find_item',                                'admin.find_item')->name('admin.findItem');
    Route::view('find_girl',                                'admin.find_girl')->name('admin.findGirl');
});
