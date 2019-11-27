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

Route::get('/', function () {
    return view('welcome');
});
Route::view('admin/admin_template','admin.admin_template');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users','UsersController');
Route::resource('roles','RolesController');
Route::get('index', function()
{
    return view('index');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::view('admin/adminlogin','admin.adminlogin');
Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
 Route::get('main/successlogin', 'MainController@successlogin');
 Route::get('logout', 'MainController@logout');
Auth::routes();
Route::view('register','register');

Route::resource('banner','BannerController');
Route::resource('configuration','ConfigurationController');
Route::resource('category','CategoryController');
Route::resource('product','ProductController');
//Route::get("addmore","HomeController@addMore");

//Route::post("addmore","HomeController@addMorePost");
 Route::resource('product_attributes','ProductAttributeController');
// Route::post('product/insert', 'ProductController@insert')->name('product.insert');
// Route::resource('product_images','Product_ImageController');
Route::get('product/create/{id}', 'ProductController@getValues');
Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'ProductController@myformAjax'));
Route::resource('coupon','CouponController');
Route::view('Eshopper','frontend.home');
Route::resource('homes','HomesController');
//Route::get('/home/{name}','HomesController@products');
Route::resource('login','HomesController');
Route::get('/login', 'HomeController@login')->name('login');
Route::match(['GET','POST'],'/login-register','HomesController@register');
Route::get('/main', 'MainController@index');
Route::post('/login-register/checklogin', 'HomesController@checkslogin');
Route::get('login-register/successlogin', 'HomesController@successlogins');
Route::get('logouts', 'HomesController@logouts');
Route::get('/products/{url}','HomesController@products');
Route::match(['GET','POST'],'forgot-password','HomesController@forgotPassword');
Route::group(['middleware'=>['frontlogin']],function(){
    Route::match(['GET','POST'],'account','HomesController@account');
    Route::post('/check-user-pwd','HomesController@chkUserPassword');
  
    Route::get('prod/{id}','HomesController@prod');
    Route::match(['GET','POST'],'add-cart','HomesController@addtocart');
    Route::match(['get', 'post'], '/cart','HomesController@cart');
    Route::get('/cart/delete-product/{id}','HomesController@deleteCartProduct');
    Route::get('/cart/update-quantity/{id}/{quantity}','HomesController@updateCartQuantity');
    Route::post('/cart/apply-coupon','HomesController@applyCoupon');


});
Route::post('/update-user-pwd','HomesController@updatePassword');
Route::resource('address','AddressController');
//Route::post('AddresseeList', 'AddressController@store');
//Route::get('store','AddressController@store');
//Route::post('/address/create', ['as' => '/address/create', 'uses' => 'AddressController@create']);
//Route::post('/address/edit', ['as' => '/address/edit', 'uses' => 'AddressController@edit']);
//Route::post('/address/edit', ['as' => '/address/edit', 'uses' => 'AddressController@update']);
