
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

    Route::get('/', function () {
        return view('Admin.home.index');
    });
    

});