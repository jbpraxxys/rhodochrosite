<?php

use App\Models\CmsPage;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\User\Application\ApplicationController;
use App\Http\Controllers\User\Articles\ArticleController;
use App\Http\Controllers\User\Computation\ComputationController;
use App\Http\Controllers\User\Inquiry\InquiryController;
use App\Http\Controllers\User\ModularController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\Subscription\SubscriptionController;

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
    return redirect('/admin/login');
});

Route::post('ckeditor/upload', [CkeditorController::class, 'upload']);