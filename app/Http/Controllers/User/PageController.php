<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index() {

        $cms = CmsPage::where('slug', 'home')->first();

        return Inertia::render('User/Pages/Home/Index', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

    public function privacyPolicy() {

        $cms = CmsPage::where('slug', 'privacy-policy')->first();

        return Inertia::render('User/Pages/GenericPage/Index', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

    public function termsAndConditions() {

        $cms = CmsPage::where('slug', 'terms-and-conditions')->first();

        return Inertia::render('User/Pages/GenericPage/Index', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }
}
