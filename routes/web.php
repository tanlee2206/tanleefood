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

/*
 *đăng nhập 
 */
Route::get('/login',   'CustomerController@getLogin')->name('login.form');
Route::post('/login',   'CustomerController@postLogin')->name('login');

Route::get("/logout", function(){
	Auth::logout();
	return redirect('/');
})->name('logout');

Route::get('/admin/login',   'AdminController@getLogin')->name('loginAdmin.form');
Route::post('/admin/login',   'AdminController@postLogin')->name('loginAdmin');

Route::get("/admin/logout", function(){
	Auth::logout();
	return redirect('/admin/login');
})->name('logoutAdmin');

Route::get('/shop/login',   'ShopController@getLogin')->name('loginShop.form');
Route::post('/shop/login',   'ShopController@postLogin')->name('loginShop');

Route::get("/shop/logout", function(){
	Auth::logout();
	return redirect('/shop/login');
})->name('logoutShop');
/*
show food

*/
Route::get('/food', 'FoodController@showlist')->name('food');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/Addcart/{id}', 'CartController@Addcart');
Route::get('/DeleteItemCart/{id}', 'CartController@DeleteItemCart');
Route::get('/DeleteItemListCart/{id}', 'CartController@DeleteItemListCart');
Route::get('/UpdateItemListCart/{id}/{quanty}', 'CartController@UpdateItemListCart');


Route::group(['prefix'=>'shop', 'middleware'=> 'shopMiddleware'],function(){
	Route::view('/', 'shop.index')->name('shop');
	Route::resource('food','FoodController');
	Route::resource('orders','OrdersController')->names([
		'index' => 'orders.list'
	]);

});


Route::group(['prefix' => 'laravel-filemanager'], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::get('/','HomeController@index' )->name('home');
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('adminMiddleware')->name('admin');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/voice', function () {
    return view('voice');
});