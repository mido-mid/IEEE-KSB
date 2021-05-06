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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['middleware' => ['api']], function () {
    Route::get('home', 'HomeController@index')->name('homeuser');
    Route::get('about', 'AboutController@index')->name('about');
    Route::get('articles', 'ArticleController@index')->name('articles');
    Route::get('volunteers', 'VolunteerController@index')->name('volunteers');
    Route::get('events', 'EventController@index')->name('events');
    Route::post('contact', 'ContactController@send')->name('contactpost');
});
