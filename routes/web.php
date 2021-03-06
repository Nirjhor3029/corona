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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', 'MyController@export')->name('export');


Auth::routes();


// User
Route::prefix('supplier')->name('supplier.')->middleware(['auth'])->group(function () {
    
    Route::get('settings', 'supplierDashboardController@showDashboard')->name('dashboard');
    Route::get('dashboard', 'supplierDashboardController@showDashboard2')->name('dashboard2');
    Route::post('supplier-update-own/{id}', 'supplierDashboardController@updateown')->name('update_own');

    Route::get('orders', 'supplierDashboardController@supplierOrders')->name('orders');
    Route::get('orders/getSelectOption/{getByData}/{dataId}', 'supplierDashboardController@getSelectOption')->name('getSelectOption');


    Route::get('orders/status/{statusId}', 'supplierDashboardController@supplierOrdersByStatus')->name('ordersByStatus');
    Route::get('order-summery', 'supplierDashboardController@orderSummery')->name('order_summery');
    Route::get('order-summery/status/{statusId}', 'supplierDashboardController@orderSummeryByStatus')->name('order_summeryByStatus');

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

    Route::get('orders/status/{status_id}',"OrderController@ordersByStatus")->name('ordersByStatus');
    Route::get('orders/order/deleteAll',"OrderController@deleteAll")->name('orders.deleteAll');
    Route::get('orders/order/redistribute',"OrderController@redistribute")->name('orders.redistribute');
    Route::get('datas/data/deleteAll',"DataController@deleteAll")->name('datas.deleteAll');


    Route::get('export', 'MyController@export')->name('export');
    Route::get('importExportView', 'MyController@importExportView');
    Route::post('import', 'MyController@import')->name('import');

    Route::get('import', 'MyController@importExportView')->name("import_csv");

    Route::get('data_distribution', 'DataOperationController@dataDistribution')->name("data_distribution");

});



Auth::routes(
    [
        'verify' => true,
        'register' => false,
    ]
);

Route::get('/home', 'HomeController@index')->middleware('verified');







Route::resource('districts', 'DistrictController');

Route::resource('thanas', 'ThanaController');

Route::resource('unions', 'UnionController');

Route::resource('divisions', 'DivisionsController');

Route::resource('upazillas', 'UpazillaController');