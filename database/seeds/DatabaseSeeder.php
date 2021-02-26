<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '(050)5050505'],
            ['name' => 'Demo',
            'email' => 'demo@gmail.com',
            'password' => Hash::make('demo'),
            'phone' => '(050)0505050'],
        ]);

        DB::table('roles')->insert([
            ['name' => 'admin',
            'slug' => 'admin'],
            ['name' => 'registered-user',
            'slug' => 'registered-user'],
        ]);

        DB::table('permissions')->insert([
            ['name' => 'observe',
            'slug' => 'watch-all-users'],
            ['name' => 'change-rights',
            'slug' => 'change-user-rights'],
            ['name' => 'ban',
            'slug' => 'put-users-in-ban'],
            ['name' => 'cabinet-access',
            'slug' => 'access-to-personal-cabinet'],
            ['name' => 'profile-modifying',
            'slug' => 'profile-modifying'],
        ]);

        DB::table('roles_permissions')->insert([
            ['role_id' => 1,
            'permission_id' => 1,],
            ['role_id' => 1,
            'permission_id' => 2,],
            ['role_id' => 1,
            'permission_id' => 3,],
            ['role_id' => 1,
            'permission_id' => 4,],
            ['role_id' => 2,
            'permission_id' => 4,],
            ['role_id' => 2,
            'permission_id' => 5,],
        ]);

        DB::table('users_roles')->insert([
            ['user_id' => 1,
            'role_id' => 1,],
            ['user_id' => 2,
            'role_id' => 2,],
        ]);

        DB::table('users_permissions')->insert([
            ['user_id' => 1,
            'permission_id' => 1,],
            ['user_id' => 1,
            'permission_id' => 2,],
            ['user_id' => 1,
            'permission_id' => 3,],
            ['user_id' => 1,
            'permission_id' => 4,],
            ['user_id' => 2,
            'permission_id' => 4,],
            ['user_id' => 2,
            'permission_id' => 5,],
        ]);

        \App\Models\User::factory(10)->create();
    }
}
