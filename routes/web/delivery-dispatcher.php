<?php

use App\Base\Constants\Auth\Role;

Route::middleware('auth:web')->group(function () {
    Route::middleware(role_middleware(Role::DELIVERY_DISPATCHER))->group(function () {
    });

    Route::namespace('DeliveryDispatcher')->group(function () {
        Route::get('dispatch-delivery/dashboard', 'DeliveryDispatcherController@dashboard');
        Route::get('fetch/booking-screen/{modal}', 'DeliveryDispatcherController@fetchBookingScreen');

        Route::post('dispatch-delivery/request/create', 'DispatcherCreateRequestController@createRequest');

        Route::get('fetch/dispatch-delivery-request_lists', 'DeliveryDispatcherController@fetchRequestLists');

        Route::get('request/detail_view/{requestmodel}','DeliveryDispatcherController@requestDetailedView')->name('dispatcherRequestDetailView');


        Route::get('dispatch/profile', 'DeliveryDispatcherController@profile')->name('dispatcherProfile');
        Route::get('dispatch/book-now', 'DeliveryDispatcherController@bookNow');
        Route::get('dispatch/book-now-delivery', 'DeliveryDispatcherController@bookNowDelivery');

    });
    Route::middleware('auth:web')->namespace('Admin')->group(function () {
        /** Chat Module*/
        Route::group(['prefix' => 'chat'], function () {
            Route::get('/', 'ChatController@index'); 
            Route::POST('/send_message', 'ChatController@send_message'); 
            Route::get('/get-chat-messages', 'ChatController@get_chat_messages'); 
            Route::get('/get-notication-count', 'ChatController@get_notication_count'); 
            Route::get('/check_new_data_exist', 'ChatController@check_new_data_exist'); 
             
        });  
});
});
