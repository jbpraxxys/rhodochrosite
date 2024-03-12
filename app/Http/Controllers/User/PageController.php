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

    // Solutions

    public function callCenter() {
        return Inertia::render('User/Pages/Solutions/CallCenter', []);
    }

    public function staffLeasing() {
        return Inertia::render('User/Pages/Solutions/StaffLeasing', []);
    }

    public function seatLeasing() {
        return Inertia::render('User/Pages/Solutions/SeatLeasing', []);
    }

    public function virtualAssistant() {
        return Inertia::render('User/Pages/Solutions/VirtualAssistant', []);
    }

    public function workforceManagement() {
        return Inertia::render('User/Pages/Solutions/WorkforceManagement', []);
    }

    public function managedServices() {
        return Inertia::render('User/Pages/Solutions/ManagedServices', []);
    }

    public function crowdSourcing() {
        return Inertia::render('User/Pages/Solutions/CrowdSourcing', []);
    }

    // Specializations

    public function ict() {
        return Inertia::render('User/Pages/Specializations/Ict', []);
    }

    public function salesAndCustomer() {
        return Inertia::render('User/Pages/Specializations/SalesAndCustomer', []);
    }

    public function saleDevelopment() {
        return Inertia::render('User/Pages/Specializations/SaleDevelopment', []);
    }

    public function customerService() {
        return Inertia::render('User/Pages/Specializations/CustomerService', []);
    }

    public function salesTeamService() {
        return Inertia::render('User/Pages/Specializations/SalesTeamService', []);
    }

    public function socialMediaManagement() {
        return Inertia::render('User/Pages/Specializations/SocialMediaManagement', []);
    }


    // Industries

    public function industries() {
        return Inertia::render('User/Pages/Industries/Index', []);
    }

    // Why Us

    public function ourAdvantages() {
        return Inertia::render('User/Pages/WhyUs/OurAdvantages', []);
    }

    public function ourTeam() {
        return Inertia::render('User/Pages/WhyUs/OurTeam', []);
    }

    // Contact Us

    public function contactUs() {
        return Inertia::render('User/Pages/ContactUs/Index', []);
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
