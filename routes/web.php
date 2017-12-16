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
    return view('client.home');
});
Auth::routes();

Route::view('/mh-login','client.login');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/fff',function(){
    return 'hello world with git';
});

Route::namespace('Admin')->prefix('admin')->group(function (){
    $this->get('/','PanelController@index');
    $this->resource('categories','CategoriesController');
    $this->resource('courses','CoursesController');
    $this->resource('exams','ExamsController');
});
