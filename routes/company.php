
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

    //Company Bank (Add - Edit)
    Route::post('/Company/{id}/Add/Bank','CompaniesController@AddBank');
    Route::post('/Company/{id}/Edit/Bank','CompaniesController@EditBank');

    //Search results routes
    //->Search employees - Suppliers - Clients
    Route::get('/Company/{type}/Search','CompaniesController@Search');

    //Employees
    //Employee->all()
    Route::get('/Company/{id}/Employees','PersonsController@Employees');
    Route::get('/Company/{compid}/Employees/{id}/{type}','PersonsController@EmployeesData');
    Route::get('/Company/{compid}/Employees/{type}','PersonsController@AddEmployees');
    //->employee_update
    Route::post('/Company/{CompanyId}/Employee/{id}/Update','PersonsController@UpdateEmployees');
    //->employee_add
    Route::post('/Company/{CompanyId}/Employee/Create','PersonsController@CreateEmployees');
    //->employee_delete
    Route::get('/Company/Employee/{id}/Delete','PersonsController@DeleteEmployees');

    //Suppliers
    //Supplier->all()
    Route::get('/Company/{id}/Suppliers','PersonsController@Suppliers');
    Route::get('/Company/{compid}/Suppliers/{id}/{type}','PersonsController@SuppliersData');
    Route::get('/Company/{compid}/Suppliers/{type}','PersonsController@AddSuppliers');
    //->supplier_update
    Route::post('/Company/{CompanyId}/Supplier/{id}/Update','PersonsController@UpdateSuppliers');
    //->supplier_add
    Route::post('/Company/{CompanyId}/Supplier/Create','PersonsController@CreateSuppliers');
    //->supplier_delete
    Route::get('/Company/Supplier/{id}/Delete','PersonsController@DeleteSuppliers');

    //Clients
    //Client->all()
    Route::get('/Company/{id}/Clients','PersonsController@Clients');
    Route::get('/Company/{compid}/Clients/{id}/{type}','PersonsController@ClientsData');
    Route::get('/Company/{compid}/Clients/{type}','PersonsController@AddClients');
    //->client_update
    Route::post('/Company/{CompanyId}/Client/{id}/Update','PersonsController@UpdateClients');
    //->client_add
    Route::post('/Company/{CompanyId}/Client/Create','PersonsController@CreateClients');
    //->client_delete
    Route::get('/Company/Client/{id}/Delete','PersonsController@DeleteClients');

    //Items
    //Items->all()
    Route::get('/Company/{id}/Items','ItemsController@Items');
    Route::get('/Company/{compid}/Items/{id}/{type}','ItemsController@ItemsData');
    Route::get('/Company/{compid}/Items/Add','ItemsController@AddItems');
    //->client_update
    Route::post('/Company/{CompanyId}/Item/{id}/Update','ItemsController@UpdateItems');
    //->client_add
    Route::post('/Company/{CompanyId}/Item/Create','ItemsController@CreateItems');
    //->client_delete
    Route::get('/Company/Item/{id}/Delete','ItemsController@DeleteItems');

});
