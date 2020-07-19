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

Route::get('/login','HomeController@login')->name('login');
Route::post('/login', 'HomeController@postLogin')->name('post-login');

Route::middleware('auth')->group(function(){
    Route::get('/','HomeController@home')->name('home');
    Route::post('/logout','HomeController@logout')->name('logout');

    Route::get('/business-type','HomeController@getBusinessTypes')->name('business-type');
    Route::post('/add-business-type','HomeController@addBusinessType')->name('add-business-type');
    Route::post('/approve-business-type/{id}','HomeController@approveBusinessType')->name('approve-business-type');

    Route::get('/roles', 'HomeController@getRoles')->name('roles');
    
    Route::get('/public-data', 'DataController@getData')->name('public-data');
    Route::get('/add-public-data', 'DataController@addDataView')->name('add-public-data');
    Route::post('/add-data', 'DataController@addData')->name('add-data');
    Route::get('/edit-data/{id}', 'DataController@editData')->name('edit-data');
    Route::get('/view-data/{id}', 'DataController@viewData')->name('view-data');

    Route::post('/save-data/{id}','DataController@saveEditData')->name('save-update-data');
    
    Route::get('/users','HomeController@getUsers')->name('get-users');
    Route::post('/add-user','HomeController@addUser')->name('add-user');
    Route::put('/update-user','HomeController@updateUser')->name('update-user');
});
