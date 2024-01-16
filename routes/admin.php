<?php

use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\Admin\ActivityLogsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CmsPageController;
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
    return redirect()->route('admin.cms.index');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route::prefix('dashboard')
    //     ->name('dashboard.')
    //     ->controller(DashboardController::class)
    //     ->group(function () {
    //         Route::get('index', 'index')->name('index');
    //     });

    Route::prefix('admin-management')
        ->name('admin-management.')
        ->controller(AdminController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('view/{admin}', 'view')->name('view');
            Route::get('create', 'create')->name('create');
            Route::get('edit/{admin}', 'edit')->name('edit');
            Route::post('store', 'store')->name('store');
            Route::post('edit/{admin}', 'update');
            Route::delete('delete/{admin}', 'delete')->name('delete');
            Route::post('restore}', 'restore')->name('restore');
            Route::get('search/{q}', 'search')->name('search');
            Route::get('export', 'export')->name('export');
            Route::get('manifest', 'manifest')->name('manifest');
            Route::post('import', 'import')->name('import');
        });

    Route::prefix('role-permission-management')
        ->name('role-permission-management.')
        ->controller(RolePermissionController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('view/{role}', 'view')->name('view');
            Route::get('edit/{role}', 'edit')->name('edit');
            Route::post('edit/{role}', 'update')->name('update');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete/{role}', 'delete')->name('delete');
            Route::post('restore', 'restore')->name('restore');
        });

    Route::prefix('settings-management')
        ->name('settings-management.')
        ->controller(SettingsController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
        });
        

    Route::prefix('activity-logs')
        ->name('activity-logs.')
        ->controller(ActivityLogsController::class)
        ->middleware('can:manage-activity-logs')
        ->group(function () {
            Route::get('index', 'index')->name('index');
        });

    Route::prefix('notification')
        ->name('notification.')
        ->controller(NotificationController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('show/{id}', 'show')->name('show');
            Route::patch('read-all', 'readAll')->name('read-all');
        });

    Route::prefix('cms')
        ->name('cms.')
        ->controller(CmsPageController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('edit/{cmsPage}', 'edit')->name('edit');
            Route::post('edit/{cmsPage}', 'update');
        });


        Route::post('ckeditor/upload', [CkeditorController::class, 'upload']);

        
});
