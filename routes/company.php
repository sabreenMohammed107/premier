
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

    Route::get('/company', function () {
        return view('Company.home.index');
    });
    
});