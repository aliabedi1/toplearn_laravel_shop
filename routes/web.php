<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
/*
|--------------------------------------------------------------------------
| Web Routes
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




/*
|--------------------------------------------------------------------------
| ADMIN
|-------------------------------------------------------------------------- 
*/


Route::prefix('admin')->namespace('Admin')->group(function(){
    
    //home (admin panel)
    Route::get('/', 'AdminDashboardController@index')->name('admin.home');

    //market
    Route::prefix('market')->namespace('Market')->group(function(){
        
        //category
        Route::prefix('category')->group(function(){
            
            Route::get('/', 'CategoryController@index')->name('admin.market.category.index');
            Route::get('/create', 'CategoryController@create')->name('admin.market.category.create');
            Route::post('/store', 'CategoryController@store')->name('admin.market.category.store');
            Route::get('/edit/{productCategory}', 'CategoryController@edit')->name('admin.market.category.edit');
            Route::put('/update/{productCategory}', 'CategoryController@update')->name('admin.market.category.update');
            Route::delete('/destroy/{productCategory}', 'CategoryController@destroy')->name('admin.market.category.destroy');
            Route::get('/status/{productCategory}', 'CategoryController@status')->name('admin.market.category.status');

        });

        //brand
        Route::prefix('brand')->group(function(){
            
            Route::get('/', 'BrandController@index')->name('admin.market.brand.index');
            Route::get('/create', 'BrandController@create')->name('admin.market.brand.create');
            Route::post('/store', 'BrandController@store')->name('admin.market.brand.store');
            Route::get('/edit/{brand}', 'BrandController@edit')->name('admin.market.brand.edit');
            Route::put('/update/{brand}', 'BrandController@update')->name('admin.market.brand.update');
            Route::delete('/destroy/{brand}', 'BrandController@destroy')->name('admin.market.brand.destroy');
            Route::get('/status/{brand}', 'BrandController@status')->name('admin.market.brand.status');

        });
        
        //Comment
        Route::prefix('comment')->group(function(){

            Route::get('/', 'CommentController@index')->name('admin.market.comment.index');
            Route::get('/show/{comment}', 'CommentController@show')->name('admin.market.comment.show');
            Route::delete('/destroy/{comment}', 'CommentController@destroy')->name('admin.market.comment.destroy');
            Route::get('/status/{comment}', 'CommentController@status')->name('admin.market.comment.status');
            Route::get('/approved/{comment}', 'CommentController@approved')->name('admin.market.comment.approved');
            Route::post('/answer/{comment}', 'CommentController@answer')->name('admin.market.comment.answer');

        });

        //Delivery
        Route::prefix('delivery')->group(function(){
            
            Route::get('/', 'DeliveryController@index')->name('admin.market.delivery.index');
            Route::get('/create', 'DeliveryController@create')->name('admin.market.delivery.create');
            Route::post('/store', 'DeliveryController@store')->name('admin.market.delivery.store');
            Route::get('/edit/{delivery}', 'DeliveryController@edit')->name('admin.market.delivery.edit');
            Route::put('/update/{delivery}', 'DeliveryController@update')->name('admin.market.delivery.update');
            Route::delete('/destroy/{delivery}', 'DeliveryController@destroy')->name('admin.market.delivery.destroy');
            Route::get('/status/{delivery}', 'DeliveryController@status')->name('admin.market.delivery.status');

        });


        //Discount
        Route::prefix('discount')->group(function(){
            
            Route::get('/copan', 'DiscountController@copan')->name('admin.market.discount.copan');
            Route::get('/copan/create', 'DiscountController@copanCreate')->name('admin.market.discount.copan.create');
            Route::post('/copan/store', 'DiscountController@copanStore')->name('admin.market.discount.copan.store');
            Route::get('/copan/edit/{copan}', 'DiscountController@copanEdit')->name('admin.market.discount.copan.edit');
            Route::put('/copan/update/{copan}', 'DiscountController@copanUpdate')->name('admin.market.discount.copan.update');
            Route::delete('/copan/destroy/{copan}', 'DiscountController@copanDestroy')->name('admin.market.discount.copan.destroy');
            Route::get('/copan/status/{copan}', 'DiscountController@copanStatus')->name('admin.market.discount.copan.status');

            Route::get('/common-discount', 'DiscountController@commonDiscount')->name('admin.market.discount.commonDiscount');
            Route::get('/common-discount/create', 'DiscountController@commonDiscountCreate')->name('admin.market.discount.commonDiscount.create');
            Route::post('/common-discount/store', 'DiscountController@commonDiscountStore')->name('admin.market.discount.commonDiscount.store');
            Route::delete('/common-discount/destroy/{commonDiscount}', 'DiscountController@commonDiscountDestroy')->name('admin.market.discount.commonDiscount.destroy');
            Route::get('/common-discount/status/{commonDiscount}', 'DiscountController@commonDiscountStatus')->name('admin.market.discount.commonDiscount.status');

            Route::get('/amazing-discount', 'DiscountController@amazingDiscount')->name('admin.market.discount.amazingDiscount');
            Route::get('/amazing-discount/create', 'DiscountController@amazingDiscountCreate')->name('admin.market.discount.amazingDiscount.create');
            Route::post('/amazing-discount/store', 'DiscountController@amazingDiscountStore')->name('admin.market.discount.amazingDiscount.store');
            Route::get('/amazing-discount/edit/{amazingDiscount}', 'DiscountController@amazingDiscountEdit')->name('admin.market.discount.amazingDiscount.edit');
            Route::put('/amazing-discount/update/{amazingDiscount}', 'DiscountController@amazingDiscountUpdate')->name('admin.market.discount.amazingDiscount.update');
            Route::delete('/amazing-discount/destroy/{amazingDiscount}', 'DiscountController@amazingDiscountDestroy')->name('admin.market.discount.amazingDiscount.destroy');
            Route::get('/amazing-discount/status/{amazingDiscount}', 'DiscountController@amazingDiscountStatus')->name('admin.market.discount.amazingDiscount.status');
           

        });
        
        
        //order
        Route::prefix('order')->group(function(){
            
            Route::get('/', 'OrderController@all')->name('admin.market.order.all');
            Route::get('/new-order', 'OrderController@newOrders')->name('admin.market.order.newOrders');
            Route::get('/sending', 'OrderController@sending')->name('admin.market.order.sending');
            Route::get('/unpaid', 'OrderController@unpaid')->name('admin.market.order.unpaid');
            Route::get('/canceled', 'OrderController@canceled')->name('admin.market.order.canceled');
            Route::get('/returned', 'OrderController@returned')->name('admin.market.order.returned');
            Route::get('/show/{order}', 'OrderController@show')->name('admin.market.order.show');
            Route::get('/change-send-status/{order}', 'OrderController@changeSendStatus')->name('admin.market.order.changeSendStatus');
            Route::get('/change-order-status/{order}', 'OrderController@changeOrderStatus')->name('admin.market.order.changeOrderStatus');
            Route::get('/cancel-order/{order}', 'OrderController@cancelOrder')->name('admin.market.order.cancelOrder');
           

        });

        //payment
        Route::prefix('payment')->group(function(){
            
            Route::get('/', 'PaymentController@index')->name('admin.market.payment.index');
            Route::get('/online', 'PaymentController@online')->name('admin.market.payment.online');
            Route::get('/offline', 'PaymentController@offline')->name('admin.market.payment.offline');
            Route::get('/cash', 'PaymentController@cash')->name('admin.market.payment.cash');
            Route::get('/show/{payment}', 'PaymentController@show')->name('admin.market.payment.show');
            Route::get('/returned/{payment}', 'PaymentController@returned')->name('admin.market.payment.returned');
            Route::get('/canceled/{payment}', 'PaymentController@canceled')->name('admin.market.payment.canceled');
          

        });

        //product
        Route::prefix('product')->group(function(){

            Route::get('/', 'ProductController@index')->name('admin.market.product.index');
            Route::get('/create', 'ProductController@create')->name('admin.market.product.create');
            Route::post('/store', 'ProductController@store')->name('admin.market.product.store');
            Route::get('/edit/{product}', 'ProductController@edit')->name('admin.market.product.edit');
            Route::put('/update/{product}', 'ProductController@update')->name('admin.market.product.update');
            Route::delete('/destroy/{product}', 'ProductController@destroy')->name('admin.market.product.destroy');
            Route::get('/status/{product}', 'ProductController@status')->name('admin.market.product.status');
            Route::get('/marketable/{product}', 'ProductController@marketable')->name('admin.market.product.marketable');


            //product color
            Route::get('/color/{product}', 'ProductColorController@index')->name('admin.market.color.index');
            Route::get('/color/{product}/create', 'ProductColorController@create')->name('admin.market.color.create');
            Route::post('/color/{product}/store', 'ProductColorController@store')->name('admin.market.color.store');
            Route::delete('/color/destroy/{product}/{productColor}', 'ProductColorController@destroy')->name('admin.market.color.destroy');



            //gallery
            Route::get('/gallery/{product}', 'GalleryController@index')->name('admin.market.gallery.index');
            Route::get('/gallery/{product}/create', 'GalleryController@create')->name('admin.market.gallery.create');
            Route::post('/gallery/{product}/store', 'GalleryController@store')->name('admin.market.gallery.store');
            Route::delete('/gallery/destroy/{product}/{productGallery}', 'GalleryController@destroy')->name('admin.market.gallery.destroy');

        });


         //property
         Route::prefix('property')->group(function(){
            
            Route::get('/', 'PropertyController@index')->name('admin.market.property.index');
            Route::get('/create', 'PropertyController@create')->name('admin.market.property.create');
            Route::post('/store', 'PropertyController@store')->name('admin.market.property.store');
            Route::get('/edit/{property}', 'PropertyController@edit')->name('admin.market.property.edit');
            Route::put('/update/{property}', 'PropertyController@update')->name('admin.market.property.update');
            Route::delete('/destroy/{property}', 'PropertyController@destroy')->name('admin.market.property.destroy');
            

            //property values
            Route::get('/value/{categoryAttribute}', 'PropertyValueController@index')->name('admin.market.value.index');
            Route::get('/value/create/{categoryAttribute}', 'PropertyValueController@create')->name('admin.market.value.create');
            Route::post('/value/store/{categoryAttribute}', 'PropertyValueController@store')->name('admin.market.value.store');
            Route::get('/value/edit/{categoryAttribute}/{categoryValue}', 'PropertyValueController@edit')->name('admin.market.value.edit');
            Route::put('/value/update/{categoryAttribute}/{categoryValue}', 'PropertyValueController@update')->name('admin.market.value.update');
            Route::delete('/value/destroy/{categoryAttribute}/{categoryValue}', 'PropertyValueController@destroy')->name('admin.market.value.destroy');

        });


        //store
        Route::prefix('store')->group(function(){
            
            Route::get('/', 'StoreController@index')->name('admin.market.store.index');
            Route::get('/add-to-store/{product}', 'StoreController@addToStore')->name('admin.market.store.add-to-store');
            Route::post('/store/{product}', 'StoreController@store')->name('admin.market.store.store');
            Route::get('/edit/{product}', 'StoreController@edit')->name('admin.market.store.edit');
            Route::put('/update/{product}', 'StoreController@update')->name('admin.market.store.update');

        });

    
    });

    //content
    Route::prefix('content')->namespace('Content')->group(function(){


        //category
        Route::prefix('category')->group(function(){
            
            Route::get('/', 'CategoryController@index')->name('admin.content.category.index');
            Route::get('/create', 'CategoryController@create')->name('admin.content.category.create');
            Route::post('/store', 'CategoryController@store')->name('admin.content.category.store');
            Route::get('/edit/{postCategory}', 'CategoryController@edit')->name('admin.content.category.edit');
            Route::put('/update/{postCategory}', 'CategoryController@update')->name('admin.content.category.update');
            Route::delete('/destroy/{postCategory}', 'CategoryController@destroy')->name('admin.content.category.destroy');
            Route::get('/status/{postCategory}', 'CategoryController@status')->name('admin.content.category.status');

        });

        //Comment
        Route::prefix('comment')->group(function(){
            
            Route::get('/', 'CommentController@index')->name('admin.content.comment.index');
            Route::get('/show/{comment}', 'CommentController@show')->name('admin.content.comment.show');
            // Route::post('/store', 'CommentController@store')->name('admin.content.comment.store');
            // Route::get('/edit/{comment}', 'CommentController@edit')->name('admin.content.comment.edit');
            // Route::put('/update/{comment}', 'CommentController@update')->name('admin.content.comment.update');
            Route::delete('/destroy/{comment}', 'CommentController@destroy')->name('admin.content.comment.destroy');
            Route::get('/status/{comment}', 'CommentController@status')->name('admin.content.comment.status');
            Route::get('/approved/{comment}', 'CommentController@approved')->name('admin.content.comment.approved');
            Route::post('/answer/{comment}', 'CommentController@answer')->name('admin.content.comment.answer');

        });

        //faq
        Route::prefix('faq')->group(function(){
            
            Route::get('/', 'FAQController@index')->name('admin.content.faq.index');
            Route::get('/create', 'FAQController@create')->name('admin.content.faq.create');
            Route::post('/store', 'FAQController@store')->name('admin.content.faq.store');
            Route::get('/edit/{faq}', 'FAQController@edit')->name('admin.content.faq.edit');
            Route::put('/update/{faq}', 'FAQController@update')->name('admin.content.faq.update');
            Route::delete('/destroy/{faq}', 'FAQController@destroy')->name('admin.content.faq.destroy');
            Route::get('/status/{faq}', 'FAQController@status')->name('admin.content.faq.status');

        });

        //menu
        Route::prefix('menu')->group(function(){
            
            Route::get('/', 'MenuController@index')->name('admin.content.menu.index');
            Route::get('/create', 'MenuController@create')->name('admin.content.menu.create');
            Route::post('/store', 'MenuController@store')->name('admin.content.menu.store');
            Route::get('/edit/{menu}', 'MenuController@edit')->name('admin.content.menu.edit');
            Route::put('/update/{menu}', 'MenuController@update')->name('admin.content.menu.update');
            Route::delete('/destroy/{menu}', 'MenuController@destroy')->name('admin.content.menu.destroy');
            Route::get('/status/{menu}', 'MenuController@status')->name('admin.content.menu.status');

        });

        //post
        Route::prefix('post')->group(function(){
            
            Route::get('/', 'PostController@index')->name('admin.content.post.index');
            Route::get('/create', 'PostController@create')->name('admin.content.post.create');
            Route::post('/store', 'PostController@store')->name('admin.content.post.store');
            Route::get('/edit/{post}', 'PostController@edit')->name('admin.content.post.edit');
            Route::put('/update/{post}', 'PostController@update')->name('admin.content.post.update');
            Route::delete('/destroy/{post}', 'PostController@destroy')->name('admin.content.post.destroy');
            Route::get('/status/{post}', 'PostController@status')->name('admin.content.post.status');
            Route::get('/commentable/{post}', 'PostController@commentable')->name('admin.content.post.commentable');

        });

        //page
        Route::prefix('page')->group(function(){
            
            Route::get('/', 'PageController@index')->name('admin.content.page.index');
            Route::get('/create', 'PageController@create')->name('admin.content.page.create');
            Route::post('/store', 'PageController@store')->name('admin.content.page.store');
            Route::get('/edit/{page}', 'PageController@edit')->name('admin.content.page.edit');
            Route::put('/update/{page}', 'PageController@update')->name('admin.content.page.update');
            Route::delete('/destroy/{page}', 'PageController@destroy')->name('admin.content.page.destroy');
            Route::get('/status/{page}', 'PageController@status')->name('admin.content.page.status');

        });



    });

    //user
    Route::prefix('user')->namespace('User')->group(function(){
    
        //admin-user
        Route::prefix('admin-user')->group(function(){
                
            Route::get('/', 'AdminUserController@index')->name('admin.user.admin-user.index');
            Route::get('/create', 'AdminUserController@create')->name('admin.user.admin-user.create');
            Route::post('/store', 'AdminUserController@store')->name('admin.user.admin-user.store');
            Route::get('/edit/{admin}', 'AdminUserController@edit')->name('admin.user.admin-user.edit');
            Route::put('/update/{admin}', 'AdminUserController@update')->name('admin.user.admin-user.update');
            Route::delete('/destroy/{admin}', 'AdminUserController@destroy')->name('admin.user.admin-user.destroy');
            Route::get('/status/{admin}', 'AdminUserController@status')->name('admin.user.admin-user.status');
            Route::get('/activation/{admin}', 'AdminUserController@activation')->name('admin.user.admin-user.activation');

        });


        //customer
        Route::prefix('customer')->group(function(){

            Route::get('/', 'CustomerController@index')->name('admin.user.customer.index');
            Route::get('/create', 'CustomerController@create')->name('admin.user.customer.create');
            Route::post('/store', 'CustomerController@store')->name('admin.user.customer.store');
            Route::get('/edit/{user}', 'CustomerController@edit')->name('admin.user.customer.edit');
            Route::put('/update/{user}', 'CustomerController@update')->name('admin.user.customer.update');
            Route::delete('/destroy/{user}', 'CustomerController@destroy')->name('admin.user.customer.destroy');
            Route::get('/status/{user}', 'CustomerController@status')->name('admin.user.customer.status');
            Route::get('/activation/{user}', 'CustomerController@activation')->name('admin.user.customer.activation');

        });


        //role
        Route::prefix('role')->group(function(){

            Route::get('/', 'RoleController@index')->name('admin.user.role.index');
            Route::get('/create', 'RoleController@create')->name('admin.user.role.create');
            Route::post('/store', 'RoleController@store')->name('admin.user.role.store');
            Route::get('/permission-form/{role}', 'RoleController@permissionForm')->name('admin.user.role.permission-form');
            Route::put('/permission-update/{role}', 'RoleController@permissionUpdate')->name('admin.user.role.permission-update');
            Route::get('/edit/{role}', 'RoleController@edit')->name('admin.user.role.edit');
            Route::put('/update/{role}', 'RoleController@update')->name('admin.user.role.update');
            Route::delete('/destroy/{role}', 'RoleController@destroy')->name('admin.user.role.destroy');

        });


        //permission
        Route::prefix('permission')->group(function(){

            Route::get('/', 'PermissionController@index')->name('admin.user.permission.index');
            Route::get('/create', 'PermissionController@create')->name('admin.user.permission.create');
            Route::post('/store', 'PermissionController@store')->name('admin.user.permission.store');
            Route::get('/edit/{id}', 'PermissionController@edit')->name('admin.user.permission.edit');
            Route::put('/update/{id}', 'PermissionController@update')->name('admin.user.permission.update');
            Route::delete('/destroy/{id}', 'PermissionController@destroy')->name('admin.user.permission.destroy');

        });





        
    });

    //notify
    Route::prefix('notify')->namespace('Notify')->group(function(){

        //email
        Route::prefix('email')->group(function(){
                
            Route::get('/', 'EmailController@index')->name('admin.notify.email.index');
            Route::get('/create', 'EmailController@create')->name('admin.notify.email.create');
            Route::post('/store', 'EmailController@store')->name('admin.notify.email.store');
            Route::get('/edit/{email}', 'EmailController@edit')->name('admin.notify.email.edit');
            Route::put('/update/{email}', 'EmailController@update')->name('admin.notify.email.update');
            Route::delete('/destroy/{email}', 'EmailController@destroy')->name('admin.notify.email.destroy');
            Route::get('/status/{email}', 'EmailController@status')->name('admin.notify.email.status');

        });


        //email file
        Route::prefix('email-file')->group(function(){
                
            Route::get('/{email}', 'EmailFileController@index')->name('admin.notify.email-file.index');
            Route::get('/{email}/create', 'EmailFileController@create')->name('admin.notify.email-file.create');
            Route::post('/{email}/store', 'EmailFileController@store')->name('admin.notify.email-file.store');
            Route::get('/edit/{file}', 'EmailFileController@edit')->name('admin.notify.email-file.edit');
            Route::put('/update/{file}', 'EmailFileController@update')->name('admin.notify.email-file.update');
            Route::delete('/destroy/{file}', 'EmailFileController@destroy')->name('admin.notify.email-file.destroy');
            Route::get('/status/{file}', 'EmailFileController@status')->name('admin.notify.email-file.status');

        });

        //SMS
        Route::prefix('sms')->group(function(){
                
            Route::get('/', 'SMSController@index')->name('admin.notify.sms.index');
            Route::get('/create', 'SMSController@create')->name('admin.notify.sms.create');
            Route::post('/store', 'SMSController@store')->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', 'SMSController@edit')->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', 'SMSController@update')->name('admin.notify.sms.update');
            Route::delete('/destroy/{sms}', 'SMSController@destroy')->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', 'SMSController@status')->name('admin.notify.sms.status');

        });




    });

    //ticket
    Route::prefix('ticket')->namespace('Ticket')->group(function(){


    
        //category
        Route::prefix('category')->group(function(){
            Route::get('/', 'TicketCategoryController@index')->name('admin.ticket.category.index');
            Route::get('/create', 'TicketCategoryController@create')->name('admin.ticket.category.create');
            Route::post('/store', 'TicketCategoryController@store')->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', 'TicketCategoryController@edit')->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', 'TicketCategoryController@update')->name('admin.ticket.category.update');
            Route::delete('/destroy/{ticketCategory}', 'TicketCategoryController@destroy')->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', 'TicketCategoryController@status')->name('admin.ticket.category.status');

        });

        //priority
        Route::prefix('priority')->group(function(){
            
            Route::get('/', [TicketPriorityController::class , 'index'])->name('admin.ticket.priority.index');
            Route::get('/create', 'TicketPriorityController@create')->name('admin.ticket.priority.create');
            Route::post('/store', 'TicketPriorityController@store')->name('admin.ticket.priority.store');
            Route::get('/edit/{ticketPriority}', 'TicketPriorityController@edit')->name('admin.ticket.priority.edit');
            Route::put('/update/{ticketPriority}', 'TicketPriorityController@update')->name('admin.ticket.priority.update');
            Route::delete('/destroy/{ticketPriority}', 'TicketPriorityController@destroy')->name('admin.ticket.priority.destroy');
            Route::get('/status/{ticketPriority}', 'TicketPriorityController@status')->name('admin.ticket.priority.status');

        });

        //admin
        Route::prefix('admin')->group(function(){
            Route::get('/', 'TicketAdminController@index')->name('admin.ticket.admin.index');
            Route::get('/set/{admin}', 'TicketAdminController@set')->name('admin.ticket.admin.set');

        });

        //main
        Route::get('/', 'TicketController@index')->name('admin.ticket.index');
        Route::get('/new-tickets', 'TicketController@newTickets')->name('admin.ticket.newTickets');
        Route::get('/open-tickets', 'TicketController@openTickets')->name('admin.ticket.openTickets');
        Route::get('/close-tickets', 'TicketController@closeTickets')->name('admin.ticket.closeTickets');
        Route::get('/show/{ticket}', 'TicketController@show')->name('admin.ticket.show');
        Route::post('/answer/{ticket}', 'TicketController@answer')->name('admin.ticket.answer');
        Route::get('/change/{ticket}', 'TicketController@change')->name('admin.ticket.change');
    
    });

    //setting
    Route::prefix('setting')->namespace('Setting')->group(function(){
            
        Route::get('/', 'SettingController@index')->name('admin.setting.index');
        // Route::get('/create', 'SettingController@create')->name('admin.setting.create');
        // Route::post('/store', 'SettingController@store')->name('admin.setting.store');
        Route::get('/edit/{setting}', 'SettingController@edit')->name('admin.setting.edit');
        Route::put('/update/{setting}', 'SettingController@update')->name('admin.setting.update');
        Route::delete('/destroy/{setting}', 'SettingController@destroy')->name('admin.setting.destroy');


    });






});



















// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
