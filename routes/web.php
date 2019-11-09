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






Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){

  Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
  ]);

  Route::get('/ToDoMail/{id}', [
    'uses' => 'HomeController@adminmail',
    'as' => 'admail'
  ]);


//users

  Route::get('/users',[
    'uses' => 'UsersController@index',
    'as' => 'users'
  ]);

  Route::get('/users/create',[
    'uses' => 'UsersController@create',
    'as' => 'user.create'
  ]);

  Route::post('/users/store',[
    'uses' => 'UsersController@store',
    'as' => 'user.store'
  ]);

  Route::get('/users/edit/{id}',[
    'uses' => 'UsersController@edit',
    'as' => 'user.edit'
  ]);

  Route::post('/users/update/{id}',[
    'uses' => 'UsersController@update',
    'as' => 'user.update'
  ]);

  Route::get('/users/admin/{id}',[
    'uses' => 'UsersController@admin',
    'as' => 'user.admin'
  ]);

  Route::get('/users/not-admin/{id}',[
    'uses' => 'UsersController@not_admin',
    'as' => 'user.not.admin'
  ]);

  Route::get('/users/profile',[
    'uses' =>'ProfilesController@index',
    'as' =>'user.profile'
  ]);

  Route::get('/users/delete/{id}',[
    'uses' =>'UsersController@destroy',
    'as' =>'user.delete'
  ]);

  Route::post('/users/profile/update',[
    'uses' => 'ProfilesController@update',
    'as' => 'user.profile.update'
  ]);


//Tasks


  Route::get('/tasks',[
    'uses' => 'TaskController@index',
    'as' => 'tasks'
  ]);


    Route::get('/tasksemp/{id}',[
      'uses' => 'TaskController@emp',
      'as' => 'tasksemp'
    ]);

  Route::get('/tasks/create',[
    'uses' => 'TaskController@create',
    'as' => 'task.create'
  ]);

  Route::post('/tasks/store',[
    'uses' => 'TaskController@store',
    'as' => 'task.store'
  ]);

  Route::get('/tasks/edit/{id}',[
    'uses' => 'TaskController@edit',
    'as' => 'task.edit'
  ]);

  Route::post('/tasks/update/{id}',[
    'uses' => 'TaskController@update',
    'as' => 'task.update'
  ]);



  Route::get('/tasks/delete/{id}',[
    'uses' =>'TaskController@destroy',
    'as' =>'task.delete'
  ]);





});
