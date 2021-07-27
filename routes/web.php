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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::match(['get', 'post'], '/', 'AdminController@login');
    Route::group(['middleware' =>  ['admin']],function()
    {
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('logout', 'AdminController@logout');

        // Update password and details
        Route::post('check-current-pwd', 'AdminController@checkCurrentPwd');
        Route::get('settings', 'AdminController@settings');
        Route::post('update-current-pwd', 'AdminController@updateCurrentPwd');
        Route::match(['get', 'post'],'update-admin-details', 'AdminController@updateAdminDetails');

        //sections
        Route::get('sections', 'SectionController@sections');
        Route::post('change-status-section', 'SectionController@changeStatusSection');

        
        
    });
});
