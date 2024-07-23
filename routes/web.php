<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuppliesController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SuppliesController::class, 'index'])->name('product.index');
Route::get('them-san-pham/{id?}', [SuppliesController::class, 'create_product'])->name('product.create');
Route::post('store-product', [SuppliesController::class, 'store_product'])->name('product.store');
Route::put('store-product', [SuppliesController::class, 'update_product'])->name('product.update');
Route::delete('delete-product', [SuppliesController::class, 'delete_product'])->name('product.delete');
Route::get('chi-tiet/{id?}', [SuppliesController::class, 'detail_product'])->name('product.detail');
