<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Category;
use App\Models\Status;
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
                'name'  => 'Electronics',
            ],
            [
                'id'    => 2,
                'name'  => 'Home Appliances',
                'parent_id' => 1,
            ],
            [
                'id'    => 3,
                'name'  => 'Gadgets',
                'parent_id' => 1,
            ],
            [
                'id'    => 4,
                'name'  => 'Phone',
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
            [
                'id'    => 7,
                'name'  => 'Shoes',
                'parent_id' => 6,
            ],
            [
                'id'    => 8,
                'name'  => 'Shirts',
                'parent_id' => 6,
            ],
            [
                'id'    => 9,
                'name'  => 'Jeans',
                'parent_id' => 6,
            ],
            [
                'id'    => 10,
                'name'  => 'Watches',
                'parent_id' => 6,
            ],
            [
                'id'    => 11,
                'name'  => 'Socks',
                'parent_id' => 6,
            ],
            [
                'id'    => 12,
                'name'  => 'Domestic',
            ],
            [
                'id'    => 13,
                'name'  => 'Food',
                'parent_id' => 12,
            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }

        $statuses = [
            [
                'id'   => 1,
                'status' => 'Initialized',
            ],
            [
                'id'    => 2,
                'status' => 'Placed',
            ],
            [
                'id'    => 3,
                'status' => 'Shipped',
            ],
            [
                'id'    => 4,
                'status' => 'Completed',
            ],
            [
                'id'    => 5,
                'status' => 'Cancelled',
            ],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }

    }
} 
