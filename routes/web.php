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


Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');






Route::prefix('blog')->group(function () {
	Route::get('list/{id}', 'ArticlesController@listArticle');
	Route::get('edit/{id}', 'ArticlesController@editArticle');
	Route::post('edit/{id}', 'ArticlesController@editArticle');
	Route::get('add', 'ArticlesController@addArticle');
	Route::post('add', 'ArticlesController@addArticle');
	Route::get('delete', 'ArticlesController@deleteArticle');
});

