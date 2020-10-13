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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Reports

Route::namespace('Company')->group(function(){
    Route::post('/Cash/Sales/Report/Fetch','Reports\CashReportsController@FetchReceiptReport');
    Route::post('/Cash/Purchasing/Report/Fetch','Reports\CashReportsController@FetchPaymentReport');
    Route::post('/Invoice/Purchasing/Report/Fetch','Reports\InvoiceReportsController@FetchPurchasingReport');
    Route::post('/Invoice/Sales/Report/Fetch','Reports\InvoiceReportsController@FetchSalesReport');
    Route::post('/Permissions/Receipt/Report/Fetch','Reports\PermissionReportsController@FetchReceiptReport');
    Route::post('/Permissions/Payment/Report/Fetch','Reports\PermissionReportsController@FetchPaymentReport');
    Route::post('/Cheques/Report/Fetch','Reports\ChequesReportsController@FetchChequesReport');
    Route::post('/Suppliers/Report/Fetch','Reports\SuppliersReportController@FetchSuppliersReport');
    Route::post('/Clients/Report/Fetch','Reports\ClientsReportController@FetchClientsReport');
    Route::post('/Items/Report/Fetch','Reports\ItemsReportController@FetchItemsReport');
});

