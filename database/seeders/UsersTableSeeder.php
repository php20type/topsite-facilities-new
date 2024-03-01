<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'email_verified_at' => '2024-01-09 18:30:00',
                'password' => '$2y$10$J0eRqOPeUfIYTAeuYBp4N.kiiY84wAMChq6/4LeetO73b3NwzISoW',
                'is_approve' => 1,
                'approve_at' => '2024-01-09 18:30:00',
                'token' => '19de00c7c227d192109e2b03c972a04d',
                'connection_id' => 716,
                'user_status' => 'online',
                'user_image' => null,
                'is_admin' => 1,
                'created_at' => '2023-12-19 02:23:36',
                'updated_at' => '2024-02-16 02:40:29'
            ]
        ]);
    }
}
