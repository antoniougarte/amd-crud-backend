<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');



Route::get('clientes', 'ClientController@index');
Route::post('clientes-insert', 'ClientController@store');

Route::get('clientes/{id}/pagos', 'ClientController@getPayments');
Route::post('clientes/{id}/pagos-insert', 'ClientController@storePayment');

Route::get('total', 'ClientController@getTotal');
Route::delete('total/{id}/delete-client', 'ClientController@deleteClient');

Route::get('total/{id}/details', 'ClientController@getClientDetails');
