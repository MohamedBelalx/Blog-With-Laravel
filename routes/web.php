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

Route::get('/test',function(){
    return view('test');
});
Auth::routes();


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::get('/home', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);

    Route::get('/category',[
        'uses'=>'CategoryController@index',
        'as'=>'category'
    ]);

    Route::get('/category/create',[
        'uses'=>'CategoryController@create',
        'as'=>'category.create'
    ]);

    Route::post('/category/store',[
        'uses'=>'CategoryController@store',
        'as'=>'category.store'
    ]);

    Route::get('/category/edit/{id}',[
        'uses'=>'CategoryController@edit',
        'as'=>'category.edit'
    ]);

    Route::get('/category/destroy/{id}',[
        'uses'=>'CategoryController@destroy',
        'as'=>'category.destroy'
    ]);

    Route::post('category/update/{id}',[
        'uses'=>'CategoryController@update',
        'as'=>'category.update'
    ]);
// Posts Route
    Route::get('/post/create',[
        'uses'=>'PostsController@create',
        'as'=>'posts.create'
    ]);
    
    Route::post('/posts/store',[
        'uses'=>'PostsController@store',
        'as'=>'post.store'
    ]);

    Route::post('/posts/update/{id}',[
        'uses'=>'PostsController@update',
        'as'=>'post.update'
    ]);

    Route::get('/posts/destroy/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.destroy'
    ]);
    Route::get('/posts/trashed',[
        'uses'=>'PostsController@trashed',
        'as'=>'posts.trashed'
    ]);

    Route::get('/posts/kill/{id}',[
        'uses'=>'PostsController@kill',
        'as'=>'posts.kill'
    ]);

    Route::get('/posts/restore/{id}',[
        'uses'=>'PostsController@restore',
        'as'=>'posts.restore'
    ]);

    Route::get('/posts/edit/{id}',[
        'uses'=>'PostsController@edit',
        'as'=>'posts.edit'
    ]);

    Route::get('/posts',[
        'uses'=>'PostsController@index',
        'as'=>'posts'
    ]);
});

