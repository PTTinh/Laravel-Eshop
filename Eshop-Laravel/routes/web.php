<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductCateController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::resource('product_cate', ProductCateController::class, ['except' => ['show']]);
    Route::resource('product', ProductController::class);
    Route::resource('login', LoginController::class)->only(['index', 'store']);
});
