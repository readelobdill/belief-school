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

Route::get('/', 'WelcomeController@index');



/*Modules*/
Route::get('home', 'HomeController@index');
Route::get('welcome', function() {
    return view('app.welcome.index', ['page' => 'welcome']);
});
Route::get('boomerang', function() {
    return view('app.modules.boomerang.index', ['page' => 'boomerang']);
});

Route::get('un-stuck', function() {
    return view('app.modules.un-stuck.index', ['page' => 'un-stuck']);
});
Route::get('visualise', function() {
    return view('app.modules.visualise.index', ['page' => 'visualise']);
});




Route::get('modules/{module}/update', ['as' => 'modules.update', 'uses' => 'ModuleController@updateModule']);


Route::post('users', ['as' => 'users.create', 'uses' => 'UserController@createUser']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('admin', function() {

});


Route::group(['prefix' => 'admin', ], function() {
    Route::get('/', ['as' => 'admin.home', 'uses' => '\App\Admin\Http\Controllers\DashboardController@getIndex']);

    Route::group(['prefix' => 'users'], function() {
        Route::get('', ['as' => 'admin.users.list', 'uses' => '\App\Admin\Http\Controllers\UserController@getList']);
        Route::get('/create', ['as' => 'admin.users.create', 'uses' => '\App\Admin\Http\Controllers\UserController@getCreate']);
        Route::post('/create', ['as' => 'admin.users.post-create', 'uses' => '\App\Admin\Http\Controllers\UserController@postCreate']);
        Route::get('/{user}/edit', ['as' => 'admin.users.edit', 'uses' => '\App\Admin\Http\Controllers\UserController@getEdit']);
        Route::delete('/{user}', ['as' => 'admin.users.delete', 'uses' => '\App\Admin\Http\Controllers\UserController@delete']);
    });

    Route::group(['prefix' => 'modules'], function() {
        Route::get('', ['as' => 'admin.modules.list', 'uses' => '\App\Admin\Http\Controllers\ModuleController@getList']);
        Route::get('/create', ['as' => 'admin.modules.create', 'uses' => '\App\Admin\Http\Controllers\ModuleController@getCreate']);
        Route::post('/create', ['as' => 'admin.modules.save', 'uses' => '\App\Admin\Http\Controllers\ModuleController@postCreate']);
        Route::get('/{module}/edit', ['as' => 'admin.modules.edit', 'uses' => '\App\Admin\Http\Controllers\ModuleController@getEdit']);
        Route::post('/{module}/edit', ['as' => 'admin.modules.edit', 'uses' => '\App\Admin\Http\Controllers\ModuleController@postEdit']);
        Route::delete('/{module}', ['as' => 'admin.modules.delete', 'uses' => '\App\Admin\Http\Controllers\ModuleController@deleteModule']);
        Route::post('/update-order', ['as' => 'admin.modules.update-order', 'uses' => '\App\Admin\Http\Controllers\ModuleController@updateOrder']);


        Route::get('{module}/comments', ['as' => 'admin.modules.comments', 'uses' => '\App\Admin\Http\Controllers\CommentController@listForModule']);
    });

    Route::group(['prefix' => 'comments'], function() {
        Route::get('/create', ['as' => 'admin.comments.create', 'uses' => '\App\Admin\Http\Controllers\CommentController@getCreate']);
        Route::post('/create', ['as' => 'admin.comments.save', 'uses' => '\App\Admin\Http\Controllers\CommentController@postCreate']);
        Route::delete('/{comment}', ['as' => 'admin.comments.delete', 'uses' => '\App\Admin\Http\Controllers\CommentController@deleteComment']);
        Route::post('/{comment}/sticky', ['as' => 'admin.comments.sticky', 'uses' => '\App\Admin\Http\Controllers\CommentController@toggleSticky']);
        Route::post('/{comment}/reply', ['as' => 'admin.comments.reply-post', 'uses' => '\App\Admin\Http\Controllers\CommentController@replyTo']);
        Route::get('/{comment}/reply', ['as' => 'admin.comments.reply', 'uses' => '\App\Admin\Http\Controllers\CommentController@getReplyTo']);
    });
});

Route::get('profile', ['as' => 'users.profile', 'uses' => 'UserController@getProfile']);
