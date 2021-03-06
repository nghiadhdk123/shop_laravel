<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\DashboardController;
use \App\Http\Controllers\Backend\ProductController;
use \App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Backend\OrderController;
use \App\Http\Controllers\Backend\RatingController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\LogoutController;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Frontend\ProductFeController;
use \App\Http\Controllers\Frontend\CartController;
use \App\Http\Controllers\Backend\StatisticalController;
use \App\Http\Controllers\Backend\NotiController;


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
// Route::get('/' ,function(){
//     return view('welcome');
// });

Route::get('/statistical',
                [StatisticalController::class , 'index'])->name('backend.statistical');
Route::post('/statistical-filter',
                [StatisticalController::class , 'filter'])->name('backend.statisticalfilter');
Route::post('/statistical-30-day',
                [StatisticalController::class , 'OneMonth'])->name('backend.chart30day');
Route::post('/statistical-filter-day',
                [StatisticalController::class , 'filter'])->name('backend.statisticalfilterday');

Route::get('/destroyNoti/{id}',[NotiController::class, 'destroy'])->name('delete.notifi');

Route::get('/',
        [ProductFeController::class , 'index'])->name('frontend.index');
Route::group([    
        'prefix' => 'fe',

    ],function(){
            
            Route::get('/show/{id}',
                    [ProductFeController::class , 'show'])->name('frontend.show');
        
            Route::get('/list/{id}',
                    [ProductFeController::class , 'list'])->name('frontend.list');

            Route::get('/home',
                    [ProductFeController::class , 'home'])->name('frontend.home');

            Route::get('/cout',
                    [ProductFeController::class , 'cout'])->name('frontend.cout');

            Route::get('/cart',[CartController::class , 'index'])->name('list.cart');

            Route::get('/addcart/{id}',[CartController::class , 'add'])->name('add.cart');

            Route::get('/removecart/{id}',[CartController::class , 'remove'])->name('remove.cart');

            Route::get('/destroycart',[CartController::class , 'destroy'])->name('destroy.cart');

            Route::post('/pay',[CartController::class , 'pay'])->name('pay.cart');

            Route::post('/rating',[ProductFeController::class , 'insert_rating'])->name('rating');

            Route::get('/follow',[ProductFeController::class , 'follow'])->name('follow');

});

//Phan xu li login

Route::get('/formLogin' ,
                [LoginController::class , 'FormLogin'])->name('login.form');
Route::post('/login' ,
                [LoginController::class , 'Login'])->name('login.store');

Route::get('/logout',[LogoutController::class,'logout'])->name('logout');

Route::get('/register'
                ,[RegisterController::class , 'showForm'])->name('register.form');

Route::post('/register'
                ,[RegisterController::class , 'register'])->name('register.store');

Route::get('/redirect', 
                [LoginController::class ,'redirectToProvider'])->name('login.redirect');

Route::get('/callback', 
                [LoginController::class ,'handleProviderCallback'])->name('login.callback');

//Phan xu li category
Route::group([
    'prefix' => 'category',
    'middleware' => ['auth']
],function(){

        Route::get('/' , 
                    [CategoryController::class , 'index'])->name('category.admin');

        Route::get('/create' , 
                    [CategoryController::class , 'create'])->name('category.create');

        Route::post('/store' , 
                    [CategoryController::class , 'store'])->name('category.store');

        Route::get('/edit/{id}' , 
                    [CategoryController::class , 'edit'])->name('category.edit');

        Route::post('/update/{id}' , 
                    [CategoryController::class , 'update'])->name('category.update');

        Route::get('/destroy/{id}' ,
                        [CategoryController::class , 'destroy'])->name('category.destroy');
});

Route::get('/admin' ,
                 [DashBoardController::class, 'index'])
                 ->middleware(['auth','check_admin'])
                 ->name('admin.index');
                 
Route::get('/show' ,
                [DashBoardController::class, 'show'])->name('admin.show');

Route::get('/show/{id}' , 
                    [CategoryController::class , 'showProducts'])->name('cate.show');

Route::prefix('product')->group(function() {
        Route::get('/' , 
                [ProductController::class, 'index'])->name('product.list');
    
        Route::get('/create' , 
                [ProductController::class, 'create'])->name('product.create');

        Route::get('/destroy/{id}' , 
                [ProductController::class, 'destroy'])->name('product.destroy');

        Route::get('/showImg/{id}' , 
                [ProductController::class, 'showImages'])->name('product.showImg');

        Route::post('/store',
                [ProductController::class, 'store'])->name('product.store');

        Route::get('/edit/{id}' , 
                [ProductController::class, 'edit'])->name('product.edit');

        Route::post('/update/{id}' , 
                [ProductController::class , 'update'])->name('product.update');

        Route::get('/show/{id}' , 
                [ProductController::class, 'show'])->name('product.show');

        Route::get('/search' ,
                [ProductController::class, 'search'])->name('product.search');

        Route::get('/searchcategory' ,
                [ProductController::class, 'searchCategory'])->name('product.searchcategory');

        Route::get('/searchstatus' ,
                [ProductController::class, 'searchStatus'])->name('product.searchstatus');

        Route::get('/manage' ,
                [ProductController::class, 'manage'])->name('product.manage');
    
        Route::get('/formhanding/{id}' ,
                [ProductController::class, 'formhanding'])->name('product.formhanding');

        Route::post('/handing/{id}' ,
                [ProductController::class, 'handing'])->name('product.handing');

        Route::get('/rating' ,
                [RatingController::class, 'index'])->name('review');
        
        Route::get('/searchProduct' ,
                [ProductController::class, 'searchProduct'])->name('product.searchProduct');

        Route::get('/cancelProduct/{id}',
                [ProductController::class, 'cancelProduct'])->name('product.cancel');

        Route::get('/checkProduct/{id}',
                [ProductController::class, 'check'])->name('product.check');

        Route::get('/destroyProduct/{id}',
                [ProductController::class, 'cancel'])->name('product.destroyCart');
});

Route::group([
        'prefix' => 'user',
        'middleware' => ['auth'],
    ],function() {
        Route::get('/' , 
                        [UserController::class , 'index'])->name('user.index');
                
        Route::get('/show/{id}' , 
                        [UserController::class , 'show'])->name('user.show');

        Route::get('/edit/{id}' , 
                        [UserController::class , 'edit'])->name('user.edit');

        Route::post('/update/{id}' , 
                        [UserController::class , 'update'])->name('user.update');

        Route::get('/showProducts/{id}' , 
                        [UserController::class , 'showProducts'])->name('user.product');
        
        Route::get('/destroy/{id}' ,
                        [UserController::class , 'destroy'])->name('user.destroy');
        
        Route::get('/pq/{id}' ,
                        [UserController::class , 'decentralization'])->name('user.pq');
        
        Route::post('/updatepq/{id}' ,
                        [UserController::class , 'updatepq'])->name('user.updatepq');

        Route::get('/create' , 
                        [UserController::class , 'create'])->name('user.create');

        Route::post('/store' , 
                        [UserController::class , 'store'])->name('user.store');

        Route::get('/showProduct/{id}' , 
                        [UserController::class , 'showProducts'])->name('user.showProducts');
        
        Route::get('/searchName' ,
                        [UserController::class, 'search'])->name('user.search');

        Route::get('/searchCode' ,
                        [UserController::class, 'searchCode'])->name('user.searchcode');
        
        Route::get('/searchRole' ,
                        [UserController::class, 'searchRole'])->name('user.searchrole');
});

Route::get('/showProductOrder/{id}' , 
                            [OrderController::class , 'showProducts'])->name('order.product');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
