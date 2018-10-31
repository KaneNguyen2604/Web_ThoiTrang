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
Route::group(['prefix'=>'admin'],function(){   
    Route::group(['prefix'=>'cate'],function(){
		Route::get('list','CateController@getList')->name('ListCate');	
		Route::get('add','CateController@getAdd');
		Route::post('add','CateController@postAdd');			
		Route::get('edit/{id}','CateController@getEdit');
		Route::post('edit/{id}','CateController@postEdit');
		Route::get('delete/{id}','CateController@getDelete');
		

    });
    Route::group(['prefix'=>'product'],function(){
		Route::get('list','ProductController@getList')->name('ListCate');	
		Route::get('add','ProductController@getAdd');
		Route::post('add','ProductController@postAdd');			
		Route::get('edit/{id}','ProductController@getEdit');
		Route::post('edit/{id}','ProductController@postEdit');
		Route::get('delete/{id}','ProductController@getDelete');
		

    });
   
});