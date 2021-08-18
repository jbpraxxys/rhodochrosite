<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Admin;
use App\Notifications\Admins\Welcome;

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

    Route::prefix('admin-management')->name('admin-management.')->group(function () {
        Route::get('index', [AdminController::class, 'index'])->name('index');
        Route::get('create', [AdminController::class, 'create'])->name('create');
        Route::get('edit/{admin}', [AdminController::class, 'edit'])->name('edit');
        Route::post('store', [AdminController::class, 'store'])->name('store');
        Route::post('edit/{admin}', [AdminController::class, 'update']);
        Route::delete('delete/{admin}', [AdminController::class, 'delete'])->name('delete');
        Route::post('restore}', [AdminController::class, 'restore'])->name('restore');
        Route::get('search/{q}', [AdminController::class, 'search'])->name('search');
    });
});
