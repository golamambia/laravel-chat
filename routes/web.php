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

/***************** Clear Cache *****************/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users');


Route::get('/profiles', 'ProfilesController@index')->name('profiles');
Route::post('/profiles/update', 'ProfilesController@update')->name('profiles.update');

/* chat */
Route::get('/chat/user/{id}', 'ChatController@index')->name('chat.user');
Route::post('/chat_msg_send', 'ChatController@saveMsg')->name('chat_msg_send');
Route::post('/get_latest_msg', 'ChatController@getLatestMsg')->name('get_latest_msg');
Route::post('/show_old_msg', 'ChatController@showOldMsg')->name('show_old_msg');
Route::get('/show_active_msg', 'ChatController@show_active_msg')->name('show_active_msg');
Route::post('/send_attchment', 'ChatController@saveAttchment')->name('send_attchment');
Route::post('/download_chat', 'ChatController@downloadChat')->name('download_chat');
Route::post('/delete_msg', 'ChatController@deleteChat')->name('delete_msg');


Auth::routes();
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('logout', function(){ Auth::logout();    return Redirect::to('/'); });

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'admin'], function () {
    
    /* My Page */
    Route::get('/',                      'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('dashboard/index',                      'Admin\DashboardController@index')->name('admin.dashboard.index');


    /* users */
    Route::get('/users',                   	'Admin\UsersController@index')->name('admin.users.index');
    Route::get('/users/create',               'Admin\UsersController@create')->name('admin.users.create');
    Route::post('/users/save',                'Admin\UsersController@store')->name('admin.users.store');
    Route::get('/users/edit/{id}',            'Admin\UsersController@edit')->name('admin.users.edit');
    Route::post('/users/update',              'Admin\UsersController@update')->name('admin.users.update');
    Route::get('/users/delete/{id}',          'Admin\UsersController@destroy')->name('admin.users.delete');
    Route::post('/users/getTableData',        'Admin\UsersController@getTableData')->name('admin.users.getTableData');

    Route::get('/chats',                   	'Admin\ChatsController@index')->name('admin.chats.index');
    Route::get('/chats/edit/{id}',            'Admin\ChatsController@edit')->name('admin.chats.edit');
    Route::get('/chats/delete/{id}',          'Admin\ChatsController@destroy')->name('admin.chats.delete');
    Route::post('/chats/getTableData',        'Admin\ChatsController@getTableData')->name('admin.chats.getTableData');

    Route::get('/profiles', 'Admin\ProfilesController@index')->name('admin.profiles');
    Route::post('/profiles/update', 'Admin\ProfilesController@update')->name('admin.profiles.update');

});

