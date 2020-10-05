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
    // Receipts report - Payments report (Fetching)
    Route::post('/Cash/Sales/Report/Fetch','CashReportsController@FetchReceiptReport');
    Route::post('/Cash/Purchasing/Report/Fetch','CashReportsController@FetchPaymentReport');
    Route::post('/Invoice/Purchasing/Report/Fetch','InvoiceReportsController@FetchPurchasingReport');
    Route::post('/Invoice/Sales/Report/Fetch','InvoiceReportsController@FetchSalesReport');
});

