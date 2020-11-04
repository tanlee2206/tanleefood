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
Route::get('/getdistricts','UserController@getDistricts');
Route::get('/getwards','UserController@getWards');
/*
 *đăng nhập 
 */
Route::get('/register',   'CustomerController@getRegister')->name('register.form');
Route::post('/register',   'CustomerController@postRegister')->name('register');
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

Route::get('/shop-manager/login',   'ShopController@getLogin')->name('loginShop.form');
Route::post('/shop-manager/login',   'ShopController@postLogin')->name('loginShop');

Route::get("/shop-manager/logout", function(){
	Auth::logout();
	return redirect('/shop-manager/login');
})->name('logoutShop');
/*
show food

*/
// check slug
Route::get('pages/check_slug', 'PagesController@check_slug')
  ->name('pages.check_slug');

Route::get('/search', 'SearchController@search')->name('search');

Route::get('/food', 'FoodController@showlist')->name('food');
// Route::get('/shop', 'ShopController@showlist')->name('shop.show');
// Route::get('/shop-single/{shop}', 'ShopController@showShopSingle')->name('shopSingle.show');

Route::get('/Addcart/{id}', 'CartController@Addcart');
Route::get('/DeleteItemCart/{id}', 'CartController@DeleteItemCart');
Route::get('/DeleteItemListCart/{id}', 'CartController@DeleteItemListCart');
Route::get('/UpdateItemListCart/{id}/{quanty}', 'CartController@UpdateItemListCart');
Route::get('/DeleteCart', 'CartController@DeleteCart');

route::get('/detail-food/{id}','FoodController@detailfoodindex')->name('food.detail_index');
Route::group(['prefix'=>'shop-manager', 'middleware'=> 'shopMiddleware'],function(){
	// Route::view('/', 'shop.index')->name('shop');
	Route::get('/','ShopController@dashboard')->name('shop');
	Route::resource('food','FoodController');
	Route::delete('/food','FoodController@destroy');
	route::get('/detail-food/{id}','FoodController@detailfood')->name('food.detail');
	Route::resource('orders','OrdersController')->names([
		'index' => 'orders.list'
	]);
	Route::get('/shop-profile','ShopController@profile');

});
Route::group(['prefix'=>'admin', 'middleware'=> 'adminMiddleware'],function(){
	Route::view('/', 'admin.index')->name('admin');
	route::get('/food','AdminController@showFood')->name('admin.food');
	Route::resource('user','UserController');
	Route::delete('/user','UserController@destroy');
	Route::resource('shop','ShopController');
	Route::delete('/shop','ShopController@destroy');
	Route::resource('category','CategoryController');
	Route::delete('/category','CategoryController@destroy');
	route::get('/detail-user/{id}','UserController@detailuser')->name('user.detail');
	Route::get('/getdistricts','UserController@getDistricts');
	Route::get('/getwards','UserController@getWards');


});


Route::group(['prefix' => 'laravel-filemanager'], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::resource('','HomeController');
// Route::get('/{province}','HomeController@showhome' )->name('showhome');
Route::group(['prefix'=>'/{province}'],function(){
	Route::get('/','HomeController@showhome' )->name('showhome');
	Route::get('/food', 'FoodController@showlist');
	Route::get('/shop', 'ShopController@showlist')->name('shop.show');
	Route::get('/shop/{id}', 'ShopController@showlistCategory')->name('shop.showCategory');
	Route::get('/shop-single/{shop}', 'ShopController@showShopSingle')->name('shopSingle.show');
	Route::get('/cart', 'CartController@cart')->name('cart');
	Route::get('/checkout',   'CheckoutController@confirm')->name('checkout.confirm');

});
// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware('adminMiddleware')->name('admin');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/voice', function () {
    return view('voice');
});