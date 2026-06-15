<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('create');

Route::post('/products/store', [ProductController::class, 'store'])->name('store');

Route::get('/products/{id}', [ProductController::class, 'detail'])->name('products.detail');

Route::get('/products/buy/{id}', [ProductController::class, 'buy'])->name('buy');

Route::post('/products/purchase', [ProductController::class, 'purchase'])->middleware('auth')->name('products.purchase');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit');

Route::put('/products/{id}', [ProductController::class, 'update'])->name('update');

Route::put('/account/update', [ProductController::class, 'accountUpdate'])->middleware('auth')->name('account.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('destroy');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/mypage', [ProductController::class, 'mypage'])->middleware('auth')->name('mypage');

Route::get('/mypage/products/{id}', [ProductController::class, 'mypageShow'])->name('mypageShow');

Route::get('/account/edit', [ProductController::class, 'accountEdit'])->middleware('auth')->name('account.edit');

require __DIR__.'/auth.php';
