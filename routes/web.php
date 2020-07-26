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
    Route::put('/edit-business-type', 'HomeController@editBusinessType')->name('edit-business-type');

    Route::get('/roles', 'HomeController@getRoles')->name('roles');
    Route::post('/add-role','HomeController@addRole')->name('add-role');
    Route::put('/update-role','HomeController@updateRole')->name('update-role');
    Route::delete('/delete-role','HomeController@deleteRole')->name('delete-role');
    
    Route::get('/public-data', 'DataController@getData')->name('public-data');
    Route::get('/add-public-data', 'DataController@addDataView')->name('add-public-data');
    Route::post('/add-data', 'DataController@addData')->name('add-data');
    Route::get('/edit-data/{id}', 'DataController@editData')->name('edit-data');
    Route::get('/view-data/{id}', 'DataController@viewData')->name('view-data');
    Route::get('/verify-data/{id}','DataController@verifyData')->name('verify-data');

    Route::post('/save-data/{id}','DataController@saveEditData')->name('save-update-data');
    
    Route::get('/users','HomeController@getUsers')->name('get-users');
    Route::post('/add-user','HomeController@addUser')->name('add-user');
    Route::put('/update-user','HomeController@updateUser')->name('update-user');

    Route::get('/report', 'HomeController@getReports')->name('reports');
});
