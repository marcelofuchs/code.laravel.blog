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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*Route::get('test', function () {
    return "olá mundo";
});*/

Route::get('ola/{nome}', 'TestController@index');
Route::get('notas', 'TestController@notas');
Route::get('/', 'PostController@index');

Route::get('/auth',function(){
    //$user = \App\User::find(1);
    //Auth::login($user);

    if(Auth::attempt(['email'=>'marcelof29@gmail.com','password'=>'123456']))
    {
        return "logado";

    }

    return "falhou";
    /*if(Auth::check()){
        return "logado";
    }*/
});
Route::get('/auth/logout',function(){
    Auth::logout();
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::group(['prefix'=>'post'],function(){
        Route::get('/', ['as'=>'admin.post.index','uses'=>'PostAdminController@index']);
        Route::get('create', ['as'=>'admin.post.create','uses'=>'PostAdminController@create']);
        Route::post('store', ['as'=>'admin.post.store','uses'=>'PostAdminController@store']);
        Route::get('edit/{id}', ['as'=>'admin.post.edit','uses'=>'PostAdminController@edit']);
        Route::put('update/{id}', ['as'=>'admin.post.update','uses'=>'PostAdminController@update']);
        Route::get('destroy/{id}', ['as'=>'admin.post.destroy','uses'=>'PostAdminController@destroy']);
    });
});