<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\ProductController;

use App\Models\Carousel;
use App\Models\Product;

Route::get('/', function () {
    $carousels = Carousel::orderBy('order')->get();
    $products = Product::latest()->take(6)->get();
    return view('welcome', compact('carousels', 'products'));
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('carousels', CarouselController::class);
    Route::resource('products', ProductController::class);
});
