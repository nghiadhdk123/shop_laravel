<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\DashboardController;
use \App\Http\Controllers\Backend\ProductController;
use \App\Http\Controllers\Backend\UserController;

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

Route::get('/home', function () {
    return view('frontend.home');
});

Route::get('/' ,
                [DashBoardController::class, 'index'])->name('admin.index');

Route::prefix('product')->group(function() {
    Route::get('/' , 
                [ProductController::class, 'index'])->name('product.index');
    
    Route::get('/create' , 
                [ProductController::class, 'create'])->name('product.create');

});

Route::prefix('user')->group(function() {
    Route::get('/' , 
                 [UserController::class , 'index'])->name('user.index');

    Route::get('/create' , 
                 [UserController::class , 'create'])->name('user.create');
});
