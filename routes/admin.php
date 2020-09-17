
<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
|   \Admin
*/
Route::namespace('Admin')->middleware('OfficeAdmin')->group(function () {
    //البيانات الاساسية
    Route::middleware(['HasBasicInfo'])->group(function () {
        /*********************==user==******************* */
        Route::resource('/users', 'RegisterUsersController');
        Route::get('dynamicdependentCat/fetch', 'RegisterUsersController@fetchCat')->name('dynamicdependentCat.fetch');

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
        Route::get('dynamicClient/fetch', 'BalanceAdjustController@fetchClient')->name('dynamicClient.fetch');
        Route::get('getCurrentBalance/fetch', 'BalanceAdjustController@getCurrentBalance')->name('getCurrentBalance.fetch');

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


});
});
