<?php

use App\Models\CmsPage;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CkeditorController;


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

Route::post('ckeditor/upload', [CkeditorController::class, 'upload']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::get('/stylesheet', function () {
    return Inertia::render('Stylesheet/Partials/SSContent');
});

// fetch header footer content
// Route::prefix('cms')
//     ->name('cms.general.')
//     ->controller(CmsPageController::class)
//     ->group(function () {
//         Route::post('/footer', 'fetchHeader')->name('fetchHeader');
//         Route::post('/header', 'fetchFooter')->name('fetchFooter');
// });

Route::get('/', function () {
	return Inertia::render('User/Pages/Home/Index', [
    ]);
});