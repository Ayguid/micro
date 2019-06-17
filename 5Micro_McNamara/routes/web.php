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



// Route::get('/', function () {
//   return view('welcome');
// })->name('landing');




/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
Route::group([
  'prefix' => LaravelLocalization::setLocale(),
  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
  ],
  function(){
    Route::get('/', 'LandingController@index')->name('landing');
    //

    //
    Route::get('/country/{id?}', 'LandingController@setCountry')->name('country_landing');
    //
    Route::get('/cat/{id?}', 'LandingController@index')->name('productsCat');
    //
    Route::get('/showProduct/{id}', 'LandingController@showProduct')->name('showProduct');
    // Route::get('/downloadFile/{path}', 'LandingController@downloadFile')->name('downloadFile');
    //
    Route::get('/home', 'HomeController@index')->name('home');

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

  //categories section
  Route::post('/addCategory', 'CategoryController@store')->name('addCategory');
  Route::get('/showCategory/{id}', 'CategoryController@show')->name('showCategory');
  Route::get('/editCategory/{id}', 'CategoryController@edit')->name('editCategory');
  Route::post('/updateCategory/{id}', 'CategoryController@update')->name('updateCat');
  Route::delete('/deleteCategory/{id}', 'CategoryController@destroy')->name('deleteCategory');
  Route::post('/addAttribute', 'CategoryController@addAttribute')->name('addCatAttribute');

  //products sections
  Route::get('/productsInCategory/{id?}', 'ProductController@productsInCategory')->name('productsInCat');
  Route::post('/addProduct', 'ProductController@store')->name('addProduct');
  Route::get('/editProduct/{id}', 'ProductController@edit')->name('editProduct');
  Route::post('/updateProduct', 'ProductController@update')->name('updateProduct');
  Route::delete('/deleteProduct/{id}','ProductController@destroy')->name('destroyProduct');
  Route::get('/findProduct','ProductController@find')->name('findProduct');


  //media
  Route::get('/files','FileController@index')->name('fileManager');

});



});
