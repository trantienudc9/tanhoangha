<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\ConditioningController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SuppliesController::class, 'index'])->name('product.index');
Route::get('them-san-pham/{id?}', [SuppliesController::class, 'create_product'])->name('product.create');
Route::post('store-product', [SuppliesController::class, 'store_product'])->name('product.store');
Route::put('update-product', [SuppliesController::class, 'update_product'])->name('product.update');
Route::delete('delete-product', [SuppliesController::class, 'delete_product'])->name('product.delete');
Route::get('chi-tiet/{id?}', [SuppliesController::class, 'detail_product'])->name('product.detail');
Route::get('san-pham/{kind_product_type}/{product_type}', [SuppliesController::class, 'items_products'])->name('product.items');

// infor_produc

Route::get('thong-so-san-pham/{id}', [ConditioningController::class, 'parameters'])->name('conditioning.parameters');
Route::post('store-conditioning', [ConditioningController::class, 'store_conditioning'])->name('conditioning.store_conditioning');


