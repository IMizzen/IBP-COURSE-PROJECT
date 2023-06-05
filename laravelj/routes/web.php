<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\MessageController;
use App\Http\Controllers\AdminPanel\AdminProductController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\AdminPanel\ImageController as AdminImageController;
use App\Http\Controllers\AdminPanel\HomeController as AdminPanelHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\FaqController;
use App\Http\Controllers\AdminPanel\OrderController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\UserController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin', function () {
    return view('pages.admin');
});



Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/references',[HomeController::class,'references'])->name('references');
Route::get('/shop',[HomeController::class,'shop'])->name('shop');
Route::get('/cart',[HomeController::class,'cart'])->name('cart');
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('/storemessage',[HomeController::class,'storemessage'])->name('storemessage');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::post('/storecomment',[HomeController::class,'storecomment'])->name('storecomment');
Route::get('/detail',[HomeController::class,'detail'])->name('detail');
Route::get('/product/{id}',[HomeController::class,'product'])->name('product');
Route::get('/categoryproducts/{id}/{slug}',[HomeController::class,'categoryproducts'])->name('categoryproducts');
Route::get('/search',[HomeController::class,'search'])->name('search');


Route::get('/admin/login', [App\Http\Controllers\AdminPanel\HomeController::class, 'loginform'])->name('login');
Route::post('/admin/logincheck', [App\Http\Controllers\AdminPanel\HomeController::class, 'logincheck'])->name('logincheck');
Route::post('/admin/logout', [App\Http\Controllers\AdminPanel\HomeController::class, 'logout'])->name('admin_logout');
Route::post('/logout', [App\Http\Controllers\AdminPanel\HomeController::class, 'userlogout'])->name('user_logout');

Route::get('/register', [App\Http\Controllers\AdminPanel\HomeController::class, 'registrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AdminPanel\HomeController::class, 'register'])->name('register.action');

//***************** USER AUTH CONTROL ***************************************
Route::middleware('auth')->group(function(){

    //***************** USER PANEL ROUTES  ***************************************
    Route::prefix('userpanel')->name('userpanel.')->controller(UserController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/reviews','reviews')->name('reviews');
        Route::get('/reviewdestroy/{id}','reviewdestroy')->name('reviewdestroy');
        Route::get('/orders','orders')->name('orders');
        Route::get('/orderdetail/{id}','orderdetail')->name('orderdetail');
        Route::get('/cancelproduct/{id}','cancelproduct')->name('cancelproduct');




    });

    //***************** USER SHOP CART CONTROLLER ROUTES  ***************************************
    Route::prefix('/shopcart')->name('shopcart.')->controller(ShopCartController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/add/{id}','add')->name('add');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/show/{id}','show')->name('show');
        Route::post('/order','order')->name('order');
        Route::post('/storeorder','storeorder')->name('storeorder');
        Route::get('/ordercomplete','ordercomplete')->name('ordercomplete');



    });


    //***************** ADMIN PANEL ROUTES  ***************************************
        Route::get('/pages/admin', [App\Http\Controllers\AdminPanel\HomeController::class, 'admin'])->name('admin');
        Route::middleware('admin')->prefix('admin')->name('admin')->group(function () {


        //***************** GENERAL ROUTES  ******************************************************
        Route::get('/setting',[AdminPanelHomeController::class,'setting'])->name('setting');
        Route::post('/setting/update',[AdminPanelHomeController::class,'settingUpdate'])->name('setting.update');



        //***************** ADMIN CATEGORY CONTROLLER ROUTES  ***************************************
        Route::prefix('/category')->name('category.')->controller(AdminCategoryController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
        });

        //***************** ADMIN PRODUCT ROUTES  ***************************************
        Route::prefix('/product')->name('product.')->controller(AdminProductController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
        });

        //***************** ADMIN IMAGE GALERY ROUTES  ***************************************
        Route::prefix('/image')->name('image.')->controller(AdminImageController::class)->group(function () {
            Route::get('/{pid}','index')->name('index');
            Route::get('/create/{pid}','create')->name('create');
            Route::post('/store/{pid}','store')->name('store');
            Route::get('/destroy/{pid}/{id}','destroy')->name('destroy');
        });

        //***************** ADMIN MESSAGE ROUTES  ***************************************
        Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/show/{id}','show')->name('show');
        });

        //***************** ADMIN FAQ ROUTES  ***************************************
        Route::prefix('/faq')->name('faq.')->controller(FaqController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
        });

        //***************** ADMIN COMMENT ROUTES  ***************************************
        Route::prefix('/comment')->name('comment.')->controller(CommentController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/show/{id}','show')->name('show');
        });

        //***************** ADMIN USER ROUTES  ***************************************
        Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/addrole/{id}','addrole')->name('addrole');
            Route::get('/destroyrole/{uid}/{rid}','destroyrole')->name('destroyrole');

        });

        //***************** ADMIN ORDERS ROUTES  ***************************************
        Route::prefix('/order')->name('order.')->controller(OrderController::class)->group(function () {
            Route::get('/{slug}','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
            Route::get('/cancelorder/{id}','cancelorder')->name('cancelorder');
            Route::get('/cancelproduct/{id}','cancelproduct')->name('cancelproduct');
            Route::get('/acceptproduct/{id}','acceptproduct')->name('acceptproduct');


        });


    });// ADMİN PANEL ROUTES GROUP
});// USER AUTH. GROUP
