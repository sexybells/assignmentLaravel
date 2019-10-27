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

//User
Auth::routes();

Route::group(['middleware' => ['auth']],function() {

    Route::get('/', function () {
        return redirect('/home');
    });

    Route::get('/home', 'User\HomeController@index')->name('home');
    Route::get('/user/{id}', 'User\UserController@index');
    Route::post('/update_profile/{id}', 'User\UserController@update');
    Route::get('/post/{id}', 'User\PostController@show');
    Route::post('/post', 'User\PostController@store');
    Route::post('/comment_post/{id}', 'User\CommentController@store');
    Route::post('/hide_comment/{id}', 'User\CommentController@destroy');
});



//Admi
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::prefix('/categories')->group(function() {
        Route::get('/list', 'Admin\CategoryController@index');
        Route::get('/add', 'Admin\CategoryController@create');
        Route::post('/add', 'Admin\CategoryController@store');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit');
    });
    Route::prefix('/posts')->group(function() {
        Route::get('/list', 'Admin\PostController@index');
        Route::post('delete/{id}','Admin\PostController@destroy')->name('delete');
    });
    Route::prefix('/comments')->group(function() {
        Route::get('/list', 'Admin\CommentController@index');
        Route::post('/update/{id}', 'Admin\CommentController@update');
    });
    Route::prefix('/users')->group(function() {
        Route::get('/list', 'Admin\UserController@index');
        Route::post('/update/{id}', 'Admin\UserController@update');
    });
});
