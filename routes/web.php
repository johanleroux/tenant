<?php

Route::view('/', 'welcome');

Auth::routes();

Route::get('/tenant/{tentant}/switch', 'TenantsController@switch')->name('tenant.switch');

Route::resource('tenants', 'TenantsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
