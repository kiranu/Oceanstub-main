<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes(['verify'=>true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::namespace('App\Http\Controllers')->group(function(){
// 	if(Auth::check()){
// Route::group((['middleware' => 'verified']),function(){
// };
	Route::get('/','IndexController@index')->name('index');
	Route::get('/shop-product-details/{id}','ProductController@product_detail_view')->name('shop-product-detail');
	Route::POST('/product_attribute_details','ProductController@product_attribute_details')->name('product_attribute_details');
	//........CART.......................................................................................
	Route::post('/addtocart','ProductController@addtocart')->name('addtocart');
	Route::post('/addtocart_single','ProductController@addtocart_single')->name('addtocart_single');
	Route::get('/cart','ProductController@cart')->name('cart');
	Route::get('/delete-from-cart/{id}','ProductController@deletefromcart')->name('deletefromcart');
	Route::POST('/update_cart_ajax','ProductController@update_cart_ajax')->name('update_cart_ajax');
	Route::GET('/cart_update_button','ProductController@cart_update_button')->name('cart_update_button');
	//....WISHLIST...................................................................................
	Route::post('/addtowishlist','ProductController@addtowishlist')->name('addtowishlist');
	Route::get('/wishlist','ProductController@wishlist')->name('wishlist');
	Route::post('/delete-wishlist','ProductController@deletewishlist')->name('delete-wishlist');
	Route::post('wishtocart','ProductController@wishtocart')->name('wishtocart');
	//................Category............................................................
	Route::get('/category-products/{id}/{category_name}','ProductController@categoryproducts')->name('categoryproducts');

	//............................Checkout.................................................
	Route::get('/checkout','ProductController@checkout')->name('checkout');
	//coupon code..................................
	
	Route::POST('/check_coupon_code','ProductController@check_coupon_code')->name('check_coupon_code');

	//...................ORDER.......................................................
	Route::get('/order-completed','OrderController@order_completed')->name('order_completed');
	Route::get('/ordercompleted','OrderController@ordercompleted_page')->name('ordercompleted');
	Route::POST('/guest-place-order','OrderController@place_order_guest')->name('guest_place_order');
	Route::POST('/place-order','OrderController@place_order')->name('place_order');
	Route::POST('/order_details','OrderController@order_details')->name('order_details');
	Route::POST('/order_details_guest','OrderController@order_details_guest')->name('order_details_guest');
	Route::get('/cancelorder/{id}','OrderController@cancelorder')->name('cancelorder');
	//.....................................
	Route::view('/contact','contact')->name('contact');
	Route::view('/about','about')->name('about');
	Route::view('/faq','faq')->name('faq');
	Route::view('/privacy-policy','term-condition')->name('privacy');
	Route::view('/terms-and-conditions','term-condition')->name('tandc');
	Route::POST('/search-result','ProductController@search')->name('search');
	//paypal................................

	Route::GET('/paypal','PaypalController@paypal')->name('paypal');
	Route::GET('/paypal_fail','PaypalController@paypal_fail')->name('paypal_fail');
	Route::GET('/paypal_success','PaypalController@paypal_success')->name('paypal_success');
	Route::POST('/paypal_respose','PaypalController@paypal_respose')->name('paypal_respose');
	Route::GET('/payment_failed','PaypalController@payment_failed')->name('payment_failed');

Route::group((['middleware' => 'verified']),function(){
	//....................USER ACCOUNT...............................................
	Route::get('/my-account','UserController@myaccount')->name('myaccount');
	Route::POST('create-address','UserController@create_address')->name('create_address');
	Route::get('edit_address','UserController@edit_address')->name('edit_address');
	Route::get('delete_address','UserController@delete_address')->name('delete_address');
	Route::POST('update-profile','UserController@updateprofile')->name('updateprofile');
	//support
	Route::POST('create-support','UserController@create_support')->name('create_support');
	Route::POST('support-details','UserController@support_details')->name('support_details');

});
	
	//................Blog................................................................
	Route::get('/blog','BlogController@index')->name('blog');
	Route::get('/blog/{id}','BlogController@blogview')->name('blog-detail');
// 	if(Auth::check()){

// 	});
// };
});


Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('view:clear');
	$exitCode = Artisan::call('route:clear');
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('storage:link');
	//$exitCode = exec('composer dump-autoload');
	// return what you want
	});
	
	Route::get('/migrate', function(){
	Artisan::call('migrate:refresh');
	// dd('migrated!);
	});
	Route::get('/migratefresh', function(){
		Artisan::call('migrate:fresh');
		// dd('migrated!);
		});
 
	Route::get('/seedadmin', function(){
		Artisan::call('db:seed --class=AdminSeeder');
		
		});
