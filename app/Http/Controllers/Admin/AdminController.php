<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminsExportEmail;
use App\Models\Admin;
use App\Models\Department;
use App\Notifications\Admins\Welcome;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * Admin index
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::query();

        // Handle search requests
        if ($request->input('query')) {
            $search_query = Admin::search($request->input('query'));

            // Filter tab
            if ($request->tab === 'archived') {
                $search_query = $search_query->onlyTrashed();
            }

            $ids = $search_query->get()->pluck('id');
            $admins = $admins->whereIn('id', $ids);
        }

        $admins = $admins->with('department:id,name');

        // Filter tab
        if ($request->tab === 'archived') {
            $admins = $admins->onlyTrashed();
        }

        // Setup pagination
        $admins = $admins->paginate(10)->appends(request()->query());
        // Process counts
        $active_count = Admin::count();
        $archived_count = Admin::onlyTrashed()->count();

        return Inertia::render('Admin/AdminManagement/Index', [
            'items' => $admins,
            'archived' => Admin::with('department:id,name')->whereNotNull('deleted_at')->get(),
            'activeCount' => $active_count,
            'archivedCount' => $archived_count,
            'query' => $request->input('query'), // return search query
            'selectedTab' => $request->input('tab'), // return selected tab
        ]);
    }

    /**
     * Admin create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Admin/AdminManagement/Create', [
            'departments' => Department::renderSelect(),
        ]);
    }

    /**
     * Admin edit
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function edit(Admin $admin)
    {
        return Inertia::render('Admin/AdminManagement/Edit', [
            'admin' => $admin,
            'departments' => Department::renderSelect(),
        ]);
    }

    /**
     * Admin store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function store(Request $request)
    {
        $vars = $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'title' => ['required', 'max:50'],
            'department_id' => ['required', 'integer'],
            'email' => ['required', 'max:50', 'email', 'unique:admins'],
        ]);

        $vars['email_verified_at'] = Carbon::now();
        $vars['password'] = Hash::make(Str::random(24));

        $admin = Admin::create($vars);

        Password::broker('admins')->sendResetLink([
            'email' => $admin->email,
        ], function ($user, $token) {
            $user->notify(new Welcome($token));
        });

        return redirect()
            ->route('admin.admin-management.index')
            ->with('success', 'Admin successfully created!');
    }

    /**
     * Admin update
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $vars = $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'title' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', 'unique:admins,email,' . $admin->id],
            'department_id' => ['required', 'integer'],
        ]);

        $admin->update($vars);

        return redirect()
            ->route('admin.admin-management.index')
            ->with('success', 'Admin successfully edited!');
    }

    /**
     * Admin delete
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function delete(Request $request, Admin $admin)
    {
        $admin->delete();

        return redirect()
            ->route('admin.admin-management.index')
            ->with('success', 'Admin successfully deleted!');
    }

    /**
     * Admin restore
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function restore(Request $request)
    {
        Admin::withTrashed()->find($request->id)->restore();

        return redirect()
            ->route('admin.admin-management.index')
            ->with('success', 'Admin successfully restored!');
    }

    public function export(Request $request)
    {
        $admins = Admin::query();

        // Handle search requests
        if ($request->input('query')) {
            $search_query = Admin::search($request->input('query'));

            // Filter tab
            if ($request->tab === 'archived') {
                $search_query = $search_query->onlyTrashed();
            }

            $ids = $search_query->get()->pluck('id');
            $admins = $admins->whereIn('id', $ids);
        }

        $admins = $admins->with('department:id,name');

        // Filter tab
        if ($request->tab === 'archived') {
            $admins = $admins->onlyTrashed();
        }

        Mail::to($request->user())->send(new AdminsExportEmail($admins));

        return redirect()
            ->route('admin.admin-management.index')
            ->with('success', 'Admin export successfully sent to your email!');
    }
}
