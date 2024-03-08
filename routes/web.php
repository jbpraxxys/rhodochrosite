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
        Route::get('/solutions/call-center', 'callCenter')->name('call-center');
        Route::get('/solutions/staff-leasing', 'staffLeasing')->name('staff-leasing');
        Route::get('/solutions/seat-leasing', 'seatLeasing')->name('seat-leasing');
        Route::get('/solutions/virtual-assistant', 'virtualAssistant')->name('virtual-assistant');
        Route::get('/solutions/workforce-management', 'workforceManagement')->name('workforce-management');
        Route::get('/solutions/managed-services', 'managedServices')->name('managed-services');
        Route::get('/solutions/crowd-sourcing', 'crowdSourcing')->name('crowd-sourcing');
        Route::get('/specializations/ict', 'ict')->name('ict');
        Route::get('/specializations/sale-development', 'saleDevelopment')->name('sale-development');
        Route::get('/specializations/customer-service', 'customerService')->name('customer-service');
        Route::get('/specializations/sales-team-service', 'salesTeamService')->name('sales-team-service');
        Route::get('/specializations/social-media-management', 'socialMediaManagement')->name('social-media-management');
        Route::get('/industries', 'industries')->name('industries');
        Route::get('/why-us/our-advantages', 'ourAdvantages')->name('our-advantages');
        Route::get('/why-us/our-team', 'ourTeam')->name('our-team');
        Route::get('/contact-us', 'contactUs')->name('contact-us');
        Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
        Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions');
    });