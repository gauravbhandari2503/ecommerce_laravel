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
                'name'  => 'Gaming',
                'parent_id' => 3,
            ],
            [
                'id'    => 6,
                'name'  => 'Clothing',
            ],
            [
                'id'    => 7,
                'name'  => 'Men',
                'parent_id' => 6,
            ],
            [
                'id'    => 8,
                'name'  => 'Women',
                'parent_id' => 6,
            ],
            [
                'id'    => 9,
                'name'  => 'Children',
                'parent_id' => 6,
            ],
            [
                'id'    => 10,
                'name'  => 'Shirt',
                'parent_id' => 7,
            ],
            [
                'id'    => 11,
                'name'  => 'Pant',
                'parent_id' => 7,
            ],
            [
                'id'    => 12,
                'name'  => 'Shoes',
                'parent_id' => 7,
            ],
            [
                'id'    => 13,
                'name'  => 'Top',
                'parent_id' => 8,
            ],
            [
                'id'    => 14,
                'name'  => 'Jeans',
                'parent_id' => 8,
            ],
            [
                'id'    => 15,
                'name'  => 'Heels',
                'parent_id' => 8,
            ],
            [
                'id'    => 16,
                'name'  => 'Domestic',
            ],
            [
                'id'    => 17,
                'name'  => 'Food',
                'parent_id' => 16,
            ],
            [
                'id'    => 18,
                'name'  => 'Kitchen',
                'parent_id' => 16,
            ],
            [
                'id'    => 19,
                'name'  => 'Bathroom',
                'parent_id' => 16,
            ],
            [
                'id'    => 20,
                'name'  => 'Veg',
                'parent_id' => 17,
            ],
            [
                'id'    => 21,
                'name'  => 'Non-veg',
                'parent_id' => 17,
            ],
            [
                'id'    => 22,
                'name'  => 'Soap',
                'parent_id' => 18,
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
