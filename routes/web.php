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


/*
show food

*/
Route::get('/food', 'FoodController@showlist')->name('food');






Route::get('/', function () {
    return view('customer.index');
})->name('home');
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/shop', function () {
    return view('shop.index');
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
