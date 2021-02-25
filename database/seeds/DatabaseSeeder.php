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
            'name' => 'Demo',
            'email' => 'Demo@gmail.com',
            'password' => Hash::make('demo'),
        ]);

        DB::table('roles')->insert([
            ['name' => 'admin',
            'slug' => 'admin'],
            ['name' => 'registered-user',
            'slug' => 'registered-user'],
        ]);

        DB::table('users_roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        \App\Models\User::factory(10)->create();
    }
}
