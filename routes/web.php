<?php
use App\Http\Controllers\OrderController;

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

Auth::routes();

Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@orders')->name('home');
// Route::get('/order', 'OrderController@index')->name('order.index');
// Route::get('/addOrder', 'OrderController@addOrder')->name('addOrder');
Route::group(['middleware' => ['web']], function(){
    Route::resource('order', 'OrderController');
    Route::POST('addOrder', 'OrderController@addOrder')->name('addOrder');
    
});

Route::post('/store', 'OrderController@store')->name('store');
Route::get('/fetch-orders', 'OrderController@orders')->name('orders');
Route::get('/state_order', 'OrderController@state')->name('state_order');
Route::post('/update_state', 'OrderController@update')->name('update');