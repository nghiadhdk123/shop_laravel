<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\DashboardController;
use \App\Http\Controllers\Backend\ProductController;
use \App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Backend\OrderController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\LogoutController;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Frontend\ProductFeController;


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

Route::group([    
        'prefix' => 'fe',

    ],function(){
            Route::get('/',
                    [ProductFeController::class , 'index'])->name('frontend.index');
});

Route::get('/' ,
                [LoginController::class , 'FormLogin'])->name('login.form');
Route::post('/login' ,
                [LoginController::class , 'Login'])->name('login.store');

Route::get('/logout',[LogoutController::class,'logout'])->name('logout');

Route::get('/register'
                ,[RegisterController::class , 'showForm'])->name('register.form');

Route::post('/register'
                ,[RegisterController::class , 'register'])->name('register.store');

Route::get('/home', function () {
    return view('frontend.home');
})->name('home');

Route::group([
    'prefix' => 'category',
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
});

Route::get('/dady' ,
                 [DashBoardController::class, 'index'])
                 ->middleware(['auth','check_admin'])
                 ->name('admin.index');
// Route::get('/show' ,
//                 [DashBoardController::class, 'show'])->name('admin.show');

Route::get('/show/{id}' , 
                    [CategoryController::class , 'showProducts'])->name('cate.show');

Route::prefix('product')->group(function() {
    Route::get('/' , 
                [ProductController::class, 'index'])->name('product.index');
    
    Route::get('/create' , 
                [ProductController::class, 'create'])->name('product.create');

    Route::get('/show/{id}' , 
                [ProductController::class, 'show'])->name('product.show');

    Route::get('/showImg/{id}' , 
                [ProductController::class, 'showImages'])->name('product.showImg');
    Route::post('/store',
                [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}' , 
                [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}' , 
                [ProductController::class , 'update'])->name('product.update');


});

Route::group([
        'prefix' => 'user',
    ],function() {
    Route::get('/' , 
                 [UserController::class , 'index'])->name('user.index');

    Route::get('/edit/{id}' , 
                 [UserController::class , 'edit'])->name('user.edit');

    Route::post('/update/{id}' , 
                 [UserController::class , 'update'])->name('user.update');

    Route::get('/showProducts/{id}' , 
                 [UserController::class , 'showProducts'])->name('user.product');
});

Route::get('/showProductOrder/{id}' , 
                            [OrderController::class , 'showProducts'])->name('order.product');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
