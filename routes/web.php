<?php

use Illuminate\Support\Facades\Route;
use Dev1kochiCrypto\SitemapKit\Http\Controllers\SitemapController;

Route::middleware(['web', 'auth'])->prefix('admin/sitemap')->name('sitemap.')->group(function () {
    Route::get('/', [SitemapController::class, 'index'])->name('index');
    Route::post('/generate', [SitemapController::class, 'generate'])->name('generate');
});
