<?php

use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\Admin\Others\ActivityLogsController;
use App\Http\Controllers\Admin\Accounts\AdminController;
use App\Http\Controllers\Admin\Accounts\RolePermissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Contents\CmsPageController;
use App\Http\Controllers\Admin\Others\NotificationController;
use App\Http\Controllers\Admin\Others\SettingsController;
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

Route::get('/stylesheet', function () {
    return Inertia::render('Stylesheet/Partials/SSContent');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route::prefix('dashboard')
    //     ->name('dashboard.')
    //     ->controller(DashboardController::class)
    //     ->group(function () {
    //         Route::get('index', 'index')->name('index');
    //     });

    /*
    |--------------------------------------------------------------------------
    | ACCOUNTS
    |--------------------------------------------------------------------------
     */
    Route::prefix('accounts')
        ->name('accounts.')
        ->group(function () {

            /** CUSTOMER */
            // Route::prefix('customers')
            //     ->name('customers.')
            //     ->controller(CustomerController::class)
            //     ->group(function () {
            //         Route::middleware(['can:create-customer', 'can:update-customer'])->group(function () {
            //             Route::get('/', 'index')->name('index');
            //             Route::get('create', 'create')->name('create');
            //             Route::get('edit/{id}', 'edit')->name('edit');
            //             Route::post('store', 'store')->name('store');
            //             Route::post('update/{id}', 'update')->name('update');
            //             Route::get('manifest', 'manifest')->name('manifest');
            //             Route::get('export', 'export')->name('export');
            //             Route::post('import', 'import')->name('import');
            //         });
            //         Route::middleware(['can:archive-customer', 'can:restore-customer'])->group(function () {
            //             Route::get('index?tab=archived', 'index')->name('index-archived');
            //             Route::delete('archive/{id}', 'archive')->name('archive');
            //             Route::patch('restore/{id}', 'restore')->name('restore');
            //         });
            //     });

            /** ADMIN */
            Route::prefix('admins')
                ->name('admins.')
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

            /** ROLES */
            Route::prefix('roles')
                ->name('roles.')
                ->controller(RolePermissionController::class)
                ->group(function () {
                    Route::get('index', 'index')->name('index');
                    Route::get('view/{role}', 'view')->name('view');
                });
        });

    /*
    |--------------------------------------------------------------------------
    | OTHERS
    |--------------------------------------------------------------------------
    */
    Route::prefix('settings')
        ->name('settings.')
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
