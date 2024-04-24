<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\LogoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();


Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {


    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');


    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');

    Route::get('search', 'searchProducts');


    Route::get('contact_us', 'contactUs');

    Route::get('about_us', 'about_us');
});




Route::middleware(['auth'])->group(function () {

    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('cart', [App\Http\Controllers\Frontend\CardController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);


    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);

    Route::get('profile',  [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile',  [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);

    Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'changePassword']);
});


Route::get('thank-You', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index']);

    Route::get('about_us', [App\Http\Controllers\admin\AboutusController::class, 'index']);
    Route::post('about_us', [App\Http\Controllers\admin\AboutusController::class, 'store_5']);

    // Route::get('/about_us', [App\Http\Controllers\Admin\AboutusController::class, 'index']);
    // Route::post('/about_us', [App\Http\Controllers\Admin\AboutusController::class, 'store']);
    // Route::post('about_us', [App\Http\Controllers\admin\AboutusController::class,'store_2']);
    // Route::post('about_us', [App\Http\Controllers\admin\AboutusController::class,'store_3']);
    // Route::post('about_us', [App\Http\Controllers\admin\AboutusController::class,'store_4']);
    // Route::post('about_us', [App\Http\Controllers\admin\AboutusController::class,'store_5']);

    // // contactc routes
    // Route::post('contact/store', [App\Http\Controllers\Admin\ContactControler::class, 'store'])->name('contact.store');
    // Route::get('contact', [App\Http\Controllers\Admin\ContactControler::class, 'index'])->name('user.store');


    Route::get('/contact/store', [App\Http\Controllers\Admin\ContactControler::class, 'showForm'])->name('contact');
    Route::get('/contact_us', [App\Http\Controllers\Admin\ContactControler::class, 'showContactUsView'])->name('contact_us');
    Route::post('/contact/store', [App\Http\Controllers\Admin\ContactControler::class, 'store']);
    Route::get('/contact', [App\Http\Controllers\Admin\ContactControler::class, 'showAdmin'])->name('admin.contact.index');














    Route::get('settings', [App\Http\Controllers\admin\SettingController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\admin\SettingController::class, 'store']);
    Route::post('top_navbar/update_background_color', [App\Http\Controllers\admin\SettingController::class, 'updateBackgroundColor'])->name('color');




    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('Sliders/create', 'store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('Sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete', 'destroy');
    });



    // Category Routes


    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');


        Route::post('/product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/delete', 'deleteProdColor');
    });

    Route::get('/brands', App\Livewire\Admin\Brand\Index::class);


    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
    });




    // orders


    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');



        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/mail', 'mailInvoice');
    });





    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}/edit', 'edit');
        Route::put('users/{user_id}', 'update');
        Route::get('users/{user_id}/delete', 'destroy');
        Route::get('/profile', 'UserController@index')->name('profile');
    });;
});