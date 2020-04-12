<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('bookshelf', 'BookShelfController@index');
Route::post('bookshelf', 'BookShelfController@createShelf');
Route::get('edit/{id}', 'BookShelfController@edit');
Route::post('update/{id}', 'BookShelfController@update');
Route::delete('delete/{id}', 'BookShelfController@delete');
Route::get('/getBooksByshelf/{id}','BookShelfController@getBooksByshelf');

Route::get('books', 'BookController@index');
Route::post('books', 'BookController@createBook');
Route::get('edit/{id}', 'BookController@edit');
Route::post('update/{id}', 'BookController@update');
Route::delete('delete/{id}', 'BookController@delete');