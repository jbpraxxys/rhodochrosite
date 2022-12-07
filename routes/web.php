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

// Route::get('/', function () {
//     return view('guest.pages.home');
// });

Route::get('/', function () {
	return Inertia::render('User/Home/Index', [
    ]);
});

// Route::get('/about-us', function () {
// 	// dd(CmsPage::where('slug', 'home')->first()->content);
// 	return view('guest.pages.about', [
// 		'page' => CmsPage::where('slug', 'about')->first(),
// 	]);
// });