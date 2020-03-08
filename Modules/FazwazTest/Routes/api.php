<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/fazwaztest', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'fazwaz'], function() {
    // Route::post('{account_id}','ApiAccountController@showAccount');
    // Route::post('{account_id}/balances','ApiAccountController@showAccountBalance');
    // Route::post('{account_id}/positions','ApiAccountController@showAccountPosition');
    // Route::post('{account_id}/deals','ApiAccountController@showAccountDeal');
    // Route::post('{account_id}/orders','ApiAccountController@showAccountOrder');
    Route::get("cont/", function(){
        return 'test';
    });
});