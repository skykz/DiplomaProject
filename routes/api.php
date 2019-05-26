<?php



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


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register','Api\Auth\RegisterController@register');

Route::post('login','Api\Auth\LoginController@login');
Route::post('logout','Api\Auth\LoginController@logout');
Route::post('refresh','Api\Auth\LoginController@refresh');
//getting list of products from api temza.kz
Route::get('products','Api\ProductController@show');
Route::get('listForConsumers/{token}','Api\ProductController@getAllConsumersOrders');
Route::get('listForCouriers','Api\ProductController@getAllCouriersOrders');


Route::middleware('auth:api')->group(function () {
//    Route::post('logout','Api\Auth\LoginController@logout');
//    return $request->user();
});
