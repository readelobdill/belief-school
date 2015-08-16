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



Route::get('modules/visualise/dreamboard', ['as' => 'modules.visualise.dreamboard','uses' => 'ModuleController@showDreamboardImage']);

Route::post('modules/{module}/update', ['as' => 'modules.update', 'uses' => 'ModuleController@updateModule']);
Route::post('modules/{module}/complete', ['as' => 'modules.complete', 'uses' => 'ModuleController@completeModule']);
Route::get('modules/{module}', ['as' => 'modules.view', 'uses' => 'ModuleController@viewModule']);
Route::get('modules/{module}/forum', ['as' => 'modules.forum', 'uses' => 'ModuleController@viewForum']);


Route::post('comments/{comment}/reply', ['as' => 'comments.reply', 'uses' => 'CommentController@reply']);
Route::post('modules/{module}/comment', ['as' => 'modules.comment', 'uses' => 'CommentController@create']);


Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);


Route::get('tagcloud/{secret}', ['as' => 'tagcloud', 'uses' => 'ModuleController@tagCloud']);
Route::post('tagcloud/{secret}', ['as' => 'tags.submit', 'uses' => 'ModuleController@tagCloudSubmit']);

Route::get('share/{secret}', ['as' => 'module.share', 'uses' => 'ModuleController@share']);


Route::bind('module', function($value) {
    $module = \App\Models\Module::with(['requiredModule'])->where('slug', $value)->first();
    if($module) {
        return $module;
    }
    abort(404);
});


Route::bind('comment', function($value) {
    return \App\Models\Comment::with(['user'])->where('id', $value)->first();
});

Route::post('users', ['as' => 'users.create', 'uses' => 'UserController@createUser']);


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('admin', function() {

});


Route::get('account', ['as' => 'account', 'middleware' => 'auth', 'uses' => 'UserController@account']);
Route::post('account', ['as' => 'account.submit', 'middleware' => 'auth', 'uses' => 'UserController@submitAccount']);
Route::any('email-exists', ['as' => 'account.check-email', 'uses' => 'UserController@checkEmail']);

Route::get('about', ['as' => 'about', function() {
    return view('app.misc.about');
}]);

Route::get('contact', ['as' => 'contact', function() {
    return view('app.misc.contact');
}]);

// Route::get('terms-and-conditions', ['as' => 'terms-and-conditions', function() {
//     return view('app.misc.terms-and-conditions');
// }]);

Route::get('privacy-policy', ['as' => 'privacy-policy', function() {
    return view('app.misc.privacy-terms');
}]);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
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


        Route::get('{id}/comments', ['as' => 'admin.modules.comments', 'uses' => '\App\Admin\Http\Controllers\CommentController@listForModule']);
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
