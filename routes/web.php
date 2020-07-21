<?php

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


// User Routes

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('homeuser');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/articles', 'ArticleController@index')->name('articles');
Route::post('/articles', 'ArticleController@filter')->name('articles');
Route::get('/volunteers', 'VolunteerController@index')->name('volunteers');
Route::get('/contact', 'ContactController@index')->name('contacts');

Route::post('/contact', 'ContactController@send')->name('contactpost');

Route::get('/logout',function(){

	if(\Auth::check())
	{
		\Auth::logout();
		return redirect('/homeuser');
	}
	else
	{
		return redirect('/');
	}
})->name('logout');

// Admin Routes 

Route::group(['middleware' => 'auth'], function () {

	Route::get('admin', function() {
		return redirect('admin/dashboard');
	});

	Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('homeadmin');
	Route::resource('/admin/admins', 'Admin\AdminController');
	Route::resource('/admin/volunteers', 'Admin\VolunteerController');
	Route::resource('/admin/articles', 'Admin\ArticleController');
	Route::resource('/admin/roles', 'Admin\RoleController');
	Route::resource('/admin/committees', 'Admin\CommitteeController');
	Route::resource('/admin/committees.volunteers', 'Admin\CommitteeVolunteerController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);
	Route::post('profile', ['as' => 'profile.updateimage', 'uses' => 'Admin\ProfileController@updateimage']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);
});

