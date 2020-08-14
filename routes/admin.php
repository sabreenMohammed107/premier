
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
       Route::get('/search_emp', 'AllCompaniesController@search_emp')->name('search_emp');
       Route::get('/search_client', 'AllCompaniesController@search_client')->name('search_client');
       Route::get('/search_sup', 'AllCompaniesController@search_sup')->name('search_sup');


/*********************==user==******************* */
    Route::resource('/users', 'RegisterUsersController');
    Route::get('dynamicdependentCat/fetch', 'RegisterUsersController@fetchCat')->name('dynamicdependentCat.fetch');

/*********************==guid==******************* */
Route::resource('/guid-item', 'GuideItemController');
/*********************==WorkRoleController==******************* */
Route::resource('/work-role', 'WorkRoleController');


});