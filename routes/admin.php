
<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 
|   \Admin
*/
Route::namespace('Admin')->group(function () {

    Route::get('/', 'AllCompaniesController@home'); 
/*********************==home==******************* */
       Route::resource('/home', 'AllCompaniesController');
       Route::get('/fetch_emp', 'AllCompaniesController@fetch_emp')->name('fetch_emp');
       Route::get('/fetch_client', 'AllCompaniesController@fetch_client')->name('fetch_client');
       Route::get('/fetch_supplier', 'AllCompaniesController@fetch_supplier')->name('fetch_supplier');

/*********************==user==******************* */
    Route::resource('/users', 'RegisterUsersController');
    Route::get('dynamicdependentCat/fetch', 'RegisterUsersController@fetchCat')->name('dynamicdependentCat.fetch');


});