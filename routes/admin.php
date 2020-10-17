
<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
|   \Admin
*/
Route::namespace('Company')->group(function () {
    Route::get('/Admin/Cash/Sales/Report/Create', 'Reports\CashReportsController@ReceiptsReport');
    Route::get('/Admin/Cash/Purchasing/Report/Create', 'Reports\CashReportsController@PaymentsReport');
    Route::get('/Cash/Sales/Fetch/Persons/{type}', 'Reports\ReceiptsController@FetchPerson');
    Route::get('/Admin/Invoices/Purchasing/Report/Create', 'Reports\InvoiceReportsController@PurchasingReport');
    Route::get('/Admin/Invoices/Sales/Report/Create', 'Reports\InvoiceReportsController@SalesReport');
    Route::get('/Admin/Permissions/Receipt/Report/Create', 'Reports\PermissionReportsController@ReceiptsReport');
    Route::get('/Admin/Permissions/Payment/Report/Create', 'Reports\PermissionReportsController@PaymentsReport');
    Route::get('/Admin/Cheques/Report/Create', 'Reports\ChequesReportsController@ChequesReport');
    Route::get('/Admin/Suppliers/Report/Create', 'Reports\SuppliersReportController@SuppliersReport');
    Route::get('/Admin/Clients/Report/Create', 'Reports\ClientsReportController@ClientsReport');
    Route::get('/Admin/Items/Report/Create', 'Reports\ItemsReportController@ItemsReport');
});


