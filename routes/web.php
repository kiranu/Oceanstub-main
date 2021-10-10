<?php
// use App\Http\Controllers\
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SellerMiddleware;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerLoginController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\SellerReportsController;
use App\Http\Controllers\SeatingChartController;
use App\Http\Controllers\SellerContentManageController;
use App\Http\Controllers\EventPackageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\home\CartController;
use Illuminate\Http\Request;
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
// Auth::routes(['verify'=>true]);

// Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {

/*
|--------------------------------------------------------------------------
| Seller Web Routes
|--------------------------------------------------------------------------
|
|All Routes for Seller starts from here
*/

Route::get('/seller', [SellerLoginController::class, 'get_login'])->name('seller.login');
Route::post('seller/sign_up', [SellerLoginController::class, 'login'])->name('seller.sign_up');

Route::group(['middleware' => ['guest:seller']], function () {
    Route::prefix('seller')->group(function () {


        /*Route::get('/register', [SellerController::class, 'get_register'])->name('register');
Route::post('/register', [SellerController::class, 'post_register'])->name('register');*/



        Route::middleware([SellerMiddleware::class])->group(function () {

            Route::get('/dashboard', [SellerDashboardController::class, 'index'])
                ->name('seller.dashboard');
            Route::get('/logout', [SellerLoginController::class, 'logout'])->name('seller.logout');
            /*=================================VENUE===================================*/
            Route::get('/add_venue', [VenueController::class, 'get_add_venue'])->name('seller.add_venue');
            Route::post('/add_venue', [VenueController::class, 'post_add_venue']);
            Route::get('/edit_venue/{id}', [VenueController::class, 'get_edit_venue'])
                ->name('seller.venue.get_edit');
            Route::get('/venue', [VenueController::class, 'list_venue'])->name('seller.venue');
            Route::match(['get'], '/venues-ajax', [VenueController::class, 'manageVenuesAjax'])->name('seller.venues.ajax');
            Route::get('/view_venue/{id}', [VenueController::class, 'view_venue'])
                ->name('seller.view_venue');
            Route::post('/edit_venue', [VenueController::class, 'post_edit_venue']);
            Route::get('/delete_venue/{id}', [VenueController::class, 'delete_venue'])
                ->name('seller.venue.delete');

            /*..=========================EndVENUE=========================================*/


            /*===============================Event=========================================*/
            Route::get('/add_event', [EventController::class, 'get_add_event']);
            Route::post('/add_event_first', [EventController::class, 'post_event_first'])
                ->name('seller.manage_event.information');
            Route::get('/instruction', [EventController::class, 'instruction']);
            Route::post('/add_event_policy', [EventController::class, 'policy'])
                ->name('seller.manage_event.policy');
            Route::post('/add_event_flyer', [EventController::class, 'flyer'])
                ->name('seller.manage_event.flyer');
            Route::post('/create_venue', [EventController::class, 'post_create_venue'])
                ->name('seller.create_venue');
            // Route::get('/list_events',[EventController::class, 'get_EventList'])
            Route::match(['get'], '/list_events', [EventController::class, 'get_EventList'])
                ->name('seller.list_events');
            Route::match(['get'], 'manage/events-ajax', [EventController::class, 'manageEventsAjax'])
                ->name('manage.events.ajax');

            // edit eventt
            Route::get('/edit_event/{id}', [EventController::class, 'get_edit_event'])
                ->name('seller.manage_event.edit_event');
            Route::get('/delete_event/{id}', [EventController::class, 'eventDelete'])
                ->name('seller.manage_event.delete_event');
            Route::post('/edit_information', [EventController::class, 'post_editinformation'])
                ->name('seller.manage_event.edit_information');
            Route::post('/edit_event_policy', [EventController::class, 'post_editPolicy'])
                ->name('seller.manage_event.edit_policy');
            Route::post('/edit_event_flyer', [EventController::class, 'post_editFlyer'])
                ->name('seller.manage_event.edit_flyer');
            Route::post('/edit_event_ticket', [TicketController::class, 'post_editTicket'])
                ->name('seller.manage_event.edit_ticket');
            Route::post('/edit_event_detailes', [EventController::class, 'post_editDetailes'])
                ->name('seller.manage_event.edit_detailes');
            // Merchandise
            Route::get('/merchandise_and_services', [MerchandiseController::class, 'get_merchandise_and_services'])
                ->name('merchandise_and_services');
            Route::get('/add_merchandise', [MerchandiseController::class, 'get_merchandise'])->name('get_add_merchandise');
            Route::post('/merchandise', [MerchandiseController::class, 'post_merchandise']);
            
            Route::get('/edit_merchandise/{id}', [MerchandiseController::class, 'get_edit_merchandise'])->name('seller.edit_merchandise');

            Route::post('/edit_merchandise', [MerchandiseController::class, 'post_edit_merchandise'])->name('seller.post_edit_merchandise');

            Route::get('/delete_merchandise/{id}', [MerchandiseController::class, 'delete'])
                ->name('seller.delete_merchandise');
            Route::get('/filter_merchandise', [MerchandiseController::class, 'get_FilterMerchandise'])
                ->name('seller.get_filter_merchandise');

            // past events
            Route::get('/past_events', [EventController::class, 'get_PastEvents'])
                ->name('seller.past_events');



            /*=======================end Event=====================================*/

            /*=======================ticket======================================*/
            // Route::get('/new_price_level',[TicketController::class, 'get_price_level'])->name('ticket.price');

            Route::post('/new_price_level', [TicketController::class, 'post_price_level'])
                ->name('seller.ticket.price');
            Route::get('/edit_price_level', [TicketController::class, 'get_edit_price_level'])
                ->name('ticket.getedit_price');
            Route::post('/edit_price_level', [TicketController::class, 'post_edit_price_level'])
                ->name('seller.ticket.postedit_price');
            Route::get('/delete_price_level', [TicketController::class, 'delete_price_level'])
                ->name('ticket.delete_price');
            Route::post('/ticket', [TicketController::class, 'post_ticket'])
                ->name('seller.manage_event.ticket');
            Route::get('/ticket_sales_page', [TicketController::class, 'get_salesPage'])->name('seller.ticket.salesPage');
            Route::get('/seating_chart_add_tickets', [TicketController::class, 'get_SCadd_ticket'])->name('get_SCadd_ticket');
            Route::post('/add_assigned_seat', [TicketController::class, 'postAdd_assigned_seat'])
                ->name('seller.manage_event.add_assigned_seat');
            Route::post('/edit_assigned_seat', [TicketController::class, 'postEdit_assigned_seat'])
                ->name('seller.manage_event.edit_assigned_seat');
            Route::get('/delete_assigned_seat', [TicketController::class, 'delete_assigned_seat'])
                ->name('seller.manage_event.delete_assigned_seat');
            Route::post('/store_assigned_sc', [TicketController::class, 'postSC_ticket'])
                ->name('seller.manage_event.store_assigned_sc');
            Route::post('/update_assigned_sc', [TicketController::class, 'updateSC_ticket'])
                ->name('seller.manage_event.update_assigned_sc');
            Route::get('/sales_page_preview/checkout', [TicketController::class, 'previw_checkout'])
                ->name('seller.manage_event.preview_checkout');
            Route::post('/preview_buy_ticket', [TicketController::class, 'PostBuyTicket'])
                ->name('seller.manage_event.preview_buy_ticket');
            Route::get('/delete_buy_ticket', [TicketController::class, 'DeleteBuyTicket'])
                ->name('seller.manage_event.delete_buy_ticket');

            /*=========================endticket====================================*/

            /*===========================details=====================================*/

            Route::post('/add_detailes', [EventController::class, 'post_detailes'])
                ->name('seller.manage_event.detailes');
            Route::post('/add_question_ticket', [EventController::class, 'post_ticket_qus'])
                ->name('seller.add_question_ticket');
            Route::post('/add_question_invoice', [EventController::class, 'post_invoice_qus'])
                ->name('seller.add_question_invoice');
            Route::get('/categories', [EventController::class, 'categories']);


            /*============================end details==================================*/

            /*=====================Seller Payment Method===============================*/

            Route::post('/payment_method', [EventController::class, 'PostPaymentMethod'])
                ->name('seller.manage_event.payment_method');

                 Route::post('/edit_payment_method', [EventController::class, 'Edit_PostPaymentMethod'])
                ->name('seller.manage_event.edit_payment_method');

                

            /*=====================End Seller Payment Method===========================*/


//publish
            Route::post('/publish',[EventController::class,'EventPublish'])
            ->name('seller.event.publish');


            /* ===========================Coupon========================================*/

            Route::get('/coupons', [CouponController::class, 'get_coupon'])->name('coupon');
            Route::match(['get'], '/coupons-ajax', [CouponController::class, 'manageCouponAjax'])->name('seller.coupon.ajax');
            Route::get('/promotion', [CouponController::class, 'get_promo'])->name('promotion');
            Route::post('/promotion', [CouponController::class, 'post_promo'])
                ->name('seller.coupons.post_promotion');
            Route::get('/view_coupons/{id}', [CouponController::class, 'get_viewCoupon'])
                ->name('seller.view.coupon');
            Route::get('/edit_promotion_code', [CouponController::class, 'get_edit_promo'])
                ->name('seller.coupons.editgetpromotion');
            Route::post('/edit_promotion', [CouponController::class, 'post_edit_promo'])
                ->name('seller.coupons.editpostpromotion');
            Route::get('/coupon/delete', [CouponController::class, 'delete'])
                ->name('seller.delete.promotion');

            /* ============================End Coupon============================*/


            /*================================Reports=============================*/
            // Route::get('/sales_and_invoice/previw', [SellerReportsController::class, 'get_salesAndInvoicePreview'])->name('seller.sales_invoice.preview');


            Route::get('/sales_and_invoice', [SellerReportsController::class, 'get_salesAndInvoice'])
            ->name('seller.sales_invoice');

            Route::get('/sold_ticket', [SellerReportsController::class, 'get_SoldTickets'])
                ->name('seller.get_sold_tickets');

            Route::get('/event_audit', [SellerReportsController::class, 'get_EventAudit'])
                ->name('seller.get_event_audit');

           
                
            Route::get('export_event_audit', [SellerReportsController::class, 'EventAudit_export'])->name('export.event_audit');
            
            Route::get('/referrals', [SellerReportsController::class, 'get_Referrals'])
                ->name('seller.get_referrals');

            

            Route::get('/unsold_tickets', [SellerReportsController::class, 'getUnsoldTickets'])
                ->name('seller.unsold_tickets');    



            /*================================End Reports========================*/

            /*===================SeatingChart==================================*/


            Route::get('/create_custom_SeatingChart', [SeatingChartController::class, 'get_custom_SeatingChart'])
                ->name('seller.get_customSeatingChart');
            Route::post('/SeatingChart', [SeatingChartController::class, 'post_SeatingChart'])
                ->name('seller.post_SeatingChart');
            Route::match(['get'], 'seating_chart_list', [SeatingChartController::class, 'get_list_SeatingChart'])->name('seller.seating_chart_list');
            Route::match(['get'], 'seating_chart-ajax', [SeatingChartController::class, 'manageScAjax'])->name('seller.seating_chart.ajax');
            Route::get('/view_seatingchart/{id}', [SeatingChartController::class, 'view_page_SeatingChart'])
                ->name('seller.view_seatingchart');
            Route::get('/edit_seatingchart/{id}', [SeatingChartController::class, 'edit_page_SeatingChart'])
                ->name('seller.edit_seatingchart');
            Route::post('/Edit_SeatingChart', [SeatingChartController::class, 'post_EditSeatingChart'])
                ->name('seller.post_EditSeatingChart');
            Route::get('/delete_seatingchart/{id}', [SeatingChartController::class, 'delete_SeatingChart'])
                ->name('seller.delete_seatingchart');
            /*=================== End SeatingChart=============================*/

            /*=============================Content Managing========================*/
            Route::get('/content_management/return_policy', [SellerContentManageController::class, 'get_ReturnPolicy'])
                ->name('seller.content_management.return_policy');
            Route::get('/content_management/edit_return_policy/{id}', [SellerContentManageController::class, 'getEdit_ReturnPolicy'])
                ->name('seller.content_management.edit_return_policy');
            Route::get('/content_management/privacy_policy', [SellerContentManageController::class, 'get_PrivacyPolicy'])
                ->name('seller.content_management.privacy_policy');
            Route::get('/content_management/edit_privacy_policy/{id}', [SellerContentManageController::class, 'getEdit_PrivacyPolicy'])
                ->name('seller.content_management.edit_privacy_policy');
            Route::get('/content_management/terms_of_use', [SellerContentManageController::class, 'get_TermsOfUse'])
                ->name('seller.content_management.terms_of_use');
            Route::get('/content_management/edit_terms_of_use/{id}', [SellerContentManageController::class, 'getEdit_TermsOfUse'])
                ->name('seller.content_management.edit_terms_of_use');
            Route::get('/content_management/terms_of_purchase', [SellerContentManageController::class, 'get_TermsOfPurchase'])
                ->name('seller.content_management.terms_of_purchase');
            Route::get('/content_management/edit_terms_of_purchase/{id}', [SellerContentManageController::class, 'getEdit_TermsOfPurchase'])
                ->name('seller.content_management.edit_terms_of_purchase');
            Route::get('/content_management/about_us', [SellerContentManageController::class, 'get_AboutUs'])
                ->name('seller.content_management.about_us');
            Route::get('/content_management/edit_about_us/{id}', [SellerContentManageController::class, 'getEdit_AboutUs'])
                ->name('seller.content_management.edit_about_us');
            Route::get('/content_management/add_content', [SellerContentManageController::class, 'getAdd_content'])
                ->name('seller.content_management.add_content');
            Route::post('/content_management/store_content', [SellerContentManageController::class, 'store_content'])
                ->name('seller.content_management.store_content');
            Route::post('/content_management/update_content', [SellerContentManageController::class, 'update_content'])
                ->name('seller.content_management.update_content');
            Route::post('/content_management/store_return_policy', [SellerContentManageController::class, 'store_ReturnPolicy'])
                ->name('seller.content_management.store_return_policy');


            /*=============================End Content Managing========================*/

            /*==========================Site Settings==================================*/

            Route::get('accounts_and_settings/site_settings', [SiteSettingsController::class, 'Get_SiteSettings'])
                ->name('seller.accounts_and_settings.site_settings');

            Route::post('accounts_and_settings/site_settings/social_meadia', [SiteSettingsController::class, 'Post_SocialMedia'])
                ->name('seller.accounts_and_settings.site_settings.social_media');
                Route::post('accounts_and_settings/site_settings/social_meadia/edit', [SiteSettingsController::class, 'PostEdit_SocialMedia'])
                ->name('seller.accounts_and_settings.site_settings.edit_social_media');

                Route::post('accounts_and_settings/site_settings/Google_Analytics', [SiteSettingsController::class, 'Post_Google_Analytics'])
                ->name('seller.accounts_and_settings.site_settings.Google_Analytics');
                
                Route::post('accounts_and_settings/site_settings/Google_Analytics/edit', [SiteSettingsController::class, 'PostEdit_Google_Analytics'])
                ->name('seller.accounts_and_settings.site_settings.edit_Google_Analytics');



            /*==========================End Site Settings==================================*/


            //Event Package.........................................................................
            Route::namespace('App\Http\Controllers')->group(function () {
                Route::get('packages', 'EventPackageController@packages')->name("seller.package");
                Route::get('create-package', 'EventPackageController@create_package')->name("seller.create_package");
                Route::POST('save-package', 'EventPackageController@save_package')->name("seller.savepackage");
            });
            //Event Package Ends here................................................................
        });
    });
});


