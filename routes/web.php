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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function (){

});
Route::get('/login', 'UserController@formLogin')->name('formLogin');
Route::post('/login', 'UserController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');
//
Route::prefix('/nations')->middleware('auth')->group(function () {
    Route::get('/', 'NationController@list')->name('nations.list');
    Route::get('/create', 'NationController@create')->name('nations.create');
    Route::post('create', 'NationController@store')->name('nations.store');
    Route::get('{id}/delete', 'NationController@delete')->name('nations.destroy');
    Route::get('/{id}/edit', 'NationController@edit')->name('nations.edit');
    Route::post('{id}/edit', 'NationController@update')->name('nations.update');
});
Route::prefix('/nation/{id}')->middleware('auth')->group(function () {
    Route::get('/', 'CountryController@getCountry')->name('countries.list');
    Route::get('/create', 'CountryController@create')->name('countries.create');
    Route::post('/create', 'CountryController@store')->name('countries.store');
});
Route::prefix('country')->middleware('auth')->group(function () {
    Route::get('/{id}/information', 'CountryController@info')->name('countries.information');
    Route::get('/{id}/delete/', 'CountryController@delete')->name('countries.delete');
    Route::get('/{id}/edit', 'CountryController@edit')->name('countries.edit');
    Route::post('/{id}/edit', 'CountryController@update')->name('countries.update');
});
