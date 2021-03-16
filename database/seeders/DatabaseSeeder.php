<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
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
    }
}
