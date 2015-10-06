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

/*These are out here becuase not all of the uses need auth, will auth corretly in the controller when needed.*/
Route::get('/', ['as' => 'home', 'uses' => 'ModuleController@viewModule']);

Route::get('modules/{module}', ['as' => 'modules.view', 'uses' => 'ModuleController@viewModule']);



/*Routes that use the secret from module_users so show public content*/
Route::get('dreamboard/{secret}.png', ['as' => 'dreamboard.show','uses' => 'ModuleController@showDreamboardForSecret']);
Route::get('share/{secret}', ['as' => 'module.share', 'uses' => 'ModuleController@share']);

Route::get('tagcloud/{secret}', ['as' => 'tagcloud', 'uses' => 'ModuleController@tagCloud']);
Route::post('tagcloud/{secret}', ['as' => 'tags.submit', 'uses' => 'ModuleController@tagCloudSubmit']);

Route::get('comment/{comment}/image/{imageName}', ['as' => 'comment.image', 'uses' => 'CommentController@getImage']);


/*Authed routes*/
Route::group(['middleware' => 'auth'], function() {
    Route::get('modules/{module}/forum', ['as' => 'modules.forum', 'uses' => 'ModuleController@viewForum']);


    Route::post('comments/{comment}/reply', ['as' => 'comments.reply', 'uses' => 'CommentController@reply']);
    Route::post('modules/{module}/comment', ['as' => 'modules.comment', 'uses' => 'CommentController@create']);
    Route::delete('comment/{comment}', ['as' => 'modules.comment.delete', 'uses' => 'CommentController@delete']);

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

    Route::get('modules/visualise/dreamboard', ['as' => 'modules.visualise.dreamboard','uses' => 'ModuleController@showDreamboardImage']);

    Route::post('modules/{module}/update', ['as' => 'modules.update', 'uses' => 'ModuleController@updateModule']);
    Route::post('modules/{module}/complete', ['as' => 'modules.complete', 'uses' => 'ModuleController@completeModule']);



    Route::get('account', ['as' => 'account', 'middleware' => 'auth', 'uses' => 'UserController@account']);
    Route::post('account', ['as' => 'account.submit', 'middleware' => 'auth', 'uses' => 'UserController@submitAccount']);

    Route::get('payments/pay', ['as' => 'payment', 'middleware' => 'auth','uses' => 'PaymentController@pay']);

    Route::any('payments/return', ['as' => 'payments.return_url', 'middleware' => 'auth', 'uses' => 'PaymentController@completePayment']);
    Route::any('payments/failure', ['as' => 'payments.fail', 'middleware' => 'auth', 'uses' => 'PaymentController@paymentFailed']);
});







/* Routes model bindings */
Route::bind('module', function($value) {
    if(empty($value)) {
        $value = 'home';
    }
    $module = \App\Models\Module::with(['requiredModule'])->where('slug', $value)->first();
    if($module) {
        return $module;
    }
    abort(404);
});


Route::bind('comment', function($value) {
    return \App\Models\Comment::with(['user'])->where('id', $value)->first();
});

/*End route model bindings*/



/*Auth Routes*/
Route::get('login', ['as' => 'auth.login','uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'auth.logout','uses' => 'Auth\AuthController@getLogout']);

Route::post('users', ['as' => 'users.create', 'uses' => 'UserController@createUser']);

Route::any('email-exists', ['as' => 'account.check-email', 'uses' => 'UserController@checkEmail']);

Route::get('forgot-password', ['as' => 'auth.forgot-password', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('forgot-password', ['uses' => 'Auth\PasswordController@postEmail']);

Route::get('reset-password/{token}', ['as' => 'auth.reset-password', 'uses' => 'Auth\PasswordController@getReset']);
Route::post('reset-password', ['as' => 'auth.post-reset', 'uses' => 'Auth\PasswordController@postReset']);


/*Misc Pages*/
Route::get('about', ['as' => 'about', function() {
    return view('app.misc.about', ['page'=>'about']);
}]);

Route::get('about-paula-gosney', ['as' => 'about-paula-gosney', function() {
    return view('app.misc.about-paula-gosney', ['page'=>'about-paula-gosney']);
}]);

Route::get('contact', ['as' => 'contact', function() {
    return view('app.misc.contact', ['page'=>'contact']);
}]);

Route::get('privacy-terms', ['as' => 'privacy-terms', function() {
    return view('app.misc.privacy-terms');
}]);


/*Admin routes*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function() {
    Route::get('/', ['as' => 'admin.home', 'uses' => '\App\Admin\Http\Controllers\DashboardController@getIndex']);

    Route::group(['prefix' => 'users'], function() {
        Route::get('', ['as' => 'admin.users.list', 'uses' => '\App\Admin\Http\Controllers\UserController@getList']);
        Route::get('/create', ['as' => 'admin.users.create', 'uses' => '\App\Admin\Http\Controllers\UserController@getCreate']);
        Route::post('/create', ['as' => 'admin.users.post-create', 'uses' => '\App\Admin\Http\Controllers\UserController@postCreate']);
        Route::get('/{user}/edit', ['as' => 'admin.users.edit', 'uses' => '\App\Admin\Http\Controllers\UserController@getEdit']);
        Route::post('/{user}/edit', ['as' => 'admin.users.update', 'uses' => '\App\Admin\Http\Controllers\UserController@postUpdate']);
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
