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

// Route::get('/', function () {
//     return view('blog/index');
// });

Route::get('/', 'Frontend\IndexController@index');
Route::get('/detail/{id}', 'Frontend\DetailController@index');
Route::get('/category/{id}', 'Frontend\CategoryController@index');
//1 đường dẫn url, 2 file nằm trong controller
Route::get('register', 'RegisterController@register');
Route::post('register', 'RegisterController@create');

Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');

Route::get('logout', 'LogoutController@index');

//create category
Route::get('/blog/category', 'CategoryController@index');
Route::get('/blog/category/create', 'CategoryController@create');
Route::post('blog/category/create', 'CategoryController@store');
Route::get('/blog/category/detail/{id}', 'CategoryController@detail');
Route::get('/blog/category/delete/{id}', 'CategoryController@delete');

//create blog
Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('blog/create', 'BlogController@store');
Route::get('/blog/detail/{id}', 'BlogController@detail');
Route::get('/blog/delete/{id}', 'BlogController@delete');

//edit blog
Route::get('/blog/edit/{id}', 'BlogController@edit');
Route::post('blog/edit/{id}', 'BlogController@update');