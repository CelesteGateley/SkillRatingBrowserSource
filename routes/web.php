<?php

use App\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/source/{apiKey}', 'SourceController@getView')->name('default_source');
Route::get('/source/{apiKey}/tank', 'SourceController@getTankView')->name('tank_source');
Route::get('/source/{apiKey}/damage', 'SourceController@getDamageView')->name('damage_source');
Route::get('/source/{apiKey}/support', 'SourceController@getSupportView')->name('support_source');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
