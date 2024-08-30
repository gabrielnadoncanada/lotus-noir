<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::redirect('/login', '/admin/login')->name('login');
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/', [PageController::class, 'index']);
//Route::group([
//    'prefix' => LaravelLocalization::setLocale(),
//    'middleware' => ['localizationRedirect'],
//], function () {
//    Route::get('/{slug?}', [PageController::class, 'show']);
//});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});
Route::get('/sitemap', [SitemapController::class, 'pretty']);
