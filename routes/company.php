
<?php
/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
|
|
|   \Company
*/

Route::namespace('Company')->middleware('CompanyUser')->group(function () {

    Route::middleware(['HasCompanyData'])->group(function () {
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
    });


    //Company edit route (special case -> sec needs)
    Route::get('/Company/edit','CompaniesController@edit');
    Route::post('/Company/edit','CompaniesController@edit');
    //Company resource routes
    Route::resource('/Company', 'CompaniesController');

    //Company Safe (Add - Edit)
    Route::post('/Company/Add/Safe','CompaniesController@AddSafe');
    Route::post('/Company/Edit/Safe','CompaniesController@EditSafe');

    //Company Bank (Add - Edit)
    Route::post('/Company/Add/Bank','CompaniesController@AddBank');
    Route::post('/Company/Edit/Bank','CompaniesController@EditBank');

    //Report suppliers
    Route::get('/Suppliers/Report/Create','Reports\SuppliersReportController@SuppliersReport');
    Route::get('/Clients/Report/Create','Reports\ClientsReportController@ClientsReport');
    Route::get('/Items/Report/Create','Reports\ItemsReportController@ItemsReport');

    Route::middleware(['HasInvoices'])->group(function () {
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
        Route::get('/Invoices/Purchasing/Remove/Item','PurchasingController@DeleteInvoiceItem');
        Route::post('/Invoices/Purchasing/Update','PurchasingController@UpdateInvoice');
        Route::get('/Invoices/Sales/{inv_id}/Edit','SalesController@EditInvoice');
        Route::get('/Invoices/Sales/{inv_id}/Remove/{id}','SalesController@DeleteInvoiceItem');
        Route::post('/Invoices/Sales/Update','SalesController@UpdateInvoice');
        Route::get('/Invoices/{type}/{id}/Delete','PurchasingController@DeleteInvoice');
        Route::get('/Invoices/Purchasing/{inv_id}/View','PurchasingController@ViewInvoice');
        Route::get('/Invoices/Sales/{inv_id}/View','SalesController@ViewInvoice');
        // Reports
        //Purchasing - Sales
        Route::get('/Invoices/Purchasing/Report/Create','Reports\InvoiceReportsController@PurchasingReport');
        Route::get('/Invoices/Sales/Report/Create','Reports\InvoiceReportsController@SalesReport');
    });


    Route::middleware(['HasCash'])->group(function () {
        /*
        |*********************** Cash Partition ****************************|
        |**************|Purchasing Partition| - |Sales Partition|***************|
        */
        //--|Purchasing Partition|--
        Route::get('/Cash/Purchasing','PaymentsController@Index');
        Route::get('/Cash/Purchasing/Add','PaymentsController@Add');
        Route::get('/Cash/Purchasing/Edit/{cash_id}','PaymentsController@Edit');
        Route::get('/Cash/Purchasing/View/{cash_id}','PaymentsController@View');
        Route::post('/Cash/Purchasing/Create','PaymentsController@Create');
        Route::post('/Cash/Purchasing/{cash_id}/Update','PaymentsController@Update');
        Route::get('/Cash/Purchasing/{cash_id}/Delete','PaymentsController@Delete');
        //--|Sales Partition|--
        Route::get('/Cash/Sales','ReceiptsController@Index');
        Route::get('/Cash/Sales/Add','ReceiptsController@Add');
        Route::get('/Cash/Sales/Edit/{cash_id}','ReceiptsController@Edit');
        Route::get('/Cash/Sales/View/{cash_id}','ReceiptsController@View');
        // Route::get('/Cash/Sales/{type}','ReceiptsController@FetchPerson');
        Route::post('/Cash/Sales/Create','ReceiptsController@Create');
        Route::post('/Cash/Sales/{cash_id}/Update','ReceiptsController@Update');
        Route::get('/Cash/Sales/{cash_id}/Delete','ReceiptsController@Delete');

        /**
         *
         * Cash Reports for Company
         *
         */
        Route::get('/Cash/Sales/Report/Create','Reports\CashReportsController@ReceiptsReport');
        Route::get('/Cash/Purchasing/Report/Create','Reports\CashReportsController@PaymentsReport');
        /**
         *
         * Permissions reports
         *
         */
        Route::get('/Permissions/Receipt/Report/Create','Reports\PermissionReportsController@ReceiptsReport');
        Route::get('/Permissions/Payment/Report/Create','Reports\PermissionReportsController@PaymentsReport');


    });
    Route::middleware(['HasCheques'])->group(function () {
        /*
        |*********************** Cheques Partition ****************************|
        */

        Route::get('/Cheques','ChequesController@index');
        Route::get('/Cheques/Add','ChequesController@Add');
        Route::get('/Cheques/{cash_id}/Edit','ChequesController@Edit');
        Route::get('/Cheques/{cash_id}/View','ChequesController@View');
        Route::get('/Cheques/{cash_id}/Delete','ChequesController@Delete');
        Route::post('/Cheques/Create','ChequesController@Create');
        Route::post('/Cheques/Update','ChequesController@Update');
        Route::get('/Cheques/Report/Create','Reports\ChequesReportsController@ChequesReport');


    });

});
