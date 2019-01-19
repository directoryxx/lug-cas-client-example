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
Route::get('/login', 'TestController@login');
Route::get('/home', 'TestController@home');

Route::group(['middleware' => 'admin'], function()
{
    Route::get('/admin', 'TestController@admin')->name("admintest");
   
});


Route::group(['middleware' => 'member'], function()
{
    Route::get('/member', 'TestController@member')->name("membertest");
    
});