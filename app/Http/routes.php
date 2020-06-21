<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomeController@index');
Route::get('facture', 'FactureController@index');
Route::post('facture', 'FactureController@index');
Route::get('facture/delete/{id}', 'FactureController@delete');


Route::get('api/invoices', 'InvoiceController@index');
Route::delete('api/invoices/{id}', 'InvoiceController@destroy');

//Route::controllers([
//    'facture' => 'FactureController',
//]);
