<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/','ShoppingsController@index');


Route::resource('shoppings','ShoppingsController',['names' => 'shoppings']);
Route::get('/shopping/search','ShoppingsController@search')->name('shoppings.search');

