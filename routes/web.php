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
// Receipts report
Route::namespace('Company')->group(function(){
    Route::post('/Cash/Sales/Report/Fetch','CashReportsController@FetchReceiptReport');
});

