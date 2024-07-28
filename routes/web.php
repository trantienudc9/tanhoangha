<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\ImageProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('trang-chu', [SuppliesController::class, 'index'])->name('product.index');
Route::get('them-san-pham/{id?}', [SuppliesController::class, 'create_product'])->name('product.create');
Route::post('store-product', [SuppliesController::class, 'store_product'])->name('product.store');
Route::put('update-product', [SuppliesController::class, 'update_product'])->name('product.update');
Route::delete('delete-product', [SuppliesController::class, 'delete_product'])->name('product.delete');
Route::get('chi-tiet/{id?}', [SuppliesController::class, 'detail_product'])->name('product.detail');
Route::get('san-pham/{kind_product_type}/{product_type}', [SuppliesController::class, 'items_products'])->name('product.items');
Route::get('gioi-thieu', [SuppliesController::class, 'introduce_products'])->name('product.introduce');
Route::get('tuyen-dung', [SuppliesController::class, 'recruitment_products'])->name('product.recruitment');
Route::get('lien-he', [SuppliesController::class, 'contact_products'])->name('product.contact');
Route::get('thong-so-san-pham/{id}', [SuppliesController::class, 'parameters'])->name('product.parameters');
Route::put('update_parameters', [SuppliesController::class, 'update_parameters'])->name('product.update_parameters');

// imgae_product

Route::get('them-anh/{id?}', [ImageProductController::class, 'add_background'])->name('image.background');
Route::post('store-background', [ImageProductController::class, 'store_background'])->name('image.store_background');
Route::put('update-background', [ImageProductController::class, 'update_background'])->name('image.update_background');
Route::delete('delete-background', [ImageProductController::class, 'delete_background'])->name('image.delete_background');

require __DIR__.'/auth.php';
