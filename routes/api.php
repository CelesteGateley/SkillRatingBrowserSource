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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('{apiKey}/add/{adjustAmount}', 'ApiController@addSkillRank');
Route::get('{apiKey}/subtract/{adjustAmount}', 'ApiController@subtractSkillRank');
Route::get('{apiKey}/change/{role}', 'ApiController@changeShown');
Route::get('{apiKey}/add/tank/{adjustAmount}', 'ApiController@addTankSkillRank');
Route::get('{apiKey}/subtract/tank/{adjustAmount}', 'ApiController@subtractTankSkillRank');
Route::get('{apiKey}/add/damage/{adjustAmount}', 'ApiController@addDamageSkillRank');
Route::get('{apiKey}/subtract/damage/{adjustAmount}', 'ApiController@subtractDamageSkillRank');
Route::get('{apiKey}/add/support/{adjustAmount}', 'ApiController@addSupportSkillRank');
Route::get('{apiKey}/subtract/support/{adjustAmount}', 'ApiController@subtractTankSkillRank');
Route::get('{apiKey}/get/{role}', 'ApiController@getSkillRank')->name('api_get_role');
