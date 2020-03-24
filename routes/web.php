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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', 'MyController@export')->name('export');


Auth::routes();


// User
Route::middleware(['auth'])->group(function () {
    Route::get('export', 'MyController@export')->name('export');
    Route::get('importExportView', 'MyController@importExportView');
    Route::post('import', 'MyController@import')->name('import');
    
    Route::resource('areas', 'AreaController');
});

// Admin
Route::middleware(['admin'])->group(function () {
    Route::get('test', function(){
        return "test Admin middleware";
    });
});



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');



Route::resource('tests', 'TestController');

Route::resource('users', 'UserController');

Route::resource('suppliers', 'SupplierController');

Route::resource('serviceTypes', 'Service_typeController');

Route::resource('orderstatuses', 'OrderstatusController');