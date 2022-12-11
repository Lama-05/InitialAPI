<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category',[App\Http\Controllers\SiteController::class,'getCategory'])->name('getCategory');
Route::post('/category-add',[App\Http\Controllers\SiteController::class,'PostAddCategory'])->name('PostAddCategory');

Route::get('/product',[App\Http\Controllers\SiteController::class,'getProduct'])->name('getProduct');
Route::post('/product-add',[App\Http\Controllers\SiteController::class,'PostAddProduct'])->name('PostAddProduct');
