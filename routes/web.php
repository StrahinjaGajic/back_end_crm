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


Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/','UserController@index')->name('user.home');