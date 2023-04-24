<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Populates the users table which doubles as a list of admins
 */
class AdminSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('users')->insert([
            'username' => 'aivirth',
            'email'    => 'aivirth.dev@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        DB::table('users')->insert([
            'username' => 'test_user2',
            'email'    => 'test2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'username' => 'test_user3',
            'email'    => 'test3@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
