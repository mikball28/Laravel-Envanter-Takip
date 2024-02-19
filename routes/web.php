<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/'], function () {

Route::get('/',[UserController::class,('login')])->name('login');
Route::post('/',[UserController::class,('login_form')]);

Route::get('/kayıt',[UserController::class,('signup')])->name('signup');
Route::post('/kayıt',[UserController::class,('signup_form')]);

Route::post('/logout',[UserController::class,('logout')])->name('logout');

    Route::group(['middleware'=>'auth'],function(){

        Route::get('/anasayfa',[HomePageController::class,('index')])->name('index');

        Route::get('/ürünler',[HomePageController::class,('product')])->name('product');
        Route::post('/ürünler',[HomePageController::class,('product_add')]);
        Route::get('/ürün-sil/{id}',[HomePageController::class,('product_delete')])->name('product.delete');

        Route::get('/satış',[HomePageController::class,('sales')])->name('sales');
        Route::post('/satış',[HomePageController::class,('sales_add')]);

        Route::get('/ürün-filtrele',[HomePageController::class,('product_filter')])->name('product_filter');
        Route::post('/ürün-filtrele',[HomePageController::class,('product_filter_add')])->name('product_filter_add');

        Route::get('/tarih-filtrele',[HomePageController::class,('date_filter')])->name('date_filter');
        Route::post('/tarih-filtrele',[HomePageController::class,('date_filter_add')])->name('date_filter_add');

        Route::get('/önceki-ay-takip',[HomePageController::class,('last_month')])->name('last_month');
       
        Route::get('/aylık-gelir-takip',[HomePageController::class,('monthly')])->name('monthly');

        Route::get('/notlar',[HomePageController::class,('notes')])->name('notes');
        Route::post('/notlar',[HomePageController::class,('notes_add')]);

    });
});
