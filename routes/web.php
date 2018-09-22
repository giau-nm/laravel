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
Route::get('/login', 'UserController@login')->name('login');
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('user.login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('user.login.google.callback');
Route::get('logout', 'Auth\LoginController@logout')->name('user.logout');

Route::group(['middleware' => ['normalUser']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Route::resource('devices', 'DeviceController')->except(['show']);
    // Route::post('/devices/{id}/change-status', 'DeviceController@changeStatus')->name('devices.change-status');
    // Route::get('/devices/import', 'DeviceController@import')->name('devices.import');
    // Route::get('/devices/import-list', 'DeviceController@importList')->name('devices.importList');
    // Route::get('/devices/get-data-csv', 'DeviceController@getDataFileCsv')->name('devices.getDataFileCsv');
    // Route::post('/devices/save-data-csv', 'DeviceController@saveDataCsv')->name('devices.save-data-csv');
    // Route::post('/devices/show', 'DeviceController@show')->name('devices.show');
    // Route::resource('reports', 'ReportController');
    // Route::resource('requests', 'RequestController');
    // Route::post('requests/info', 'RequestController@info')->name('requests.info');
    // Route::post('/users/change-chatwork-id', 'UserController@changeChatworkId')->name('users.change_cw_id');
});

Route::group(['middleware' => ['adminUser']], function () {
    Route::resource('projects', 'ProjectController');
    Route::get('/users/form_change_user_permission', 'UserController@formChangeUserPermission')->name('users.formChangeUserPermission');
    Route::post('/users/post_change_user_permission', 'UserController@postChangeUserPermission')->name('users.postChangeUserPermission');
    Route::get('/users/{id}/profile', 'UserController@profile')->name('users.profile');
    Route::resource('configs', 'ConfigController');
    Route::get('/searchs/index', 'SearchController@index')->name('searchs.index');
});
