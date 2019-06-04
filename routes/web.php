<?php


// main route with start mean
Route::get('/', 'FrontMainController@index');

// fireBase testing route
Route::get('/firebase','FireBaseController@index');


// searching route
Route::get('global_search','FrontMainController@search');

Route::get('list/{id}','FrontMainController@getList');

// payment routes
Route::post('apply.order','FrontMainController@applyOrder')->name('apply.order');
Route::get('order.pay/{id}','FrontMainController@orderPay')->name('order.pay/{id}');
Route::get('payment/card/form/{user_id}/{id}','FrontMainController@showPaymentCard');

// email subscription & email sender
Route::post('email/senders','EmailSendController@rassylka')->name('email/senders');
Route::post('sendEmail','EmailSendController@send')->name('sendEmail');


// cart system routes
Route::get('getCartItems','FrontMainController@show');
Route::get('/add-cart/{id}','FrontMainController@getAddToCart');
Route::get('destroyCartItems','FrontMainController@destroy');

//ajax load data
//Route::post('/loadmore/load_data', 'FrontMainController@loadData')->name('loadmore.load_data');
Route::get('about',function (){
    return view('front.about');
});
Route::get('history','HomeController@history');

Route::get('contact',function (){
    return view('front.contact');
});
Route::get('product/single/{id}', function () {
    return view('product');
});
Route::get('/getdata/{id}', 'DetailProductController@show');

//laravel auth & voyager auth system routes
Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// home page route for logged in users
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile','HomeController@profile_settings');
Route::post('/home/profile/update','HomeController@profile_settings_update');

Route::get('/home/support','HomeController@support');
Route::get('/home/address','HomeController@getAddress');


//routes for ajax filters of product
Route::get('filter/{value}','FrontMainController@filter');


// logged in users dashboard and profile content


