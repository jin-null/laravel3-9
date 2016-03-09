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

Route::get('/', function () {
    return view('welcome');
});

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
    //
});






Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

/**
 * ����Ա��¼ע��
 */
Route::group(['namespace' => 'Adminauth', 'prefix' => 'admin'], function () {
    // Login Routes...
    Route::get('/login','AuthController@showLoginForm');
    Route::post('/login','AuthController@login');


    Route::get('/password/reset/{token?}','PasswordController@showResetForm');
    Route::post('/password/reset','PasswordController@reset');
    Route::post('/password/email','PasswordController@sendResetLinkEmail');

    // Registration Routes...
    Route::get('register', 'AuthController@showRegistrationForm');
    Route::post('register', 'AuthController@register');

    //Logout Routes...
    Route::get('logout','AuthController@logout');
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    //��̨��ҳ
    Route::get('/', 'IndexController@index');

    //��ƷƷ��
//    Route::resource('brand', 'BrandController');
});