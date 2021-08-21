<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_administrators = [
            [
                'name' => 'Super admin',
                'email' => 'superadmin@example.com',
                'password' => bcrypt('superadmin'),
            ],
        ];

        $administrators = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('administrator'),
            ],
        ];

        User::truncate();

        foreach ($super_administrators as $user) {
            $user = User::create($user);
            $user->attachRole(Role::SUPER_ADMIN);
        }

        foreach ($administrators as $user) {
            $user = User::create($user);
            $user->attachRole(Role::ADMIN);
        }
    }
}
