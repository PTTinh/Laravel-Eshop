<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\ProductCateController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::resource('product_cate', ProductCateController::class, ['except' => ['show']]);
    Route::resource('product', ProductController::class);
});

Route::get("/register", [AccountController::class, 'register'])->name('register');
Route::post("/register", [AccountController::class, 'registerPost'])->name('register.post');
Route::get("/login", [AccountController::class, 'login'])->name('login');
Route::post("/login", [AccountController::class, 'loginPost'])->name('login.post');
Route::get("/logout", [AccountController::class, 'logout'])->name('logout');