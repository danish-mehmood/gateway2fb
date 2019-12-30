<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin'  , 'middleware'=>['auth' , 'can:isAdmin']] , function(){
    Route::get('/',"facebookAdsController@index" )->name('dashboard');
    Route::post('/status_filter',"facebookAdsController@dashboard_status_filtered" )->name('dashboard_status_filtered');
    Route::post('/page/next',"facebookAdsController@next_paginator" )->name('next');
    Route::post('/page/prev',"facebookAdsController@prev_paginator" )->name('prev_paginator');
    //Route::post('/search-filter',"facebookAdsController@searchFiltered")->name('search_filtered');
    Route::post('/date-filter', "facebookAdsController@filtered")->name('filtered');
    // Route::get('/date-filter2', "facebookAdsController@filtered")->name('filtered2');
    Route::post('date-filter/page/next',"facebookAdsController@next_date_paginator" )->name('next_date_paginator');
    Route::post('date-filter/page/prev',"facebookAdsController@prev_date_paginator" )->name('prev_date_paginator');
    // Route::post('/status_filter',"facebookAdsController@status_filter")->name('status_filter');
    Route::post('last_page' , "facebookAdsController@last_page")->name("last_page");
    Route::post('/',"facebookAdsController@index" )->name('first_page');

    Route::post('/date-filter/last_page' , "facebookAdsController@last_page_date_filter")->name("last_page_date_filter");
    Route::post('/date-filter/first_page',"facebookAdsController@filtered" )->name('first_page_date_filter');

});
