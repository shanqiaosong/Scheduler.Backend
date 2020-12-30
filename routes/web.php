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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test/hello',function (){
    return 'Hello World';
});


Route::resource('class_infos','App\Http\Controllers\ClassInfoController');
Route::resource('ddls', 'App\Http\Controllers\DdlController');
Route::resource('accounts','App\Http\Controllers\AccountController');
Route::resource('accounts','App\Http\Controllers\ClassTimeController');

