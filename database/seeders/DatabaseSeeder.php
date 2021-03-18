<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'   => 1,
                'role' => 'Buyer',
            ],
            [
                'id'    => 2,
                'role' => 'Seller',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $categories = [
            [
                'id'    => 1,
                'name'  => 'electronics',
            ],
            [
                'id'    => 2,
                'name'  => 'home appliances',
                'parent_id' => 1,
            ],
            [
                'id'    => 3,
                'name'  => 'gadgets',
                'parent_id' => 1,
            ],
            [
                'id'    => 4,
                'name'  => 'phone',
                'parent_id' => 3,
            ],
            [
                'id'    => 5,
                'name'  => 'gaming',
                'parent_id' => 3,
            ],
            [
                'id'    => 6,
                'name'  => 'Men clothing',
            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 
