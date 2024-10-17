<?php

use App\Http\Controllers\Admin\ProductCateController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    "product" => ProductController::class,
    "product_cate" => ProductCateController::class,
]);