<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();

        $roles = [
            [
                'name' => 'Customer',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Supplier',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Manager',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Seller',
                'guard_name' => 'web'
            ],
        ];

        foreach($roles as $role){
            Role::create($role);
        }
    }
}
