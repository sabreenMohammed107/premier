
<?php
/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
|
|
|   \Company
*/
Route::namespace('Company')->group(function () {

    // Route::get('/Companies', function () {
    //     return view('Company.home.index');
    // });

    //Company resource routes
    Route::resource('/Company', 'CompaniesController');
    //Company Safe (Add - Edit)
    Route::post('/Company/{id}/Add/Safe','CompaniesController@AddSafe');
    Route::post('/Company/{id}/Edit/Safe','CompaniesController@EditSafe');

});
