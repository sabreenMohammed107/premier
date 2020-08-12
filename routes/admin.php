
<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 
|   \Admin
*/
Route::post('post-login', 'Auth\LoginController@postLogin'); 
Route::namespace('Admin')->group(function () {

    Route::get('/', function () {
        return view('Admin.home.index');
    });
    
    Route::resource('/users', 'RegisterUsersController');

});