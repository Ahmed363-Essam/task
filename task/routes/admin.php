<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\DahboardAdmin;
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



// admin Guest
Route::group([
    'prefix' => 'admin',
    'middleware' => 'guest:admin'

], function () {
    Route::get('/login', [AdminAuthController::class, 'ShowLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'Login'])->name('admin.login');
    Route::get('/register', [AdminAuthController::class, 'ShowRegister'])->name('admin.ShowRegister');
    Route::post('/register', [AdminAuthController::class, 'Registrt'])->name('admin.register');
});


// admin Auth

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth:admin'

], function () {

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');



    Route::get('/', [DahboardAdmin::class, 'index'])->name('admin.index');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');


    Route::resource('/products', ProductsController::class);
});
