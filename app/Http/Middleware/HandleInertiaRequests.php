<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    // protected $rootView = 'app';
    public function rootView(Request $request)
    {
        if ($request->is(['admin', 'admin/*'])) {
            return 'app';
        }

        return 'user';
    }

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'storage_url' => Storage::url(''),
            'user_type' => $request->user() ? (new \ReflectionClass($request->user()))->getShortName() : null,
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'danger' => $request->session()->get('danger'),
                    'warning' => $request->session()->get('warning'),
                    // 'error' => $request->session()->get('error'),
                ];
            },
            'session_permissions' => function () use ($request) {
                if ($request->user() && in_array(HasRoles::class, class_uses((new \ReflectionClass($request->user()))->getName()))) {
                    return $request->user()->getAllPermissions()->map(function ($permission) {
                        return $permission->name;
                    });
                } else {
                    return null;
                }
            },
        ]);
    }
}
