<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

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
    return redirect('products');
});

Route::prefix('products')->name('products.')->group(static function () {
    Route::get("/", [ProductsController::class, 'index'])->name('index');
    Route::get("/create", [ProductsController::class, 'create'])->name('create');
    Route::post("/store", [ProductsController::class, 'store'])->name('store');
    Route::get("/edit/{product}", [ProductsController::class, 'edit'])->name('edit');
    Route::post("/update{product}", [ProductsController::class, 'update'])->name('update');
    Route::get("/destroy{product}", [ProductsController::class, 'destroy'])->name('destroy');
    Route::get("/search-product-by-category", [ProductsController::class, 'searchProductByCategory'])->name('search_product_by_category');
});

Route::prefix('categories')->name('categories.')->group(static function () {
    Route::get("/", [CategoriesController::class, 'index'])->name('index');
    Route::get("/create", [CategoriesController::class, 'create'])->name('create');
    Route::post("/store", [CategoriesController::class, 'store'])->name('store');
    Route::get("/edit/{category}", [CategoriesController::class, 'edit'])->name('edit');
    Route::post("/update{category}", [CategoriesController::class, 'update'])->name('update');
    Route::get("/destroy{category}", [CategoriesController::class, 'destroy'])->name('destroy');
    Route::get("/list/{category?}", [CategoriesController::class, 'list'])->name('list');
});
