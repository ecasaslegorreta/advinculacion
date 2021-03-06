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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('positions', 'PositionController');
Route::resource('senders', 'SenderController');
Route::resource('correspondences','CorrespondenceController');

Route::resource('shifteds', 'ShiftedController')->except(['create']);
Route::get('sfifted/create/{correspondece_id}', 'ShiftedController@create')->name('shifteds.create');

Route::resource('offices', 'OfficeController');
Route::resource('documents', 'DocumentController');
