<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'Home\IndexController@index');
    Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
    Route::get('/a/{art_id}', 'Home\IndexController@article');

    Route::get('/artuser/{user_id}', 'Home\IndexController@artuser');

    Route::get('/gui/{year}/{month}', 'Home\IndexController@guidang');

    Route::post('/commentstore/{art_id}', 'Home\IndexController@commentstore');

    Route::post('/praise/{art_id}', 'Home\IndexController@praise');
    Route::post('/attention/{user_id}', 'Home\IndexController@attention');
    Route::post('/word/{user_id}', 'Home\IndexController@word');


    Route::any('admin/login', 'Admin\LoginController@login');
    Route::any('admin/login1', 'Admin\LoginController@login1');
    Route::get('admin/code', 'Admin\LoginController@code');

    Route::get('admin/recomart', 'Admin\ArticleController@recomart');
    Route::post('admin/articlerecomcacel/{art_id}', 'Admin\IndexController@articlerecomcacel');
    Route::post('admin/articlerecom/{art_id}', 'Admin\IndexController@recomarticle');

    Route::any('users/login', 'Users\LoginController@login');
    Route::any('users/login1', 'Users\LoginController@login1');
    Route::any('users/login3', 'Users\LoginController@login3');
    Route::any('users/re', 'Users\LoginController@re');
    Route::post('users/login2/{art_id}', 'Users\LoginController@login2');
    Route::get('users/code', 'Users\LoginController@code');
});


Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');



    Route::post('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('category', 'CategoryController');

    Route::resource('article', 'ArticleController');
    Route::resource('comment', 'CommentController');
    Route::resource('user', 'UserController');


    Route::post('links/changeorder', 'LinksController@changeOrder');
    Route::resource('links', 'LinksController');

    Route::post('navs/changeorder', 'NavsController@changeOrder');
    Route::resource('navs', 'NavsController');

    Route::get('config/putfile', 'ConfigController@putFile');
    Route::post('config/changecontent', 'ConfigController@changeContent');
    Route::post('config/changeorder', 'ConfigController@changeOrder');
    Route::resource('config', 'ConfigController');

    Route::any('upload', 'CommonController@upload');

});

Route::group(['middleware' => ['web','users.login'],'prefix'=>'users','namespace'=>'Users'], function () {
    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');

    Route::post('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('category', 'CategoryController');

    Route::resource('article', 'ArticleController');
    Route::resource('comment', 'CommentController');
    Route::resource('user', 'UserController');
    Route::resource('word', 'WordController');
    Route::resource('attention', 'AttentionController');
    Route::post('attention/add/{user_id}', 'AttentionController@add');


    Route::post('links/changeorder', 'LinksController@changeOrder');
    Route::resource('links', 'LinksController');

    Route::post('navs/changeorder', 'NavsController@changeOrder');
    Route::resource('navs', 'NavsController');

    Route::get('config/putfile', 'ConfigController@putFile');
    Route::post('config/changecontent', 'ConfigController@changeContent');
    Route::post('config/changeorder', 'ConfigController@changeOrder');
    Route::resource('config', 'ConfigController');

    Route::any('upload', 'CommonController@upload');

});