// ====================================================================================================
// |--------------------------------------------------------------------------
// | BAck end Routes
// |--------------------------------------------------------------------------
//..................BACKEND ROUTS.................................
Route::view('/admin','backend.admin-login')->name('admin.login');
Route::post('/admin/login','App\Http\Controllers\backend\LoginController@login_submit')->name('admin.login');
Route::get('/admin/logout','App\Http\Controllers\backend\LoginController@logout')->name('admin.logout');

Route::group((['middleware' => 'admin','prefix' => '/admin',  'as'=> 'admin.']),function(){
Route::namespace('App\Http\Controllers\backend\admin')->group(function(){
//   Route::group( ['middleware'=>['admin']],function(){
	Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
	Route::get('update_pwd','AdminController@update_pwd')->name('update_pwd');
    Route::post('update_pwd','AdminController@update_pwd_submit')->name('update_pwd');
    Route::post('check_cur_pwd','AdminController@check_cur_pwd')->name('check_cur_pwd');
    Route::get('update_profile','AdminController@update_profile')->name('update_profile');
    Route::post('update_profile','AdminController@update_profile_submit')->name('update_profile');

	//............category..........................
	Route::get('category','CategoryController@category');
	Route::post('update_category_status','CategoryController@update_category_status')->name('UpdateCategoryStatus');
	Route::get('addcategory','CategoryController@addcategory');
	Route::get('category_edit/{id}','CategoryController@category_edit');
	Route::get('category_delete/{id}','CategoryController@category_delete');
	Route::get('delete_category_image/{id}','CategoryController@delete_category_image');
	Route::post('update_category/{id}','CategoryController@category_update');
	Route::post('addcategory_create','CategoryController@addcategory_create');
//...............Products..........................................
	 Route::get('/addproduct', 'ProductController@create');
	 Route::post('/product_store', 'ProductController@store');
	 Route::get('/product/edit/{id}','ProductController@edit');
	 Route::post("/product/update/{id}",'ProductController@update');
	 Route::get("/product/delete/{id}",'ProductController@destroy');
	 Route::get('/product_index', 'ProductController@index');
	 Route::post('product/update_product_status', 'ProductController@update_product_status')->name('update_product_status');

		//..........Product Attributes............................................
		Route::get('product/add_product_attributes/{id}', 'ProductController@add_product_attributes');
		Route::post('product/add_product_attributes/{id}', 'ProductController@store_product_attributes');
		Route::post('product/edit_product_attributes/{id}', 'ProductController@edit_product_attributes');
		Route::post('/product/update_productattribut_status', 'ProductController@update_productattribut_status')->name('update_productattribut_status');
		Route::get('product/delete_productattribute/{id}', 'ProductController@delete_productattribute');
		//.........Product images........................................................................
		Route::get('product/add_product_images/{id}', 'ProductController@add_product_images');
		Route::post('product/add_product_images/{id}', 'ProductController@store_product_images');
		Route::post('product/edit_product_images/{id}', 'ProductController@edit_product_images');
		Route::post('/product/update_productimagestatus', 'ProductController@update_productimagestatus');
		Route::get('product/delete_product_image/{id}', 'ProductController@delete_product_image');
		Route::post('product/update_product_image_status', 'ProductController@update_product_image_status')->name('update_product_image_status');
//........................COUPONS.............................................................
	Route::resource('coupon', CouponController::class);
	Route::get('coupon/delete/{id}','CouponController@destroy');
	Route::post('update_coupon_status','CouponController@update_coupon_status')->name('update_coupon_status');
	//........................Slider.............................................................
	Route::resource('slider', SliderController::class);
	Route::get('slider/delete/{id}','SliderController@destroy');
	Route::post('update_slider_status','SliderController@update_slider_status')->name('update_slider_status');
	//........................Banner.............................................................
	Route::resource('banner', BannerController::class);
	Route::get('banner/delete/{id}','BannerController@destroy');
	Route::POST('update_banner_status','BannerController@update_banner_status')->name('UpdateBannerStatus');
	//.........................BLOG................................
	Route::resource('blog', BlogController::class);
	Route::get('blog/delete/{id}','BlogController@destroy');
	Route::POST('update_blog_status','BlogController@update_blog_status')->name('UpdateBlogStatus');
	Route::get('blogdata','BlogController@blogdata')->name('blogdata');
		//........................SingleBanner.............................................................
		Route::resource('singlebanner', SingleBannerController::class);
		Route::get('singlebanner/delete/{id}','SingleBannerController@destroy');
		Route::POST('update_single_banner_status','SingleBannerController@update_banner_status')->name('UpdateSingleBannerStatus');
	//...............User.........................................................................
	Route::get('user','UserController@users')->name('users');
	Route::post('update_user_status','UserController@update_user_status')->name('UpdateuserStatus');
	//........................Brand.............................................................
	Route::resource('brand', BrandController::class);
	Route::get('brand/delete/{id}','BrandController@destroy');
	Route::post('update_brand_status','BrandController@update_brand_status')->name('update_brand_status');
	
	//........................Unit.............................................................
	Route::resource('unit', UnitController::class);
	Route::get('unit/delete/{id}','UnitController@destroy');
	Route::post('update_unit_status','UnitController@update_unit_status')->name('update_unit_status');
	//.................................Order.....................................
	Route::get('orders','OrderController@order')->name('orders');
	Route::get('vieworder/{id}','OrderController@order_view')->name('vieworder');
	Route::post('updateorder','OrderController@update_order')->name('updateorder');
	Route::get('pending_order','OrderController@pending_order')->name('pending_orders');
	Route::get('rejected_order','OrderController@rejected_order')->name('rejected_orders');
	Route::get('confirmed_order','OrderController@confirmed_order')->name('confirmed_orders');
	Route::get('shipped_order','OrderController@shipped_order')->name('shipped_order');
	Route::get('delivered_order','OrderController@Delivered_order')->name('delivered_order');
	//..............PAYMENT..................................................................
	Route::get('payments','PaymentController@payment')->name('payments');
	Route::get('viewpayment/{id}','PaymentController@payment_view')->name('viewpayment');
	Route::POST('updatepayment','PaymentController@updatepayment')->name('updatepayment');
	//........................TICKETS................................................................
	Route::get('viewtickets/{id}','TicketController@tickets_view')->name('viewticket');
	Route::post('updatetickets','TicketController@update_tickets')->name('updateticket');
	Route::get('pending_tickets','TicketController@pending_tickets')->name('pending_tickets');
	Route::get('pending_tickets_ajax','TicketController@pending_tickets_ajax')->name('pending_tickets_ajax');
	Route::get('rejected_tickets_ajax','TicketController@rejected_tickets_ajax')->name('rejected_tickets_ajax');
	Route::get('resolved_tickets_ajax','TicketController@resolved_tickets_ajax')->name('resolved_tickets_ajax');

	Route::get('rejected_tickets','TicketController@rejected_tickets')->name('rejected_tickets');
	Route::get('resolved_tickets','TicketController@resolved_tickets')->name('resolved_tickets');

  });
});