/*

*/
Route::namespace('Admin')->group(function ()  {
   //Reports
    //client report

    Route::resource('/Company-client-report', 'Reports\ClientReportController');
    Route::get('/Company-dynamicCompany-clientReport.fetch', 'Reports\ClientReportController@companyFetch')->name('Company-dynamicCompany-clientReport.fetch');
    //supplier report
    Route::resource('/Company-supplier-report', 'Reports\SuppliersReportController');
    Route::get('/Company-dynamicCompany-supplierReport.fetch', 'Reports\SuppliersReportController@companyFetch')->name('Company-dynamicCompany-supplierReport.fetch');

    //employee report
    Route::resource('/Company-employee-report', 'Reports\EmployeesReportController');
    Route::get('/Company-dynamicCompany-empolyeeReport.fetch', 'Reports\EmployeesReportController@companyFetch')->name('Company-dynamicCompany-employeeReport.fetch');

    //items report
    Route::resource('/Company-item-report', 'Reports\ItemsReportController');
    Route::get('/Company-dynamicCompany-itemReport.fetch', 'Reports\ItemsReportController@companyFetch')->name('Company-dynamicCompany-itemReport.fetch');
    //cash-box report
    Route::resource('/Company-cashBox-report', 'Reports\CashBoxReportController');
    //bank report
    Route::resource('/Company-bank-report', 'Reports\BankReportController');

});


     Route::namespace('Admin')->middleware('OfficeAdmin')->group(function () {
    //Reports

    //client report

    Route::resource('/Admin-client-report', 'Reports\ClientReportController');
    Route::get('/dynamicCompany-clientReport.fetch', 'Reports\ClientReportController@companyFetch')->name('dynamicCompany-clientReport.fetch');
    //supplier report
    Route::resource('/Admin-supplier-report', 'Reports\SuppliersReportController');
    Route::get('/dynamicCompany-supplierReport.fetch', 'Reports\SuppliersReportController@companyFetch')->name('dynamicCompany-supplierReport.fetch');

    //employee report
    Route::resource('/Admin-employee-report', 'Reports\EmployeesReportController');
    Route::get('/dynamicCompany-empolyeeReport.fetch', 'Reports\EmployeesReportController@companyFetch')->name('dynamicCompany-employeeReport.fetch');
    //items report
    Route::resource('/Admin-item-report', 'Reports\ItemsReportController');
    Route::get('/dynamicCompany-itemReport.fetch', 'Reports\ItemsReportController@companyFetch')->name('dynamicCompany-itemReport.fetch');

    //cash-box report
    Route::resource('/Admin-cashBox-report', 'Reports\CashBoxReportController');
    //bank report
    Route::resource('/Admin-bank-report', 'Reports\BankReportController');

    //البيانات الاساسية
    //Basic info
    Route::middleware(['HasBasicInfo'])->group(function () {
        /*********************==user==******************* */
        Route::resource('/users', 'RegisterUsersController');
        Route::get('dynamicdependentCat/fetch', 'RegisterUsersController@fetchCat')->name('dynamicdependentCat.fetch');
        Route::post('savePrevildge', 'RegisterUsersController@savePrevildge')->name('savePrevildge');

        /*********************==guid==******************* */
        Route::resource('/guid-item', 'GuideItemController');

        /*********************==WorkRoleController==******************* */
        Route::resource('/work-role', 'WorkRoleController');
        Route::post('/saveCase1', 'WorkRoleController@saveCase1')->name('saveCase1');
        Route::post('/saveCase2', 'WorkRoleController@saveCase2')->name('saveCase2');
        Route::post('/saveCase3', 'WorkRoleController@saveCase3')->name('saveCase3');
        Route::post('/saveCase4', 'WorkRoleController@saveCase4')->name('saveCase4');

        /*********************==BalanceAdjust==******************* */
        Route::get('/balance-adjust', 'BalanceAdjustController@index')->name('balance-adjust');
        Route::get('dynamicPerson/fetch', 'BalanceAdjustController@fetchPerson')->name('dynamicPerson.fetch');
        Route::get('dynamicPersonComp/fetch', 'BalanceAdjustController@dynamicPersonComp')->name('dynamicPersonComp.fetch');
        Route::get('dynamicClient/fetch', 'BalanceAdjustController@fetchClient')->name('dynamicClient.fetch');
        Route::get('getCurrentBalance/fetch', 'BalanceAdjustController@getCurrentBalance')->name('getCurrentBalance.fetch');

        Route::post('/balance-adjust/store', 'BalanceAdjustController@store')->name('balance-adjust.store');

    });

    Route::get('/', 'AllCompaniesController@home');
    /*********************==home==******************* */
    Route::resource('/home', 'AllCompaniesController');
    Route::get('/fetch_emp', 'AllCompaniesController@fetch_emp')->name('fetch_emp');
    Route::get('/fetch_client', 'AllCompaniesController@fetch_client')->name('fetch_client');
    Route::get('/fetch_supplier', 'AllCompaniesController@fetch_supplier')->name('fetch_supplier');
    Route::get('/search_emp', 'AllCompaniesController@search_emp')->name('search_emp');
    Route::get('/search_client', 'AllCompaniesController@search_client')->name('search_client');
    Route::get('/search_sup', 'AllCompaniesController@search_sup')->name('search_sup');

    /*********************==cash-purch==******************* */
    Route::resource('/cash-purch', 'CashPurchasingController');
    Route::get('/dynamicCompany.fetch', 'CashPurchasingController@companyFetch')->name('dynamicCompany.fetch');
    Route::post('/update.criterion', 'CashPurchasingController@updateCriterion')->name('update.criterion');
    Route::post('/update.guided', 'CashPurchasingController@updateGuided')->name('update.guided');
    Route::post('/update.confirmed', 'CashPurchasingController@updateConfirmed')->name('update.confirmed');
    /*********************==sale-purch==******************* */
    Route::resource('/cash-sale', 'SalePurchasingController');
    Route::get('/dynamicCompany.salefetch', 'SalePurchasingController@companyFetch')->name('dynamicCompany.salefetch');
    Route::post('/update.salecriterion', 'SalePurchasingController@updateCriterion')->name('update.salecriterion');
    Route::post('/update.saleguided', 'SalePurchasingController@updateGuided')->name('update.saleguided');
    Route::post('/update.saleconfirmed', 'SalePurchasingController@updateConfirmed')->name('update.saleconfirmed');
    /*********************==invoice Purch==******************* */
    Route::get('/invoice-cash', 'InvoiceSalePurchController@indexPurch')->name('invoice-cash');
    Route::get('/invoice-purch-select', 'InvoiceSalePurchController@purchSelect')->name('invoice-purch-select');
    Route::get('/invoicePurch-show/{id}', 'InvoiceSalePurchController@invoicePurchShow')->name('invoicePurch-show');

    /*********************==invoice Sale==******************* */
    Route::get('/invoice-sale', 'InvoiceSalePurchController@indexSale')->name('invoice-sale');
    Route::get('/invoice-sale-select', 'InvoiceSalePurchController@saleSelect')->name('invoice-sale-select');
    Route::get('/invoiceSale-show/{id}', 'InvoiceSalePurchController@invoiceSaleShow')->name('invoiceSale-show');




    //الترصيد
    Route::middleware(['HasBalance'])->group(function () {
        /*********************==MonthBalanceController==******************* */
        Route::get('/month-balance', 'MonthBalanceController@index')->name('month-balance');
        Route::get('dynamicMonth/fetch', 'MonthBalanceController@fetchMonth')->name('dynamicMonth.fetch');
        Route::get('dynamicMonthClose/fetch', 'MonthBalanceController@monthClose')->name('dynamicMonthClose.fetch');
        Route::get('dynamicMonthOpen/fetch', 'MonthBalanceController@monthOpen')->name('dynamicMonthOpen.fetch');
        /*********************==YearBalanceController==******************* */
        Route::get('/year-balance', 'YearBalanceController@index')->name('year-balance');
        Route::get('dynamicYear/fetch', 'YearBalanceController@fetchYear')->name('dynamicYear.fetch');
        Route::get('dynamicYearClose/fetch', 'YearBalanceController@yearClose')->name('dynamicYearClose.fetch');
        Route::get('dynamicYearOpen/fetch', 'YearBalanceController@yearOpen')->name('dynamicYearOpen.fetch');
        Route::get('openYearBalance/fetch', 'YearBalanceController@openYearBalance')->name('openYearBalance.fetch');
        Route::get('cancelBalance/fetch', 'YearBalanceController@cancelBalance')->name('cancelBalance.fetch');

          /*********************==Restrictions==******************* */
          Route::get('/restrictions', 'RestrictionsController@index')->name('restrictions');
          Route::get('dynamicRestricCompany/fetch', 'RestrictionsController@fetchYear')->name('dynamicRestricCompany.fetch');
          Route::get('dynamicRestricYear/fetch', 'RestrictionsController@fetchMonth')->name('dynamicRestricYear.fetch');
    });
});
