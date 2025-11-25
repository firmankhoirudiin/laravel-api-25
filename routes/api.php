<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryProductController;
use App\Http\Controllers\Api\ProductVariantController;
use App\Http\Controllers\VendorController;

// use App\Http\Controllers\ProductController;

Route::prefix('v1')->group(function () {
    Route::resource('category-products', CategoryProductController::class);
    // Route::resource('vendors', VendorController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product_variants', ProductVariantController::class);
    Route::get('/user',function(Request $request){
        return $request->user ();
    });

    
});