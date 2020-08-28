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
Route::get('/My/my',                                     'MyController@my')->name('my.my');
Route::get('/Present/index',                             'PresentController@index')->name('present.index');

// girl関連
Route::get('/Girl/index',                                'GirlController@index')->name('girl.index');
Route::get('/Girl/mainChat',                             'GirlController@mainChat')->name('girl.mainChat');
Route::POST('/Girl/mainChatSend',                        'GirlController@mainChatSend')->name('girl.mainChatSend');
Route::get('/Girl/girlSelect',                           'GirlController@girlSelect')->name('girlSelect');
Route::get('/Girl/girlSelect/{charId}',                  'GirlController@girlSelectExec');
Route::get('/Girl/setImg/{imgId}',                       'GirlController@setImgExec');
Route::get('/Girl/eventField',                           'GirlController@eventField')->name('girl.eventField');
Route::get('/Girl/eventPlace/{field}',                   'GirlController@eventPlace');
Route::get('/Girl/eventChat/{place}',                    'GirlController@eventChat')->name('girl.eventChat');
Route::post('/Girl/eventChatSend',                       'GirlController@eventChatSend');
Route::post('/Girl/memory',                              'GirlController@memory')->name('girl.memory');


Route::get('/Girl/status/{ownedCharId}',                 'GirlController@status');
Route::get('/Girl/statusUp/{ownedCharId}',               'GirlController@statusUp');
Route::post('/Girl/statusUpConfirm',                     'GirlController@statusUpConfirm')->name('girl.statusUpConfirm');
Route::get('/Girl/statusUpTunExec/{point}',              'GirlController@statusUpTunExec');
Route::get('/Girl/statusUpDereExec/{point}',             'GirlController@statusUpDereExec');

Route::get('/Girl/changeClothers',                       'GirlController@changeClothers')->name('girl.changeClothers');

// profile関連
Route::get('/Profile/profile',                            'ProfileController@profile')->name('profile.profile');
Route::post('/Profile/changeNameConfirm',                 'ProfileController@changeNameConfirm');
Route::post('/Profile/changeNameExec',                    'ProfileController@changeNameExec')->name('profile.changeNameExec');
Route::post('/Profile/changeTitleConfirm',                'ProfileController@changeTitleConfirm')->name('profile.changeTitleConfirm');
Route::post('/Profile/changeTitleExec',                   'ProfileController@changeTitleExec')->name('profile.changeTitleExec');

// 育成・勉学関連
Route::get('/Study/index',                                'StudyController@index')->name('study.index');
Route::get('/Study/studyRanking',                         'StudyController@studyRanking')->name('study.studyRanking');
Route::post('/Study/girlScoreStatus',                     'StudyController@girlScoreStatus')->name('study.girlScoreStatus');
Route::post('/Study/upScoreExec',                         'StudyController@upScoreExec')->name('study.upScoreExec');








// 以下、管理画面用
Route::get('/Admin/login',      'AdminController@login')->name('admin.login');
Route::post('/Admin/loginExec', 'AdminController@loginExec');

Route::group(['middleware' => 'admin', 'prefix' => 'Admin'], function () {
    // function内は '/Admin/~~'になる

    Route::get('index',                                         'AdminController@index')->name('admin.index');
    Route::get('shouldReply',                                   'AdminController@shouldReply')->name('admin.shouldReply');
    Route::get('shouldReplyNormal',                             'AdminController@shouldReplyNormal')->name('admin.shouldReplyNormal');
    Route::get('shouldReplyEvent',                              'AdminController@shouldReplyEvent')->name('admin.shouldReplyEvent');
    Route::post('findPlayer',                                   'AdminController@findPlayer');
    Route::post('findItem',                                     'AdminController@findItem');
    Route::post('findGirl',                                     'AdminController@findGirl');
    Route::post('registerTitleExec',                            'AdminController@registerTitleExec');
    Route::get('registerTitle',                                 'AdminController@registerTitle')->name('admin.registerTitle');
    Route::get('playerDetail/{playerId}',                       'AdminController@playerDetail')->name('admin.playerDetail');
    Route::get('mainChat/{charId}/{playerId}/{isRead}',         'AdminController@mainChat')->name('admin.mainChat');
    Route::post('mainChatConfirm',                              'AdminController@mainChatConfirm');
    Route::post('mainChatSend',                                 'AdminController@mainChatSend');
    Route::post('findEventPlayer',                              'AdminController@findEventPlayer');
    Route::get('eventChat/{scenarioId}/{playerId}/{isRead}',    'AdminController@eventChat')->name('admin.eventChat');
    Route::post('eventChatConfirm',                             'AdminController@eventChatConfirm');
    Route::post('eventChatSend',                                'AdminController@eventChatSend');

    Route::view('should_reply',                             'admin.should_reply');
    Route::view('should_reply_normal',                      'admin.should_reply_normal');
    Route::view('should_reply_event',                       'admin.should_reply_event');
    Route::view('find_player',                              'admin.find_player')->name('admin.findPlayer');
    Route::view('find_item',                                'admin.find_item')->name('admin.findItem');
    Route::view('find_girl',                                'admin.find_girl')->name('admin.findGirl');
    Route::view('find_event',                               'admin.find_event')->name('admin.findEvent');
});
