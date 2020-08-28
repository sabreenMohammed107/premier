
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


        //Items
    //Items->all()
    Route::get('/Company/Items','ItemsController@Items');
    Route::get('/Company/Items/{id}/{type}','ItemsController@ItemsData');
    Route::get('/Company/Items/Add','ItemsController@AddItems');
    //->client_update
    Route::post('/Company/Item/{id}/Update','ItemsController@UpdateItems');
    //->client_add
    Route::post('/Company/Item/Create','ItemsController@CreateItems');
    //->client_delete
    Route::get('/Company/Item/{id}/Delete','ItemsController@DeleteItems');

    //Search results routes
    //->Search employees - Suppliers - Clients
    Route::get('/Company/{type}/Search','CompaniesController@Search');

    //Employees
    //Employee->all()
    Route::get('/Company/Employees','PersonsController@Employees');
    Route::get('/Company/Employees/{id}/{type}','PersonsController@EmployeesData');
    Route::get('/Company/Employees/{type}','PersonsController@AddEmployees');
    //->employee_update
    Route::post('/Company/Employee/{id}/Update','PersonsController@UpdateEmployees');
    //->employee_add
    Route::post('/Company/Employee/Create','PersonsController@CreateEmployees');
    //->employee_delete
    Route::get('/Company/Employee/{id}/Delete','PersonsController@DeleteEmployees');

    //Suppliers
    //Supplier->all()
    Route::get('/Company/Suppliers','PersonsController@Suppliers');
    Route::get('/Company/Suppliers/{id}/{type}','PersonsController@SuppliersData');
    Route::get('/Company/Suppliers/{type}','PersonsController@AddSuppliers');
    //->supplier_update
    Route::post('/Company/Supplier/{id}/Update','PersonsController@UpdateSuppliers');
    //->supplier_add
    Route::post('/Company/Supplier/Create','PersonsController@CreateSuppliers');
    //->supplier_delete
    Route::get('/Company/Supplier/{id}/Delete','PersonsController@DeleteSuppliers');

    //Clients
    //Client->all()
    Route::get('/Company/Clients','PersonsController@Clients');
    Route::get('/Company/Clients/{id}/{type}','PersonsController@ClientsData');
    Route::get('/Company/Clients/{type}','PersonsController@AddClients');
    //->client_update
    Route::post('/Company/Client/{id}/Update','PersonsController@UpdateClients');
    //->client_add
    Route::post('/Company/Client/Create','PersonsController@CreateClients');
    //->client_delete
    Route::get('/Company/Client/{id}/Delete','PersonsController@DeleteClients');

    //Company edit route (special case -> sec needs)
    Route::get('/Company/edit','CompaniesController@edit');
    //Company resource routes
    Route::resource('/Company', 'CompaniesController');

    //Company Safe (Add - Edit)
    Route::post('/Company/Add/Safe','CompaniesController@AddSafe');
    Route::post('/Company/Edit/Safe','CompaniesController@EditSafe');

    //Company Bank (Add - Edit)
    Route::post('/Company/Add/Bank','CompaniesController@AddBank');
    Route::post('/Company/Edit/Bank','CompaniesController@EditBank');

    /*
    |*********************** Invoices Partition ****************************|
    |**************|Purchasing Partition| - |Sales Partition|***************|
    */

    //Allinv(purch - sales);
    Route::get('/Invoices/Purchasing','PurchasingController@Invoices');
    Route::get('/Invoices/Sales','SalesController@Invoices');
    //Add new
    Route::get('/Invoices/Purchasing/Add','PurchasingController@AddInvoice');
    Route::get('/Invoices/Sales/Add','SalesController@AddInvoice');
    //->sub routes
    Route::get('Invoice/Purchasing/AddRow','PurchasingController@AddRow');
    Route::get('/Invoice/Purchasing/Add/fetch/{type}','PurchasingController@FetchPerson');
    Route::get('/Invoice/Sales/Add/fetch/{type}','SalesController@FetchPerson');
    //create new
    Route::post('/Invoices/Purchasing/Create','PurchasingController@CreateInvoice');
    Route::post('/Invoices/Sales/Create','SalesController@CreateInvoice');
    //(Edit - View) an invoice
    Route::get('/Invoices/Purchasing/{inv_id}/Edit','PurchasingController@EditInvoice');
    Route::get('/Invoices/Purchasing/FetchItems','PurchasingController@FetchItems');
    Route::get('/Invoices/Purchasing/{inv_id}/Remove/{id}','PurchasingController@DeleteInvoiceItem');
    Route::post('/Invoices/Purchasing/Update','PurchasingController@UpdateInvoice');
    Route::get('/Invoices/Sales/{inv_id}/Edit','SalesController@EditInvoice');
    Route::get('/Invoices/Sales/{inv_id}/Remove/{id}','SalesController@DeleteInvoiceItem');
    Route::post('/Invoices/Sales/Update','SalesController@UpdateInvoice');
    Route::get('/Invoices/{type}/{id}/Delete','PurchasingController@DeleteInvoice');
    Route::get('/Invoices/Purchasing/{inv_id}/View','PurchasingController@ViewInvoice');
    Route::get('/Invoices/Sales/{inv_id}/View','SalesController@ViewInvoice');
});
