<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('submenus')->insert([
            [
                'user_id'       => 1,
                'menu_id'       => 1,
                'name'          => 'Dashboard',
                'slug'          => 'dashboard',
                'url'           => '/admin/admindashboard',
                'icon'          => 'home',
                'active_status' => true,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id'       => 1,
                'menu_id'       => 2,
                'name'          => 'Menu',
                'slug'          => 'menu',
                'url'           => '/core/menus',
                'icon'          => 'bars-3',
                'active_status' => true,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id'       => 1,
                'menu_id'       => 2,
                'name'          => 'Submenu',
                'slug'          => 'submenu',
                'url'           => '/core/submenus',
                'icon'          => 'list-bullet',
                'active_status' => true,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id'       => 1,
                'menu_id'       => 3,
                'name'          => 'Users',
                'slug'          => 'users',
                'url'           => '/users',
                'icon'          => 'users',
                'active_status' => true,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
        ]);
    }
}
