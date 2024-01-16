<?php

use App\Models\CmsPage;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\User\PageController;

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

Route::get('/admin', function () {
    return redirect('/admin/login');
});

Route::post('ckeditor/upload', [CkeditorController::class, 'upload']);

Route::get('/stylesheet', function () {
    return Inertia::render('Stylesheet/Partials/SSContent');
});

Route::prefix('/')
    ->name('pages.')
    ->controller(PageController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
        Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions');
    });