Route::get('uploads/{filename}', [EventController::class, 'displayImage'])
    ->name('seller.displayflyer');

    
  
Route::get('/event_statement', function () {
    return view('seller.manage_event.event_statement');
});

Route::get('/question_bank', function () {
    return view('seller.manage_event.question_bank');
});


Route::get('/packages', function () {
    return view('seller.manage_event.packages');
});

Route::get('/new_package', function () {
    return view('seller.manage_event.new_package');
});

Route::get('/tickets', function () {
    return view('seller.ticket');
});


// Route::get('/sales_and_invoice', function () {
//     return view('seller.reports.sales_and_invoice');
// });

// Route::get('/unsold_tickets', function () {
//     return view('seller.reports.unsold_tickets');
// });

Route::get('/print_ticket', function () {
    return view('seller.delivery_reports.print_ticket');
});
Route::get('/admission_list', function () {
    return view('seller.delivery_reports.admission_list');
});
// Route::get('/site_settings', function () {
//     return view('seller.accounts&settings.site_settings');
// });
Route::get('/add_to_site', function () {
    return view('seller.accounts&settings.add_to_site');
});

Route::get('/billing_and_payments', function () {
    return view('seller.accounts&settings.billing_and_payments');
});
Route::get('/design_site', function () {
    return view('seller.accounts&settings.design_site');
});

