<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'user_id' => 1,
                'active_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Core',
                'slug' => 'core',
                'user_id' => 1,
                'active_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'slug' => 'user',
                'user_id' => 1,
                'active_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
