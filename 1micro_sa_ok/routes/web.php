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

// Route::get('/1', function () {
//     return view('welcome');
// });



Route::get('/', 'LandingController@index');
Route::get('/cat/{id?}', 'LandingController@index')->name('landing');


Route::get('/productsCat/{id}', 'LandingController@productsByCategory')->name('productsCat');
Route::get('/productsModel/{id}/{string?}', 'LandingController@productsByModel')->where('string', '(.*)')->name('productsModel');
Route::get('/product/{id}', 'LandingController@showProduct')->name('showProduct');


// Route::get('/home', 'HomeController@index')->name('home');
//


Auth::routes();




//admin sections
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout',  'Auth\AdminLoginController@logout')->name('admin.logout');
//  Password reset Route
  Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
