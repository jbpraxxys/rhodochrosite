<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'admin@praxxys.ph',
                'title' => 'Admin',
                'password' => Hash::make('password'),
                'department_id' => 6
            ]
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }

        // Create fake Admins
        Admin::factory()
            ->count(50)
            ->create();
    }
}
