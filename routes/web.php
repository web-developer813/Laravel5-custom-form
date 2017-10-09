<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/requests',                     ['as' =>'request',                  'uses' =>'RequestController@index']);
Route::get('/requests/create',              ['as' =>'request.create',           'uses' =>'RequestController@create']);
Route::post('/requests/store',              ['as' =>'request.store',            'uses' =>'RequestController@store']);
Route::post('/requests/search',             ['as' =>'request.search',           'uses' =>'RequestController@search']);
Route::get('/requests/edit/{request}',      ['as' =>'request.edit',             'uses' =>'RequestController@edit']);
Route::delete('/requests/{request}',                 ['as' =>'request.destroy',          'uses' => 'RequestController@destroy']);

Route::post('/requests/comment/store',         ['as' =>'requests.comment.store',                  'uses' =>'RequestController@request_comment_store']);
Route::post('/requests/comment/edit',          ['as' =>'requests.comment.edit',                   'uses' =>'RequestController@request_comment_edit']);

Route::post('/requests/file/store',         ['as' =>'requests.file.store',                  'uses' =>'RequestController@request_file_store']);
Route::post('/requests/file/edit',          ['as' =>'requests.file.edit',                   'uses' =>'RequestController@request_file_edit']);


Route::post('/property/search',                ['as' =>'property.search',                       'uses' =>'PropertyController@search']);
Route::post('/property/show',                  ['as' =>'property.show',                         'uses' =>'PropertyController@show']);

Route::post('/property/getAssignProperty',              ['as' =>'property.getAssignProperty',            'uses' =>'PropertyController@getAssignProperty']);
Route::post('/property/getNewProperty',                 ['as' =>'property.getNewProperty',               'uses' =>'PropertyController@getNewProperty']);
Route::post('/property/getEditProperty',                 ['as' =>'property.getEditProperty',               'uses' =>'PropertyController@getEditProperty']);

Route::post('/property/store',                 ['as' =>'property.store',                        'uses' =>'PropertyController@property_store']);
Route::post('/property/phone/store',           ['as' =>'property.phone.store',                  'uses' =>'PropertyController@property_phone_store']);
Route::post('/property/phone/edit',            ['as' =>'property.phone.edit',                   'uses' =>'PropertyController@property_phone_edit']);

Route::post('/property/contact/store',         ['as' =>'property.contact.store',                  'uses' =>'PropertyController@property_contact_store']);
Route::post('/property/contact/edit',          ['as' =>'property.contact.edit',                   'uses' =>'PropertyController@property_contact_edit']);

Route::post('/property/comment/store',         ['as' =>'property.comment.store',                  'uses' =>'PropertyController@property_comment_store']);
Route::post('/property/comment/edit',          ['as' =>'property.comment.edit',                   'uses' =>'PropertyController@property_comment_edit']);

Route::post('/property/company/store',         ['as' =>'property.company.store',                  'uses' =>'PropertyController@property_company_store']);
Route::post('/property/company/edit',          ['as' =>'property.company.edit',                   'uses' =>'PropertyController@property_company_edit']);
Route::post('/property/company/assign',        ['as' =>'property.company.assign',                   'uses' =>'PropertyController@property_company_assign']);


Route::post('/property/company/phone/store',         ['as' =>'property.company.phone.store',                  'uses' =>'PropertyController@property_company_phone_store']);
Route::post('/property/company/phone/edit',          ['as' =>'property.company.phone.edit',                   'uses' =>'PropertyController@property_company_phone_edit']);

Route::post('/property/company/contact/store',         ['as' =>'property.company.contact.store',                  'uses' =>'PropertyController@property_company_contact_store']);
Route::post('/property/company/contact/edit',          ['as' =>'property.company.contact.edit',                   'uses' =>'PropertyController@property_company_contact_edit']);



Route::get('/bids',                     ['as' =>'bid',                  'uses' =>'BidController@index']);
Route::get('/bids/create',              ['as' =>'bid.create',           'uses' =>'BidController@create']);
Route::post('/bids/store',              ['as' =>'bid.store',            'uses' =>'BidController@store']);