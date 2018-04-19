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
//use \Illuminate\Support\Facades\Route;
Auth::routes();
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
});
Route::middleware(['auth:admin','guest'])->group(function () {
});
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

    Route::get('/admin/tenant-list', 'TenantController@index')->name('admin.tenant-list');
    Route::get('/admin/add-tenant', 'TenantController@create')->name('admin.add-tenant');
    Route::post('/admin/add-tenant', 'TenantController@store')->name('admin-save-tenant');
    Route::get('/admin/display-tenant/{id}', 'TenantController@show')->name('admin-display-tenant');
    Route::get('/admin/edit-tenant/{id}/edit', 'TenantController@edit')->name('admin-edit-tenant');
    Route::put('/admin/edit-tenant/{id}', 'TenantController@update')->name('update-tenant');
    Route::delete('/admin/delete-tenant/{id}', 'TenantController@destroy')->name('admin-delete-tenant');

    Route::post('/getImage/{id}', 'TenantController@destroySingleImage')->name('imageAjaxGet');
    Route::post('/getFile/{id}', 'TenantController@destroySingleFile')->name('fileAjaxGet');

    Route::get('/admin/property-list', 'PropertyController@index')->name('admin.property-list');
    Route::get('/admin/add-property', 'PropertyController@create')->name('admin.display-property');
    Route::post('/admin/add-property', 'PropertyController@store')->name('admin-save-property');
    Route::get('/admin/display-property/{id}', 'PropertyController@show')->name('admin.display-single-property');
    Route::get('/admin/edit-property/{id}/edit', 'PropertyController@edit')->name('admin-edit-property');
    Route::put('/admin/edit-property/{id}', 'PropertyController@update')->name('admin-update-property');
    Route::get('/admin/list-rented-properties', 'PropertyController@getAssignedProperties')->name('admin.list-rented-property');
    Route::get('/admin/list-free-properties', 'PropertyController@getNonAssignedProperties')->name('admin.list-free-property');
    Route::delete('/admin/delete-property/{id}', 'PropertyController@destroy')->name('admin-delete-property');

    Route::post('/getPropertyImage/{id}', 'PropertyController@destroySingleImage')->name('imagePropertyAjaxGet');
    Route::post('/getPropertyFile/{id}', 'PropertyController@destroySingleFile')->name('filePropertyAjaxGet');

    Route::get('admin/new_ticket', 'TicketsController@create');
    Route::post('admin/new_ticket', 'TicketsController@store')->name('create_ticket');
});
