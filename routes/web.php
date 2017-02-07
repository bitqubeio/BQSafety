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

Auth::routes();

Route::get('/home', 'HomeController@index');

// location
Route::resource('location', 'LocationController');
Route::get('api/locations', 'LocationController@listing');

// company
Route::resource('company', 'CompanyController');
Route::get('api/companies', 'CompanyController@listing');

// report sheet
Route::resource('reportsheet', 'ReportsheetController');
Route::get('api/reportsheets', 'ReportsheetController@listing');
Route::get('reportsheetPDF/{id}', 'ReportsheetController@pdf');

// report sheet all
Route::get('allreportsheets', 'ReportsheetController@all');
Route::get('api/allreportsheets', 'ReportsheetController@allListing');

// users
Route::resource('user', 'UserController');
Route::get('api/users', 'UserController@listing');

