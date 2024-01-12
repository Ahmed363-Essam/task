<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;

Route::group([], function () {

    Route::get('/', [FrontController::class, 'index'])->name('front.index');
});
