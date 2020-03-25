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
Route::prefix('supplier')->name('supplier.')->middleware(['auth'])->group(function () {
    
    Route::get('dashboard', 'supplierDashboardController@showDashboard')->name('dashboard');
    Route::post('supplier-update-own/{id}', 'supplierDashboardController@updateown')->name('update_own');

    Route::get('orders', 'supplierDashboardController@supplierOrders')->name('orders');

    Route::post('update_status/{id}', 'supplierDashboardController@update_status')->name('update_status');
    
});

// Admin
Route::middleware(['admin'])->group(function () {
    Route::get('test', function(){
        return "test Admin middleware";
    });
    
    Route::resource('data', 'DataController');
    Route::resource('tests', 'TestController');
    Route::resource('users', 'UserController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('serviceTypes', 'Service_typeController');
    Route::resource('orderstatuses', 'OrderstatusController');
    Route::resource('orders', 'OrderController');
    Route::resource('areas', 'AreaController');


    Route::get('export', 'MyController@export')->name('export');
    Route::get('importExportView', 'MyController@importExportView');
    Route::post('import', 'MyController@import')->name('import');

    Route::get('import', 'MyController@importExportView')->name("import_csv");

    Route::get('data_distribution', 'DataOperationController@dataDistribution')->name("data_distribution");

});



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');





