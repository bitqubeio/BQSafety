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

// entrust
Route::group(['middleware' => ['auth']], function () {

    /*
    |--------------------------------------------------------------------------
    | HOME
    |--------------------------------------------------------------------------
    */

    //Route::get('/home', 'HomeController@index');
    Route::get('/home', 'DashboardController@home');

    /*
    |--------------------------------------------------------------------------
    | ROLES
    |--------------------------------------------------------------------------
    */

    Route::get('api/roles', ['as' => 'roles.listing', 'uses' => 'RoleController@listing', 'middleware' => ['permission:role-list']]);
    Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list']]);
    Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
    Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
    Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
    Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);

    /*
    |--------------------------------------------------------------------------
    | MY REPORTS SHEETS
    |--------------------------------------------------------------------------
    */

    // list json
    Route::get('api/reportsheets', ['as' => 'reportsheet.listing', 'uses' => 'ReportsheetController@listing', 'middleware' => ['permission:my-reportsheet-list']]);
    // index
    Route::get('reportsheet', ['as' => 'reportsheet.index', 'uses' => 'ReportsheetController@index', 'middleware' => ['permission:my-reportsheet-list']]);
    // create
    Route::get('reportsheet/create', ['as' => 'reportsheet.create', 'uses' => 'ReportsheetController@create', 'middleware' => ['permission:my-reportsheet-create']]);
    // store
    Route::post('reportsheet/create', ['as' => 'reportsheet.store', 'uses' => 'ReportsheetController@store', 'middleware' => ['permission:my-reportsheet-create']]);
    // show
    Route::get('reportsheet/{id}', ['as' => 'reportsheet.show', 'uses' => 'ReportsheetController@show', 'middleware' => ['permission:my-reportsheet-list']]);
    // PDF show
    Route::get('myreportsheetPDFShow/{id}', ['as' => 'reportsheetPDFShow.pdfShow', 'uses' => 'ReportsheetController@pdfShow', 'middleware' => ['permission:my-reportsheet-export-pdf']]);
    // PDF download
    Route::get('myreportsheetPDFDownload/{id}', ['as' => 'reportsheetPDFDownload.pdfDownload', 'uses' => 'ReportsheetController@pdfDownload', 'middleware' => ['permission:my-reportsheet-export-pdf']]);
    // PDF with image
    Route::get('myreportsheetPDFDownloadWithImage/{id}', ['as' => 'reportsheetPDFDownloadWithImage.pdfDownloadWithImage', 'uses' => 'ReportsheetController@pdfDownloadWithImage', 'middleware' => ['permission:my-reportsheet-export-pdf']]);

    /*
    |--------------------------------------------------------------------------
    | COMPANIES
    |--------------------------------------------------------------------------
    */

    // list json
    Route::get('api/companies', ['as' => 'company.listing', 'uses' => 'CompanyController@listing', 'middleware' => ['permission:company-list']]);
    // index
    Route::get('company', ['as' => 'company.index', 'uses' => 'CompanyController@index', 'middleware' => ['permission:company-list']]);
    // create
    Route::get('company/create', ['as' => 'company.create', 'uses' => 'CompanyController@create', 'middleware' => ['permission:company-create']]);
    // store
    Route::post('company/create', ['as' => 'company.store', 'uses' => 'CompanyController@store', 'middleware' => ['permission:company-create']]);
    // show
    Route::get('company/{id}', ['as' => 'company.show', 'uses' => 'CompanyController@show', 'middleware' => ['permission:company-list']]);
    // edit
    Route::get('company/{id}/edit', ['as' => 'company.edit', 'uses' => 'CompanyController@edit', 'middleware' => ['permission:company-edit']]);
    // update
    Route::patch('company/{id}', ['as' => 'company.update', 'uses' => 'CompanyController@update', 'middleware' => ['permission:company-edit']]);
    // destroy
    Route::delete('company/{id}', ['as' => 'company.destroy', 'uses' => 'CompanyController@destroy', 'middleware' => ['permission:company-delete']]);

    /*
    |--------------------------------------------------------------------------
    | LOCATIONS
    |--------------------------------------------------------------------------
    */

    // list json
    Route::get('api/locations', ['as' => 'location.listing', 'uses' => 'LocationController@listing', 'middleware' => ['permission:location-list']]);
    //index
    Route::get('location', ['as' => 'location.index', 'uses' => 'LocationController@index', 'middleware' => ['permission:location-list']]);
    // create
    Route::get('location/create', ['as' => 'location.create', 'uses' => 'LocationController@create', 'middleware' => ['permission:location-create']]);
    // store
    Route::post('location/create', ['as' => 'location.store', 'uses' => 'LocationController@store', 'middleware' => ['permission:location-create']]);
    // show
    Route::get('location/{id}', ['as' => 'location.show', 'uses' => 'LocationController@show', 'middleware' => ['permission:location-list']]);
    // edit
    Route::get('location/{id}/edit', ['as' => 'location.edit', 'uses' => 'LocationController@edit', 'middleware' => ['permission:location-edit']]);
    // update
    Route::patch('location/{id}', ['as' => 'location.update', 'uses' => 'LocationController@update', 'middleware' => ['permission:location-edit']]);
    // destroy
    Route::delete('location/{id}', ['as' => 'location.destroy', 'uses' => 'LocationController@destroy', 'middleware' => ['permission:location-delete']]);

    /*
    |--------------------------------------------------------------------------
    | REPORT SHEETS ALL
    |--------------------------------------------------------------------------
    */

    // list json
    Route::get('api/allreportsheets', ['as' => 'reportsheets.listing', 'uses' => 'ReportsheetController@allListing', 'middleware' => ['permission:reportsheet-list']]);
    // index
    Route::get('reportsheets', ['as' => 'reportsheets.all', 'uses' => 'ReportsheetController@all', 'middleware' => ['permission:reportsheet-list']]);
    // show
    Route::get('reportsheets/{id}', ['as' => 'reportsheets.shows', 'uses' => 'ReportsheetController@shows', 'middleware' => ['permission:reportsheet-list']]);
    // PDF show
    Route::get('reportsheetPDFShow/{id}', ['as' => 'reportsheetPDFShow.pdfShow', 'uses' => 'ReportsheetController@pdfShow', 'middleware' => ['permission:reportsheet-export-pdf']]);
    // PDF download
    Route::get('reportsheetPDFDownload/{id}', ['as' => 'reportsheetPDFDownload.pdfDownload', 'uses' => 'ReportsheetController@pdfDownload', 'middleware' => ['permission:reportsheet-export-pdf']]);
    // PDF with image
    Route::get('reportsheetPDFDownloadWithImage/{id}', ['as' => 'reportsheetPDFDownloadWithImage.pdfDownloadWithImage', 'uses' => 'ReportsheetController@pdfDownloadWithImage', 'middleware' => ['permission:reportsheet-export-pdf']]);

    /*
    |--------------------------------------------------------------------------
    | USERS
    |--------------------------------------------------------------------------
    */

    // json api
    Route::get('api/users', ['as' => 'users.listing', 'uses' => 'UserController@listing', 'middleware' => ['permission:users-list']]);
    // index
    Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index', 'middleware' => ['permission:users-list']]);
    // show
    Route::get('users/{id}', ['as' => 'users.show', 'uses' => 'UserController@show', 'middleware' => ['permission:users-list']]);
    // edit
    Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit', 'middleware' => ['permission:users-edit']]);
    // update
    Route::patch('users/{id}', ['as' => 'users.update', 'uses' => 'UserController@update', 'middleware' => ['permission:users-edit']]);
    // destroy
    Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy', 'middleware' => ['permission:users-delete']]);

    /*
    |--------------------------------------------------------------------------
    | TRACKING
    |--------------------------------------------------------------------------
    */

    //Route::resource('TrackingReportSheet', 'TrackingReportSheetController');
    // json api
    Route::get('api/listTrackingReportSheets/{type}', ['as' => 'listTrackingReportSheets.listTrackingReportSheets', 'uses' => 'ReportsheetController@listTrackingReportSheets', 'middleware' => ['permission:tracking-list']]);
    // view tracking
    Route::get('trackingreportsheets/{type}', ['as' => 'trackingreportsheets.trackingReportSheets', 'uses' => 'ReportsheetController@trackingReportSheets', 'middleware' => ['permission:tracking-list']]);
    // create
    //Route::get('TrackingReportSheet', ['as' => 'TrackingReportSheet.create', 'uses' => 'TrackingReportSheetController@create', 'middleware' => ['permission:tracking-create']]);
    // store
    Route::post('TrackingReportSheet', ['as' => 'TrackingReportSheet.store', 'uses' => 'TrackingReportSheetController@store', 'middleware' => ['permission:tracking-create']]);
    // edit
    Route::get('TrackingReportSheet/{id}/edit', ['as' => 'TrackingReportSheet.edit', 'uses' => 'TrackingReportSheetController@edit', 'middleware' => ['permission:tracking-edit']]);
    // update
    Route::patch('TrackingReportSheet/{id}', ['as' => 'TrackingReportSheet.update', 'uses' => 'TrackingReportSheetController@update', 'middleware' => ['permission:tracking-edit']]);

});

