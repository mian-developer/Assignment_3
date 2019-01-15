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



Route::get('/',[

    'uses'=>'FrontEndController@index',

	'as'=> 'welcome'

	]);

Route::get('/mobiles',[

    'uses'=>'FrontEndController@mobiles',

	'as'=> 'mobiles'

	]);

Route::get('/categories',[

    'uses'=>'FrontEndController@category',

	'as'=> 'categories'

	]);

Route::get('/categories/{id}', [
	'uses'=>'FrontEndController@categorysingle',

	'as'=> 'category.single'

	]);

Route::get('/moblies/{id}', [
	'uses'=>'FrontEndController@mobilesingle',

	'as'=> 'mobile.single'

	]);

Route::post('/cart/add', [
	'uses'=>'ShoppingController@add_to_cart',

	'as'=> 'cart.add'

	]);

Route::get('/cart', [
	'uses'=>'ShoppingController@cart',

	'as'=> 'cart'

	]);

Route::get('/cart/delete/{id}', [
	'uses'=>'ShoppingController@cart_delete',

	'as'=> 'cart.delete'

	]);

Route::get('/cart/checkout', [
	'uses'=>'ShoppingController@checkout',

	'as'=> 'cart.checkout'

	]);

Route::post('/cart/checkout', [
	'uses'=>'ShoppingController@pay',

	'as'=> 'cart.checkout'

	]);

Route::get('/results',function(){

	$product=\App\Product::where('name','like','%'. request('query') . '%')->get();
	return view('front.results')->with('prod',$product)->with('categ',App\Category::all())->with('setting',App\Setting::first())->with('name','Search Results:' . request('query'))->with('query', request('query'));

});
Auth::routes();



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
  
  Route::get('/home', 'HomeController@index')->name('home');

  Route::resource('products','ProductsController');
  Route::resource('categories','CategorysController');

  Route::get('/profile',[

		'uses'=>'ProfileController@profile',

		'as'=> 'user.profile'

		]);

  Route::post('profile/update',[

		'uses'=>'ProfileController@update',

		'as'=> 'profile.update'

		]);

    Route::get('/settings',[

		'uses'=>'SettingController@setting',

		'as'=> 'settings'

		]);

  Route::post('settings/update',[

		'uses'=>'SettingController@update',

		'as'=> 'settings.update'

		]);

});