Route::get('/plan_and_feature', function () {
    return view('seller.accounts&settings.plan_and_feature');
});


Route::get('/about_us', function () {
    return view('seller.content_management.about_us');
});

Route::get('/faq', function () {
    return view('seller.others.faq');
});

Route::get('/instruction', function () {
    return view('seller.others.instruction');
});


/*
|--------------------------------------------------------------------------
| End Seller Web Routes
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| Admin Routes Start
|--------------------------------------------------------------------------
|
|All Routes for Admin starts from here

*/

Route::view('/admin', 'admin.login')->name('admin.login');


Route::namespace('App\Http\Controllers\admin')->group(function () {

    Route::post('/admin/login', 'AdminLoginController@login_submit')->name('admin.login');
    Route::get('/admin/logout', 'AdminLoginController@logout')->name('admin.logout');

    Route::group((['middleware' => 'admin', 'prefix' => '/admin',  'as' => 'admin.']), function () {

        Route::get('/dashboard', 'AdminDashboardController@index')->name('dashboard');
        //...Tickets................................................................
        Route::get('/all-tickets', 'AdminTicketController@alltickets')->name('all_tickets');
        Route::get('/alltickets-ajax', 'AdminTicketController@alltickets_ajax')->name('alltickets.ajax');
        Route::get('/ticket-details/{id}', 'AdminTicketController@ticketdetails')->name('ticketdetails');

        //Events.............................................................
        Route::get('/upcoming-events', 'AdminEventController@upcomingevents')->name('upcomingevents');
        Route::get('/ongoinging-events-ajax', 'AdminEventController@ongoingevents_ajax')->name('ongoingevents.ajax');
        Route::get('/completed-events-ajax', 'AdminEventController@completedevents_ajax')->name('completedevents.ajax');
        Route::get('/upcoming-events-ajax', 'AdminEventController@upcomingevents_ajax')->name('upcomingevents.ajax');
        Route::get('/ongoing-events', 'AdminEventController@ongoingevents')->name('ongoingevents');
        Route::get('/completed-events', 'AdminEventController@completedevents')->name('completedevents');
        Route::get('/event-details/{id}', 'AdminEventController@eventdetails')->name('eventdetails');
        //Sellers.................................................................
        Route::get('/active-sellers-ajax', 'AdminSellerController@activesellers_ajax')->name('activesellers.ajax');
        Route::get('/active-sellers', 'AdminSellerController@activesellers')->name('activesellers');
        Route::get('/pending-sellers-ajax', 'AdminSellerController@pendingsellers_ajax')->name('pendingsellers.ajax');
        Route::get('/pending-sellers', 'AdminSellerController@pendingsellers')->name('pendingsellers');
        Route::get('/blocked-sellers', 'AdminSellerController@blockedsellers')->name('blockedsellers');
        Route::get('/blocked-sellers-ajax', 'AdminSellerController@blockedsellers_ajax')->name('blockedsellers.ajax');
        Route::get('/seller-details/{id}', 'AdminSellerController@sellerdetails')->name('sellerdetails');
        Route::get('/sellerevents/{id}', 'AdminSellerController@sellerevents')->name('sellerevents.ajax');
        //buyers..................................................................................
        Route::get('/active-buyers-ajax', 'AdminBuyerController@activebuyers_ajax')->name('activebuyers.ajax');
        Route::get('/active-buyers', 'AdminBuyerController@activebuyers')->name('activebuyers');
        Route::get('/pending-buyers-ajax', 'AdminBuyerController@pendingbuyers_ajax')->name('pendingbuyers.ajax');
        Route::get('/pending-buyers', 'AdminBuyerController@pendingbuyers')->name('pendingbuyers');
        Route::get('/blocked-buyers', 'AdminBuyerController@blockedbuyers')->name('blockedbuyers');
        Route::get('/blocked-buyers-ajax', 'AdminBuyerController@blockedbuyers_ajax')->name('blockedbuyers.ajax');
        Route::get('/buyer-details/{id}', 'AdminBuyerController@buyerdetails')->name('buyerdetails');
        Route::get('/buyertickets/{id}', 'AdminBuyerController@buyertickets')->name('buyertickets.ajax');
        Route::get('/ticketinvoice-details/{id}', 'AdminBuyerController@ticketinvoicedetails')->name('ticketinvoicedetails');
        //Payments..........................................................................
        Route::get('/buyer-payment', 'AdminPaymentController@buyerpayment')->name('buyerpayment');
        Route::get('/buyer-payment-ajax', 'AdminPaymentController@buyerpayment_ajax')->name('buyerpayment.ajax');
        Route::get('/buyer-payment-details/{id}', 'AdminPaymentController@buyerpayment_details')->name('buyerpayment_details');
        Route::get('/seller-payment', 'AdminPaymentController@sellerpayment')->name('sellerpayment');
        Route::get('/seller-payment-ajax', 'AdminPaymentController@sellerpayment_ajax')->name('sellerpayment.ajax');
        Route::get('/seller-payment-details/{id}', 'AdminPaymentController@sellerpayment_details')->name('sellerpayment_details');
        //........................seller_plan.............................................................
        Route::resource('seller_plan', SellerPlanController::class);
        Route::get('seller_plan/delete/{id}', 'SellerPlanController@destroy');
        Route::post('update_seller_plan_status', 'SellerPlanController@update_seller_plan_status')->name('update_seller_plan_status');

        //........................Features.............................................................
        Route::resource('features', FeatureController::class);
        Route::get('features/delete/{id}', 'FeatureController@destroy');
        Route::post('update_features_status', 'FeatureController@update_features_status')->name('update_features_status');


        //........................seller_plan_details.............................................................
        Route::resource('seller_plan_details', SellerPlanDetailsController::class);
        Route::get('seller_plan_details/delete/{id}', 'SellerPlanDetailsController@destroy');
        Route::post('update_seller_plan_detail_status', 'SellerPlanDetailsController@update_seller_plan_status')->name('update_seller_plan_details_status');
        //............category..........................
        Route::get('category', 'CategoryController@category')->name('category');
        Route::post('update_category_status', 'CategoryController@update_category_status')->name('UpdateCategoryStatus');
        Route::get('addcategory', 'CategoryController@addcategory');
        Route::get('category_edit/{id}', 'CategoryController@category_edit');
        Route::get('category_delete/{id}', 'CategoryController@category_delete');
        Route::get('delete_category_image/{id}', 'CategoryController@delete_category_image');
        Route::post('update_category/{id}', 'CategoryController@category_update');
        Route::post('addcategory_create', 'CategoryController@addcategory_create');
        //........................Allication.............................................................
        Route::get('application-manage', 'ApplicationController@edit')->name('application.edit');
        Route::POST('application-update', 'ApplicationController@update')->name('application.update');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes Ends
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Home Frondend Routes Start
|--------------------------------------------------------------------------
|
|All Routes for Home starts from here

*/

Route::namespace('App\Http\Controllers\home')->group(function () {
    // Route::view('/','home.index');
    Route::get('/home', 'IndexController@index')->name('home');
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('find-ticket/{id}', 'IndexController@find_ticket')->name('find_ticket');
    Route::POST('category-pagination', 'IndexController@category_list')->name('category.pagination.fetch');
    Route::GET('category/{id}', 'IndexController@category')->name('category');
    Route::POST('event_date_search', 'IndexController@event_date_search')->name('event_date_search');
    //............category...................................................
    Route::GET('sub-category/{id}/{name?}', 'CategoryController@sub_category')->name('sub_category');
    Route::POST('category_event_search', 'CategoryController@category_event_search')->name('category_event_search');

    //NAV BAR LINKS...........................................................
    Route::GET('buy-tickets', 'IndexController@buy_tickets')->name('buy_tickets');
    Route::GET('contact', 'IndexController@contact')->name('contact');
    Route::GET('features', 'IndexController@features')->name('features');
    Route::GET('pricing', 'IndexController@pricing')->name('pricing');
    Route::POST('contact_form_submit', 'IndexController@contact_form_submit')->name('contact_form_submit');

    //SEARCH .......................................................................
    Route::POST('home_search', 'SearchController@home_search')->name('home_search');
    Route::POST('event_search', 'SearchController@event_search')->name('event_search');
    Route::GET('link_search', 'SearchController@link_search')->name('link_search');
    //cart.........................................................................
    Route::GET('cart', 'CartController@cart')->name('cart');
    Route::POST('add-to-cart', 'CartController@addtocart')->name('addtocart');
    Route::POST('add-to-cart-sc', 'CartController@addtocart_sc')->name('addtocart.sc');
    Route::GET('delete_cart/{id}', 'CartController@delete_cart')->name('delete_cart');

    Route::POST('update-cart-sc', 'CartController@update_sc')->name('update.sc');


    //..............Buyer...........................................................
    Route::POST('register-buyer', 'BuyerController@buyer_registration')->name('buyer_registration');
    Route::POST('login-buyer', 'BuyerController@buyer_login')->name('buyer_login');
    Route::view('ticketpre', 'home.ticketpreview')->name('ticketpre');

    // Route::group((['middleware' => ['buyer']]), function () {

    
Route::group(['middleware' => 'buyer', 'verified'], function () {

        Route::GET('buyer-profile', 'BuyerController@buyer_profile')->name('buyer_profile');
        Route::POST('update-buyer-profile', 'BuyerController@update_buyer_profile')->name('update_buyer_profile');

        // Route::view('checkout', 'home.checkout')->name('checkout');
  Route::GET('checkout', [CartController::class,'get_checkout'])
        ->name('checkout');
      
        
        //tickets.............................................
        Route::GET('tickets', 'TicketController@all_tickets')->name('tickets');
        Route::GET('upcoming-tickets', 'TicketController@upcoming_tickets')->name('upcoming_tickets');
        Route::POST('ticket_details', 'TicketController@ticket_details')->name('ticket_details');



        //order...................................................
        Route::POST('create-order', 'OrderController@create_order')->name('create_order');
        Route::GET('orders', 'OrderController@orders')->name('orders');
        Route::POST('order_details', 'OrderController@order_details')->name('order_details');

        // route for processing payment
        Route::get('/paypal', 'PaymentController@payWithpaypal')->name('paypal');

        // route for check status of the payment
        Route::get('/status', 'PaymentController@getPaymentStatus')->name('status');
        Route::get('/payment-success', 'OrderController@payment_success')->name('payment-success');

        
    });
    Route::group((['middleware' => 'buyer']), function () {
        
        Route::GET('logout-buyer', 'BuyerController@logout')->name('buyer_logout');
        });

    //seller.........................................................................
    Route::GET('register-seller', 'SellerController@seller_registration')->name('seller_registration');
    Route::POST('register-seller-firststep', 'SellerController@seller_registrion_save')->name('seller_registrion_save');
    Route::GET('register-seller-plans', 'SellerController@seller_registration_plan')->name('seller_registration_plan');
});

/*
|--------------------------------------------------------------------------
| Home frondend Routes Ends
|--------------------------------------------------------------------------
*/
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('storage:link');
    //$exitCode = exec('composer dump-autoload');
    // return what you want
});


//email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| Delete this section After development
|--------------------------------------------------------------------------
*/
Route::get('/seed', function () {
    Artisan::call('db:seed --class=AdminSeeder');
    Artisan::call('db:seed --class=ApplicationSeeder');
    Artisan::call('db:seed --class=CountriesTableSeeder');
    Artisan::call('db:seed --class=SellerPlan');
});

Route::get('/seedadmin', function () {
    Artisan::call('db:seed --class=AdminSeeder');
});
Route::get('/migrate', function () {
    Artisan::call('migrate');
    dd('migrated!');
});
Route::get('/migratefresh', function () {
    Artisan::call('migrate:fresh --seed');
    dd('migrated!');
});
/*
|--------------------------------------------------------------------------
| Delete Above this section After development
|--------------------------------------------------------------------------
*/
