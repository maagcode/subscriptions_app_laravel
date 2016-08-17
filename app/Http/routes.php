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

Route::get('/', function () {
    return view('welcome');
});

// authentication routes
Route::auth();

// Group to route under Auth middleware
Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/plans', 'PlanController@index')->name('plans.index');

    Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');

    Route::get('/braintree/token', 'BraintreeTokenController@token')->name('braintree.token');

    Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');

    Route::group(['middleware' => 'subscribed'], function ()
    {
        Route::get('/services', 'ServiceController@index')->name('services.index');

        Route::get('/subscription', 'SubscriptionController@index')->name('subscription.index');

        Route::post('/subscription/cancel', 'SubscriptionController@cancel')->name('subscription.cancel');

        Route::post('/subscription/resume', 'SubscriptionController@resume')->name('subscription.resume');
    });

    Route::group(['middleware' => 'client'], function ()
    {
        Route::get('/invoices', 'InvoiceController@index')->name('invoices.index');

        Route::get('/invoices/{invoiceID}', 'InvoiceController@show')->name('invoices.show');
    });
});
