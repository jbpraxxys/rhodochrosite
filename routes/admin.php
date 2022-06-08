<?php

use App\Http\Controllers\Admin\ActivityLogsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\CmsPageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('admin-management')
        ->name('admin-management.')
        ->controller(AdminController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::get('edit/{admin}', 'edit')->name('edit');
            Route::post('store', 'store')->name('store');
            Route::post('edit/{admin}', 'update');
            Route::delete('delete/{admin}', 'delete')->name('delete');
            Route::post('restore}', 'restore')->name('restore');
            Route::get('search/{q}', 'search')->name('search');
            Route::get('export', 'export')->name('export');
        });

    Route::prefix('role-permission-management')
        ->name('role-permission-management.')
        ->controller(RolePermissionController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('edit/{role}', 'edit')->name('edit');
            Route::post('edit/{role}', 'update')->name('update');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete/{role}', 'delete')->name('delete');
            Route::post('restore', 'restore')->name('restore');
        });

    Route::prefix('activity-logs')
        ->name('activity-logs.')
        ->controller(ActivityLogsController::class)
        ->middleware('can:manage-activity-logs')
        ->group(function () {
            Route::get('index', 'index')->name('index');
        });

    Route::prefix('cms')
        ->name('cms.')
        ->controller(CmsPageController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('edit/{cmsPage}', 'edit')->name('edit');
            Route::post('edit/{cmsPage}', 'update');
        });
});
